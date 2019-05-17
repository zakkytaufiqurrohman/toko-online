@extends('admin.layouts.app')

@section('asset-top')
<link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')
<div class="row">
    @if ($data->parent_id != NULL)
    <div class="col-md-12">
            <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Add category</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                <form action="{{route('category.update',$data->id)}}" method="post">
                    <input type="hidden" name="_method" value="PATCH" >
                    @csrf
                      <div class="box-body">
                        <div class="form-group">
                          <label for="category">category</label>
                        <input type="text" class="form-control" id="category" placeholder="Enter name" name="name" value="{{$data->name}}">
                        </div>
                        <div class="form-group">
                                <label for="category">icon</label>
                                <input type="text" class="form-control" id="icon"  name="icon" value="{{$data->icon}}" required>
                        </div>
                        <div class="form-group">
                          <label for="id">kategori</label>
                          @php
                              $selectized=$data->parent_id;
                          @endphp
                          <select name="parent_id" id="id" class="form-control">
                              <option value="">pilih kategori</option>
                              @foreach ($category as $item)
                                @if ($item->parent_id == null)
                                    <option value="{{$item->id}}" {{ $selectized ==$item->id ? 'selected="selected"': ''}}>{{$item->name}}</option>
                                @else

                                @endif

                              @endforeach
                          </select>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                      </div>
                </form>
            </div>
    </div>
    @else
    <div class="col-md-12">
            <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Add category</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('category.update',$data->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH" >
                            <div class="form-group">
                                    <label for="category">category</label>
                                    <input type="text" class="form-control"  id="icon" placeholder="masukkan name category ex:gadget" name="name" value="{{$data->name}}" required >
                            </div>
                            <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
            </div>
    </div>
    @endif
</div>
@endsection
@section('asset-buttom')
@endsection
