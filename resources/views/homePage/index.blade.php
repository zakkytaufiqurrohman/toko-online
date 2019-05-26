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
                    <div class="image"><a href="{{route('product.detail.category',$item->slug)}}"><img src="{{asset('assets/dist/img/'.$item->photo)}}" alt="" class="img-fluid image1"></a></div>
                    <div class="text">
                    <h3 class="h5"><a href="{{route('product.detail.category',$item->slug)}}">{!!$item->description!!}</a></h3>
                    <p class="price">{{number_format($item->price)}}</p>
                    </div>
                    </div>
                </div>
            @endforeach
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

