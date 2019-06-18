<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use App\category;
use Cart;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    //
    protected $category;
    public function __construct(){
        $this->category=category::where('parent_id',null)->get();
    }
    public function index(Request $request){
        $id=$request->id;
        $data=product::findOrFail($id);
        // Cart::add(['id' => $data->id,'name' => $data->name, 'qty' => $request->qyt, 'price' => $data->price]);
        Cart::add( $data->id, $data->name, $request->qyt,  $data->price,array());
        return redirect()->route('cart.keranjang');
    }
    public function keranjang(){
        if(!auth::user()){
            return redirect()->route('auth.register');
        }
        $category=$this->category;
        return view ('homePage.keranjang',compact('category'));
    }
    public function update($data){
        $id = $_GET['key'];
        $value = $_GET['value'];
        Cart::update($id, $value); // Will update the quantity
        $category=$this->category;
    }
    public function delete($data){
        cart::remove($data);
        $category=$this->category;
        return view ('homePage.keranjang',compact('category'));
    }
    public function form(){
        $category=$this->category;
        return view('homepage.form',compact('category'));
    }
}
