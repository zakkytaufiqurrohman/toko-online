<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use App\category;
use App\user;
use App\transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;
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
        $remember_token=base64_encode($request['email']);
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
       $request['remember_token']=$remember_token;
       $request['password']=Hash::make($request->get('password'));
       user::create($request->all());
       Mail::send('view_email',array('firstname'=>$request['name'],'remember_token'=>$remember_token),function($pesan) use($request){
           $pesan->to($request['email'],'verifikasi')->subject('verifikasi email');
           $pesan->from('taufiqurrohmanzq@gmail.com','verifikasi akun email anda');
       });
        return redirect()->route('home')->with('edit','user berhasil di tambah');
    }
    public function verifikasi ($token){

        $data=user::where('remember_token',$token)->first();
        if($data->status =='0'){
            $data->status='1';
        }
        $data->remember_token=str_random(100);
        $data->save();
        return redirect()->route('auth.register');
    }
    public function login(Request $request){

        if(auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
            $status=user::where('id',auth::user()->id)->first();
            if($status->status == '0'){
                auth::logout();
                return redirect()->route('home')->with('success','email anda belum di verifikasi');
            }
            else{
                return redirect()->route('home');
            }
        }
        else {
             return redirect()->route('home')->with('success','password / email salah');

        }
    }


}
