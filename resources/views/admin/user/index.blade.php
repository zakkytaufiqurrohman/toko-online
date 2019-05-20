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
          <th>no</th>
          <th>nama</th>
          <th>photo</th>
          <th>email</th>
          <th>address</th>
          <th>phone</th>
          <th>role</th>
          <th>status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $no=1;
            @endphp
            @foreach ($data as $item)
            <tr>
                <td>{{ $no++}}</td>
                <td>{{ $item->name}}</td>
                <td><img src="{{ asset('assets/dist/img/'.$item->photo)}}" alt="" width="60"></td>
                <td>{{ $item->email}}</td>
                <td>{{ $item->address}}</td>
                <td>{{ $item->phone}}</td>
                <td>{{ $item->role}}</td>
                <td>
                    @if ($item->status == 0)
                        <a href="{{url('admin/user/'.$item->id)}}" class="btn btn-danger btn-sm">blokir</a>
                    @else
                      <a href="{{url('admin/user/'.$item->id)}} " class="btn btn-primary btn-sm">aktif</a>
                    @endif



                </td>
                <td >
                    <form action="{{route('user.delete',$item->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{route('user.edit',$item->id)}}" class="glyphicon glyphicon-pencil btn"></a>|
                        <button  class="glyphicon glyphicon-trash" onclick="return myFunction()";></button>

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
    <script>
        function myFunction() {
                if(!confirm("Are You Sure to delete this"))
                event.preventDefault();
            }
    </script>
@endsection
