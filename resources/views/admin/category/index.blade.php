@extends('admin.layouts.app')

@section('asset-top')
<link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Category</th>
              <th>sub Category</th>
              <th>slug</th>

            </tr>
            </thead>
            <tbody>
           @php
               $no=1;
           @endphp
            @foreach ($data as $item)
            <tr>
                <td>{{$no++}}</td>
                @if ($item->parent_id === NUll)
                    <td>{{$item->name}}</td>
                @else
                <td>
                        <ul>
                            @foreach ($item->masterCategory as $key)
                                <li> {{ $key->name}}</li>
                            @endforeach
                        </ul>
                    </td>
                @endif


                <td>{{$item->slug}}</td>
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
                '