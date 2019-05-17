@extends('admin.layouts.app')

@section('asset-top')
<link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
            <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Add category</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                <form action="{{route('category.store')}}" method="post">
                    @csrf
                      <div class="box-body">
                        <div class="form-group">
                          <label for="category">category</label>
                          <input type="text" class="form-control" id="category" placeholder="Enter name" name="name" category">
                        </div>
                        <div class="form-group">
                                <label for="category">icon</label>
                                <input type="text" class="form-control" id="icon" placeholder="Enter icon" name="icon">
                        </div>
                        <div class="form-group">
                          <label for="id">Password</label>
                          <select name="parent_id" id="id" class="form-control">
                              <option value="">pilih kategori</option>
                              @foreach ($data as $item)
                                 <option value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                </form>
            </div>
    </div>
    <div class="col-md-6">
            <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Add category</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('category.add')}}" method="post">
                            @csrf
                            <div class="form-group">
                                    <label for="category">category</label>
                                    <input type="text" class="form-control" id="icon" placeholder="masukkan name category ex:gadget" name="name">
                            </div>
                            <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
            </div>
    </div>
</div>
{{-- end div row atas --}}
    <div class="row">
        <div class="col-md-12">
                <div class="box">
                        <div class="box-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>sub Category</th>
                                </tr>
                            </thead>
                            <tbody>
                           @php
                               $no=1;
                           @endphp
                            @foreach ($data as $item)
                            <tr>
                                    <td>{{$no++}}</td>
                                    <form action="{{route('category.destroy',$item->id)}}" method="post">
                                        @csrf
                                        <td>{{$item->name}} <a href="{{route('category.edit',$item->id)}}">edit</a>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger btn-xs">delete</button>
                                        </td>
                                    </form>
                                    <td>
                                        <ul>
                                            @foreach ($item->masterCategory as $key)
                                                <li> {{ $key->name}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                            <td>
                                <ul>
                                    @foreach ($item->masterCategory as $key)
                                        <form action="{{route('category.destroy',$key->id)}}" method="post">
                                            @csrf
                                            <li>
                                            <a href="{{route('category.edit',$key->id)}}">edit</a>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger btn-xs" >delete</button>

                                            </li>
                                        </form>
                                    @endforeach
                                </ul>
                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.box-body -->

                      <!-- /.box -->
        </div>
    </div>
 @endsection

</div>
@section('asset-buttom')
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
            $(function () {
              $('#example1').DataTable()
              $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
              })
            })
          </script>
@endsection


