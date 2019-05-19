<?php

namespace App\Http\Controllers;
use App\category;
use user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=category::where('parent_id',null)->get();
        return view('admin.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'icon'=>'string',
            'parent_id'=>'integer'
        ]);

        $request['slug']=str_slug($request->get('name'),'-');
        $request['user_id']=auth::user()->id;
        category::create($request->all());
        return redirect()->route('category.index')->with(['success' => 'Pesan Berhasil']);
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data=category::findOrFail($id);
        if($data->parent == null){
            // $category=category::where('parent_id',null)->get();
            $category=category::all();
            return view ('admin.category.edit',compact('data','category'));
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //r
        $data=category::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('category.index')->with(['success' => 'category  Berhasil di update']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data=category::findOrFail($id);
        $data->delete($data);
        return redirect()->route('category.index')->with(['success' => 'berhasil di delete']);
    }
    public function category(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);
        $request['icon']='icon';
        $request['slug']=str_slug($request->get('name'),'-');
        $request['user_id']=auth::user()->id;
        category::create($request->all());
        return redirect()->route('category.index');
    }
}
