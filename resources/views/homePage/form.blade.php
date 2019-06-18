@extends('homePage.layouts.app')
@section('head')

@endsection
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
      <div class="row d-flex align-items-center flex-wrap">
        <div class="col-md-7">
          <h1 class="h2">keranjang</h1>
        </div>
        <div class="col-md-5">
          <ul class="breadcrumb d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">PRODUCT</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div id="content">
    <div class="container">
        <div class="row">
            <div id="checkout" class="col-lg-9">
              <div class="box border-bottom-0">
                <form method="get" action="shop-checkout2.html">
                  <div class="content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="name">name</label>
                          <input id="name" type="text" class="form-control">
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="email">email</label>
                          <input id="email" type="email" class="form-control">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                      {{-- <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                          <label for="alamat">alamat</label>
                          <input id="alamat" type="text" class="form-control">
                        </div>
                      </div> --}}
                      <div class="col-sm-6 col-md-4">

                        @php
                            $city=city();
                            $city=json_decode($city,true);
                        @endphp
                        <div class="form-group">
                          <label for="state">kota</label>
                          <select id="courier" class="form-control">
                              <option value="">pilih courier</option>
                              <option value="jne">jne</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                          <label for="kota">kota</label>
                          <select id="courier" class="form-control">
                              <option value="">kota</option>
                              @foreach ($city['rajaongkir']['results'] as $kota)   
                                <option value="jne">{{ $kota['city_name']}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                          <label for="country">kode pos</label>
                          <input type="number" name="kode_pos" class="form-control">
                        </div>
                    </div>
                    </div>
                  </div>
                  <div class="box-footer d-flex flex-wrap align-items-center justify-content-between">
                    <div class="left-col"><a href="shop-basket.html" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i>Back to basket</a></div>
                    <div class="right-col">
                      <button type="submit" class="btn btn-template-main">Continue to Delivery Method<i class="fa fa-chevron-right"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        <div class="col-lg-3">
          <div id="order-summary" class="box mt-0 mb-4 p-0">
                <div class="box-header mt-0">
                    <h3>Order summary</h3>
                </div>
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td>Order subtotal</td>
                    <th>$446.00</th>
                  </tr>
                  <tr>
                    <td>Shipping and handling</td>
                    <th>$10.00</th>
                  </tr>
                  <tr>
                    <td>Tax</td>
                    <th>$0.00</th>
                  </tr>
                  <tr class="total">
                    <td>Total</td>
                    <th>$456.00</th>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        {{-- end summary --}}
      </div>
    </div>
  </div>
@endsection
@section('footer')
<script>
        function saveCart(obj) {
            var key = $(obj).attr("id");
            var data = $(obj).val();
            $.ajax({
               url: "update/"+data,
               type:"get",
               data: {'value':data,'key':key},
                  success:function(data){
                  window.location.href = "keranjang";
               },error:function(){
                   alert("error!!!!");
               }
           }); //end
        }
</script>
@endsection
