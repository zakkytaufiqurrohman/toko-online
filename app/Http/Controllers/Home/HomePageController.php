<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use App\category;
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
        $product=product::where('slug','!=',$slug)->get();
        return view('homePage.detail_product',compact('category','detail_product','product'));
    }

}
