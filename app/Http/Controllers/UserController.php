<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\user;
class UserController extends Controller
{
    //
    public function index(){
        $data=user::where('role','!=',Auth::user()->role)->get();
        return view('admin.user.index',compact('data'));
    }
    public function status($id){
        $change=0;
        $data=user::findOrFail($id);

        if( $data->status ==0){
            $change='1';
        }
        else{
            $change='0';
        }
        $data->update([
            'status'=>$change,
        ]);
        return redirect()->route('user.index')->with('edit','status berubah');
    }
    public function create(){
        return view('admin.user.create');
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
        return redirect()->route('user.index')->with('edit','user berhasil di tambah');
    }
    public function edit($id){

        $data=user::findOrFail($id);
        return view('admin.user.edit',compact('data'));
    }
    public function update(Request $request,$id){

        $data=user::findOrFail($id);
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required| string|email|max:255|unique:users,email,'.$id,
            'password' => ['required', 'string', 'min:6', ],
            'username'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'birthday'=>'required',
            'role'=>'required',
       ]);
       $data->update($request->all());
       return redirect()->route('user.index')->with('edit','user telah di update');
    }
    public function delete($id){
        $data=user::findOrFail($id);
        $data->delete();
        return redirect()->route('user.index')->with('edit','user telah di delete');
    }

}
