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
      <div class="row bar">
        <div class="col-lg-12">
          <p class="text-muted lead">You currently have 3 item(s) in your cart.</p>
        </div>
        <div id="basket" class="col-lg-9">
          <div class="box mt-0 pb-0 no-horizontal-padding">
            <form method="get" action="shop-checkout1.html">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="2">Product</th>
                      <th>Quantity</th>
                      <th>Unit price</th>

                      <th colspan="2">Total</th>
                    </tr>
                  </thead>
                  <tbody id="update">
                        <?php foreach(Cart::content() as $row) :?>
                            @php $i=0; @endphp
                            <tr>
                                <td>
                                    <td><?php echo $row->name ?></td>
                                    <td>
                                   <input type="text" name="pages_title[{{$i}}]" class="qyt" onBlur="saveCart(this);" value="<?php echo $row->qty; ?>" id="{{$row->rowId}}" class="form-control">
                                    {{-- <input type="text" value="{{$row->rowId}}" class="key"> --}}
                                    </td>
                                    <td>RP.<?php echo $row->price; ?></td>
                                    <td>Rp.<?php echo $row->subtotal; ?></td>
                                <td><a href="{{route('cart.delete',$row->rowId)}}" ><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                        <?php endforeach;?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="4">Total</th>
                      <th colspan="2"><?php echo Cart::subtotal(); ?></th>
                    </tr>
                  </tfoot>
                </table>
              </div>

              <div class="box-footer d-flex justify-content-between align-items-center">
                <div class="left-col"><a href="shop-category.html" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
                <div class="right-col">
                <a href="{{route('cart.form')}}" class="btn btn-template-outlined">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
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
