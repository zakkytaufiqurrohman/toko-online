<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\product;
use App\category;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=product::all();
        return view('admin.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category=category::where('parent_id',null)->get();
        return view('admin.product.create',compact('category'));
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
        $this->validate($request, [
            'photo' => 'required|file|image|mimes:jpeg,png,jpg',
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required|int',
            'price' => 'required|int',
            'category_id' => 'required|int',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('photo');

        $nama_file = time()."_".$file->getClientOriginalName();

              // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/dist/img';
        $file->move($tujuan_upload,$nama_file);


        product::create([
            'photo' => $nama_file,
            'name' => $request->name,
            'slug' => str_slug($request->name,'-'),
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'user_id'=>auth::user()->id,
        ]);
        return redirect()->route('product.index')->with('succes','data berhasil di tambahkan');

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
        $data=product::findOrFail($id);
        $category=category::where('parent_id',null)->get();
        return view('admin.product.edit',compact('category','data'));
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
        $data=Product::findOrFail($id);
        if( $file = $request->file('photo')){
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'assets/dist/img';
            $file->move($tujuan_upload,$nama_file);
        }
        else{
            $nama_file=$request->photo_lama;
        }
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required',
            'stock' => 'required|int',
            'price' => 'required|int',
            'category_id' => 'required|int',
        ]);
        $data->update([
            'photo' => $nama_file,
            'name' => $request->name,
            'slug' =>str_slug($request->name,'-'),
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'user_id'=>auth::user()->id,
        ]);
        return redirect()->route('product.index')->with('edit','data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=product::findOrFail($id);
        $data->delete();
        return redirect()->route('product.index')->with('edit','data berhasil di delete');
    }
}
