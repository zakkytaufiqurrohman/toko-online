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
      <div class="row bar mb-0">
        <div id="customer-orders" class="col-md-9">
          <p class="text-muted lead">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
          <div class="box mt-0 mb-lg-0">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>no </th>
                    <th>code</th>
                    <th>nama</th>
                    <th>ekspedisi</th>
                    <th>Status</th>
                    <th>menu</th>
                  </tr>
                </thead>
                <tbody>

               @php
                   $no=1;
               @endphp
                @foreach ($data as $item)
                    <tr>
                        <th>{{$no++}}</th>
                        <td>{{$item->code}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->ekspedisi['name']}}</td>
                        @if ($item->status == 0)
                            <td><span class="badge badge-info">belum</span></td>
                            @else
                            <td><span class="badge badge-success">sudah</span></td>
                        @endif
                    <td><a href="{{url('order/'.$item->code)}}" class="btn btn-template-outlined btn-sm">View</a></td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
