@extends('homePage.layouts.app')
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
      <div class="row d-flex align-items-center flex-wrap">
        <div class="col-md-7">
          <h1 class="h2">Order</h1>
        </div>
        <div class="col-md-5">
          <ul class="breadcrumb d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Order</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div id="content">
        <div class="container">
          <div class="row bar">
            <div id="customer-order" class="col-lg-9">
              <p class="lead">Order #1735 was placed on <strong>22/06/2013</strong> and is currently <strong>Being prepared</strong>.</p>
              <p class="lead text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
              <div class="box">
                <div class="table-responsive">
                  <table class="table">
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
                    <tfoot>
                      <tr>
                        <th colspan="3" class="text-right">Order subtotal</th>
                        <th>{{ number_format($total)}}</th>
                      </tr>
                      <tr>
                        <th colspan="3" class="text-right">ongkir</th>
                        <th>{{ number_format($data->ekspedisi['value'])}}</th>
                      </tr>

                      <tr>
                        <th colspan="3" class="text-right">Total</th>
                        <th>{{ number_format($total+$data->ekspedisi['value'])}}</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="row addresses">
                  <div class="col-md-6 text-left">
                    <h3 class="text-uppercase">Invoice address</h3>
                    <p><strong>invoice:{{$data->code}}<br>{{$data->user->name}}</strong><br>
                        {{$data->user->address}}<br>
                        Email:{{ $data->user->email}}</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <h3 class="text-uppercase">Shipping address</h3>
                    <p><strong>{{$data->name}}</strong><br>
                        {{$data->address}},{{$data->portal_code}}<br>
                        status:
                        @if ($data->status==0)
                            lunas
                        @else
                            belum
                        @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>

@endsection
