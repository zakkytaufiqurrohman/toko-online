@extends('admin.layouts.app')

@section('asset-top')
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> AdminLTE, Inc.
          <small class="pull-right">Date: 2/10/2014</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
       from:
        <address>
          <strong>{{$data->user->name}}</strong><br>
          {{$data->user->address}}<br>
          Email: {{ $data->user->email}}
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>{{$data->name}}</strong><br>
            {{$data->address}}<br>
            {{$data->portal_code}}<br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice: {{$data->code}}</b><br>
        <br>
        <b>ekspedisi:{{ $data->ekspedisi['name']}}</b><br>

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Qty</th>
            <th>Product</th>
            <th>price</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
            @php
                $total=0;
            @endphp
            @foreach ($datas as $item)
                    <tr>
                        <td>{{ $item->qyt}}</td>
                        <td>{{ $item->product->name}} <img src="{{ asset('assets/dist/img/'.$item->product->photo)}}" alt="product" width="50"></td>
                        <td>{{ number_format($item->product->price)}}</td>
                        <td>{{ number_format($item->subtotal)}}</td>
                    </tr>
                    @php
                        $total +=$item->subtotal;
                    @endphp
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <strong><p class="lead">Rekening</p></strong>
        <p class="lead">BRI :00000000</p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          silahkan transfer ke nomor rekening di atas
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Amount Due 2/22/2014</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td> {{ number_format($total)}}</td>
            </tr>

            <tr>
              <th>ongkir:</th>
              <td>{{ number_format($data->ekspedisi['value'])}}</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>{{ number_format($total+$data->ekspedisi['value'])}}</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-xs-12">
        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
        </button>
        <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
          <i class="fa fa-download"></i> Generate PDF
        </button>
      </div>
    </div>
  </section>
  <!-- /.content -->
  <div class="clearfix"></div>
</div>

@endsection

@section('asset-buttom')

@endsection
