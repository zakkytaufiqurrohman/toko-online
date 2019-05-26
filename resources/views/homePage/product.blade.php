@extends('homePage.layouts.app')
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
      <div class="row d-flex align-items-center flex-wrap">
        <div class="col-md-7">
          <h1 class="h2">PRODUCT</h1>
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
        <div class="col-md-9">
          <div class="row products products-big">
            @if (count($data) >0)
            @php
                $x;
            @endphp
                @foreach ($data as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="product">
                    <div class="image"><a href="{{route('product.detail.category',$item->slug)}}"><img src="{{asset('assets/dist/img/'.$item->photo)}}" alt="" class="img-fluid image1"></a></div>
                    <div class="text">
                    <h3 class="h5"><a href="{{route('product.detail.category',$item->slug)}}">{{$item->name}}</a></h3>
                    <p class="price">{{$item->price}}</p>
                    </div>
                    </div>
                </div>
                @php
                    $x=$item->category_id;
                @endphp
                @endforeach
            @else
                @php
                    $x="tidak ada"
                @endphp
                <h5>Product tidak tersedia</h5>
            @endif
          </div>
          <div class="row">
            <div class="col-md-12 banner mb-small"><a href="#"><img src="img/banner2.jpg" alt="" class="img-fluid"></a></div>
          </div>
          <div class="pages">
            <nav class="d-flex justify-content-center">
                {{$data->links()}}
            </nav>
          </div>
        </div>
        <div class="col-md-3">
          <!-- MENUS AND FILTERS-->
          <div class="panel panel-default sidebar-menu">
            <div class="panel-heading">
              <h3 class="h4 panel-title">Categories</h3>
            </div>
            <div class="panel-body">
              <ul class="nav nav-pills flex-column text-sm category-menu">
                @foreach ($category as $item)
              <li class="nav-item"><a href="shop-category.html" class="nav-link d-flex align-items-center justify-content-between"><span> {{ $item->name}} </span><span class="badge badge-light"></span></a>
                        <ul class="nav nav-pills flex-column">
                            @foreach ($item->masterCategory as $sub)
                            @if ($x==$sub->id)
                                <li class="nav-item"><a href="{{route('product.category',$sub->slug)}}" class="nav-link active nav-link d-flex align-items-center justify-content-between">{{$sub->name}}</a></li>
                            @else
                                <li class="nav-item"><a href="{{route('product.category',$sub->slug)}}" class="nav-link">{{$sub->name}}</a></li>
                            @endif

                            @endforeach
                        </ul>
                     </li>
                @endforeach
              </ul>
            </div>
          </div>
          {{-- <div class="panel panel-default sidebar-menu">
            <div class="panel-heading d-flex align-items-center justify-content-between">
              <h3 class="h4 panel-title">Brands</h3><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times-circle"></i><span class="d-none d-md-inline-block">Clear</span></a>
            </div>
            <div class="panel-body">
              <form>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Armani  (10)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Versace  (12)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Carlo Bruni  (15)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Jack Honey  (14)
                    </label>
                  </div>
                </div>
                <button class="btn btn-sm btn-template-outlined"><i class="fa fa-pencil"></i> Apply</button>
              </form>
            </div>
          </div>
          <div class="panel panel-default sidebar-menu">
            <div class="panel-heading d-flex align-items-center justify-content-between">
              <h3 class="h4 panel-titlen">Colours</h3><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times-circle"></i><span class="d-none d-md-inline-block">Clear</span></a>
            </div>
            <div class="panel-body">
              <form>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"><span class="colour white"></span> White (14)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"><span class="colour blue"></span> Blue (10)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"><span class="colour green"></span>  Green (20)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"><span class="colour yellow"></span>  Yellow (13)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"><span class="colour red"></span>  Red (10)
                    </label>
                  </div>
                </div>
                <button class="btn btn-sm btn-template-outlined"><i class="fa fa-pencil"></i> Apply</button>
              </form>
            </div>
          </div> --}}
          <div class="banner"><a href="shop-category.html"><img src="img/banner.jpg" alt="sales 2014" class="img-fluid"></a></div>
        </div>
      </div>
    </div>
  </div>
@endsection
