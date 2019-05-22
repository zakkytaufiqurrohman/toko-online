<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
class HomePageController extends Controller
{
    //
    public function index(){
        $data=product::all();
        return view('homePage.index',compact('data'));
    }
}
