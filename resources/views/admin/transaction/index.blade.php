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
          <th>kode</th>
          <th>name</th>
          <th>ekpedisi</th>
          <th>status</th>
        </tr>
        </thead>
        <tbody>
            @php
                $no=1;
            @endphp
            @foreach ($data as $item)
            <tr>
                <td>{{ $no++}}</td>
                <td>{{ $item->code}}</td>
                <td>{{ $item->user->name}}</td>
                <td>{{ $item->ekspedisi['name']}}</td>
                <td>
                    @if ($item->status == 0)
                        <a href="{{url('admin/transaction/'.$item->code.'/'.$item->status)}}" class="btn btn-danger btn-sm">belum</a>
                    @else
                      <a href="{{url('admin/transaction/'.$item->code.'/'.$item->status)}} " class="btn btn-primary btn-sm">lunas</a>
                    @endif
                    <a href="{{url('admin/transaction/'.$item->code)}}" class="btn btn-primary btn-sm">detail</a>
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
