@extends('homePage.layouts.app')
@section('content')
@include('homePage.layouts.homeSlider')
<div id="content">
<div class="container">
    <div class="row bar">
      <div class="col-md-12">

        <div class="products-big">
          <div class="row products">

        @foreach ($data as $item)
        <div class="col-lg-3 col-md-4">
                <div class="product">
                  <div class="image"><a href="shop-detail.html"><img src="{{asset('assets/user/img/product1.jpg')}}" alt="" class="img-fluid image1"></a></div>
                  <div class="text">
                  <h3 class="h5"><a href="shop-detail.html">{!!$item->description!!}</a></h3>
                  <p class="price">{{number_format($item->price)}}</p>
                  </div>
                </div>
            </div>
        @endforeach


            {{-- <div class="col-lg-3 col-md-4">
              <div class="product">
                <div class="image"><a href="shop-detail.html"><img src="img/product1.jpg" alt="" class="img-fluid image1"></a></div>
                <div class="text">
                  <h3 class="h5"><a href="shop-detail.html">Fur coat</a></h3>
                  <p class="price">$143.00</p>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
        <div class="pages">
          <p class="loadMore text-center"><a href="#" class="btn btn-template-outlined"><i class="fa fa-chevron-down"></i> Load more</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

