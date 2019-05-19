<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaction;
class TransactionController extends Controller
{
    //
    public function index(){
        $data=transaction::groupBy('code')->get();
        return view('admin.transaction.index',compact('data'));
    }
    public function status($code,$status){
        $change=0;
        if($status == 0){
            $change ='1';
        }
        else{
            $change='0';
        }

        $transaction=transaction::where('code',$code)->pluck('id')->toArray();
        transaction::whereIn('id',$transaction)->update(['status'=>$change]);
        return redirect()->route('transaction.index')->with('edit','status berubah');
    }
    public function show($code){

        $data=transaction::where('code',$code)->groupBy('code')->first();
        $datas=transaction::where('code',$code)->get();
        return view('admin.transaction.show',compact('data','datas'));

    }
}
