@extends('admin.layouts.app')

@section('asset-top')
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<div class="box">
    <div class="box-header">
      <h3 class="box-title">list pruduct</h3>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if ($message = Session::get('edit'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
  @endif
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>photo</th>
          <th>name</th>
          <th>Description</th>
          <th>stok</th>
          <th>price</th>
          <th>action</th>
        </tr>
        </thead>
        <tbody>

            @foreach ($data as $item)
            <tr>
                <td><img src="{{ asset('/assets/dist/img/'.$item->photo)}}" width="50" alt=""></td>
                <td>{{ $item->name}}</td>
                <td>{!! $item->description!!}</td>
                <td>{{ $item->stock}}</td>
                <td>{{ $item->price}}</td>
                <td>
                <form action="{{route('product.destroy',$item->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <a href="" class="btn btn-info btn-sm">show</a>
                    <a href="{{ route('product.edit',$item->id)}}" class="btn btn-primary btn-sm">edit</a>
                    <button class="btn btn-danger btn-sm" onclick="return myFunction()";>delete</button>
                </form>
                </td>
            </tr>
             @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
@endsection

@section('asset-buttom')
  <!-- DataTables -->
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
    <script>
            function myFunction() {
                if(!confirm("Are You Sure to delete this"))
                event.preventDefault();
            }
           </script>
@endsection
