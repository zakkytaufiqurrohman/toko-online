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
              <form method="post" action="{{route('transaction')}}">
                @csrf

                  <div class="content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="name">name</label>
                          <input id="name" type="text" class="form-control" name="name">
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="email">email</label>
                          <input id="email" type="email" class="form-control" name="email">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        @php
                            $city=city();
                            $city=json_decode($city,true);
                        @endphp
                      <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                          <label for="select-search">kota</label>
                          <select id="select-search" class="form-control" onchange="test()" >
                              <option value="">kota</option>
                              @foreach ($city['rajaongkir']['results'] as $kota)
                                <option value="{{$kota['city_id']}}">{{ $kota['city_name']}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                          <label for="country">kode pos</label>
                          <input type="text" name="portal_code" class="form-control" id="kode_pos">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                              <label for="state">courier</label>
                              <select id="courier" class="form-control" onchange="cek()" >
                                  <option value="">pilih courier</option>
                                  <option value="jne">jne</option>
                                  <option value="tiki">tiki</option>
                              </select>
                            </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                          <label for="province">province</label>
                          <input id="province" type="text" class="form-control" name="province">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                              <label for="alamat">alamat</label>
                              <input id="alamat" type="text" class="form-control" name="address">
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="box-footer d-flex flex-wrap align-items-center justify-content-between">
                    <div class="left-col"><a href="shop-basket.html" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i>Back to basket</a></div>
                    <div class="right-col">
                      <button type="submit" class="btn btn-template-main">Save<i class="fa fa-chevron-right"></i></button>
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
                    <th><?php echo Cart::subtotal(); ?></th>
                  </tr>
                  <tr>
                    <td>Shipping and handling</td>
                    <th id="ongkir"></th>
                  </tr>

                  <tr class="total">
                    <td>Total</td>
                    <td id="total"></td>
                    <th></th>
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
{{-- explode data dari cart karena mengandung , --}}
@php
    $str =Cart::subtotal();
    $str=substr($str,0,-3);
    $str=explode(",",$str);
    for($i=0;$i<count($str);$i++){
        $x[]= $str[$i];
    }
    $x=implode($x);
@endphp
<input type="hidden" name="sum" id="sum" value="{{$x}}">

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
<script>
    function test(){
        cek();
        kota();
    }
</script>
<script>
    function cek(){
     var data=$("#select-search").val();
     var courier=$('#courier').val();
      var x=$("#sum").val();
    //  console.log(x);
     $.ajax({
               url: "ongkir/"+data,
               type:"get",
               data: {'destination':data,'courier':courier},
                    success:function(data){
                    $('#ongkir').text(data);
                    var jml=parseInt(x) + parseInt(data);
                    $('#total').text(jml);
                    // console.log((parseFloat(x)));
                    console.log(jml);
               }
           }); //end
    }
</script>
<script>
    function kota(){
        var data=$("#select-search").val();
       $.ajax({
            type:"get",
            url:"{{url('idkota')}}/"+data,
            dataType: 'json',
            success:function(data){
                $('#province').val(data.rajaongkir.results.province);
                $('#kode_pos').val(data.rajaongkir.results.postal_code);
            }
       })
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script>
        $('#select-search').select2({
            placeholder:"Select a city...",
            allowClear:true
        });
    </script>
@endsection
