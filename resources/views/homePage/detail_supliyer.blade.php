@extends('homePage.layouts.app')
@section('content')

<div id="content">
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
            <h1 class="h2"> ALL Produk/{{$supliyer->user->name}}</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb d-flex justify-content-end">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">{{$supliyer->user->name}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row bar">
      <div class="col-md-12">
        <div class="products-big">
          <div class="row products">
            @if (count($detail_supliyer)>0)
                @foreach ($detail_supliyer as $item)
                <div class="col-lg-3 col-md-4">
                        <div class="product">
                        <div class="text">
                        <h3>{{ $item->name}}</h3>
                        </div>
                        <div class="image"><a href="{{route('product.detail.category',$item->slug)}}"><img src="{{asset('assets/dist/img/'.$item->photo)}}" alt="" class="img-fluid image1"></a></div>
                        <div class="text">
                        <h3 class="h5"><a href="{{route('product.detail.category',$item->slug)}}">{!!$item->description!!}</a></h3>
                        <p class="price">{{number_format($item->price)}}</p>
                        </div>
                        </div>
                    </div>
                @endforeach
            @else
                    <h1>Tidak ada produk</h1>
            @endif
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

