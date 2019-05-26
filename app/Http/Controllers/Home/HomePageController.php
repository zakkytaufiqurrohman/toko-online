<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use App\category;
use App\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class HomePageController extends Controller
{
    //
    protected $category;
    public function __construct(){
        $this->category=category::where('parent_id',null)->get();
    }
    public function index(){
        $category=$this->category;
        $data=product::all();
        return view('homePage.index',compact('data','category'));
    }
    public function product(){
        $category=$this->category;
        $data=product::orderBy('id','DESC')->paginate(1);
        return view('homePage.product',compact('data','category'));
    }
    public function category($slug){
        $category=$this->category;
        $detail_cat=category::where('slug',$slug)->first();
        if($detail_cat->parent_id == null ){
            $id=$detail_cat->id;
            $cate=category::where('parent_id',$id)->get();
            foreach($cate as $x){
                 $y=$x->parent_id;
                 if($y==$id){
                    $u=$x->id;
                    $data=product::where('category_id',$u)->get();
                    // data[]
                 }
            }
        }
        else {
            $id=$detail_cat->id;
            $data=product::where('category_id',$id)->paginate(1);
        }
         return view('homePage.product',compact('data','category'));
    }
    public function detail($slug){

        $category=$this->category;
        $detail_product=Product::where('slug',$slug)->first();
        // untuk menampilkan produk lain selain produk ini
        $product=product::where('slug','!=',$slug)->get();
        return view('homePage.detail_product',compact('category','detail_product','product'));
    }
    public function supliyer(){
        $category=$this->category;
        // $supliyer=user::where('role','supliyer')->get();
        $x=['role'=>'supliyer','status'=>'1'];
        $supliyer=user::where($x)->get();
        return view('homePage.supliyer',compact('category','supliyer'));
    }
    public function detailSupliyer($id){
        $category=$this->category;
        $detail_supliyer=Product::where('user_id',$id)->get();
        $supliyer=Product::where('user_id',$id)->first();
        return view('homePage.detail_supliyer',compact('category','detail_supliyer','supliyer'));
    }
    public function register(){
        $category=$this->category;
        return view('homePage.register',compact('category'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'username'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'birthday'=>'required',
            'role'=>'required',
       ]);
       $request['password']=Hash::make($request->get('password'));
       user::create($request->all());
        return redirect()->route('home')->with('edit','user berhasil di tambah');
    }

}
