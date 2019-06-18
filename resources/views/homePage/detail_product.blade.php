@extends('homePage.layouts.app')
@section('content')



<div id="heading-breadcrumbs">
    <div class="container">
      <div class="row d-flex align-items-center flex-wrap">
        <div class="col-md-7">
        <h1 class="h2">{{$detail_product->name}}</h1>
        </div>
        <div class="col-md-5">
          <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('product.category',$detail_product->slug)}}">{{$detail_product->category->name}}</a></li>
            <li class="breadcrumb-item active">{{$detail_product->name}}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div id="content">
    <div class="container">
      <div class="row bar">
        <!-- LEFT COLUMN _________________________________________________________-->
        <div class="col-lg-9">
          <p class="lead">Built purse maids cease her ham new seven among and. Pulled coming wooded tended it answer remain me be. So landlord by we unlocked sensible it. Fat cannot use denied excuse son law. Wisdom happen suffer common the appear ham beauty her had. Or belonging zealously existence as by resources.</p>
          <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Scroll to product details, material & care and sizing</a></p>
          <div id="productMain" class="row">
            <div class="col-sm-6">
            <div> <img src="{{asset('assets/dist/img/'.$detail_product->photo)}}" alt="" class="img-fluid"></div>
              {{-- <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                <div> <img src="img/detailbig1.jpg" alt="" class="img-fluid"></div>
                <div> <img src="img/detailbig2.jpg" alt="" class="img-fluid"></div>
                <div> <img src="img/detailbig3.jpg" alt="" class="img-fluid"></div>
              </div> --}}
            </div>

            <div class="col-sm-6">
                   <h2 class="text-center">{{$detail_product->name}}</h2>
              <div class="box mt-2">
                    <form action="{{route('cart.index')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$detail_product->id}}">
                    <p>stock:{{$detail_product->stock}}</p>
                    <p>weigth:{{$detail_product->weigth}}</p>
                    <select class="bs-select">
                      <option value="small">jne</option>
                      <option value="medium">Medium</option>
                      <option value="large">Large</option>
                      <option value="x-large">X Large</option>
                    </select><br>
                   <label for="qyt">qyt:</label>
                    <select class="bs-select" name="qyt">
                    @for ($i = 1; $i <=$detail_product->stock; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                    {{-- tombol + - --}}
                    {{-- <table>
                      <tr>
                         <button id="1">+</button>
                         <input type='text' id='isi' value="1" />
                         <button id="2">-</button>
                      </tr>
                  </table>
                  <script type="text/javascript">
                            var reply_click = function()
                            {
                              var x=this.innerHTML;
                              var old= document.getElementById('isi').value;
                              console.log(old);
                              if(x == '+'){
                                 var data=parseFloat(old)+1;

                              }
                              else{
                                if(old >0){
                                  data= parseFloat(old)-1;
                                }
                                else{
                                  data=0;
                                }
                              }
                              document.getElementById('isi').value=data;
                           }
                              document.getElementById('1').onclick = reply_click;
                              document.getElementById('2').onclick = reply_click;
                </script> --}}
                  <p class="price">
                     IDR: {{ number_format($detail_product->price)}}
                  </p>
                  <p class="text-center">
                  <button type="submit" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                    {{-- <button type="submit" data-toggle="tooltip" data-placement="top" title="Add to wishlist" class="btn btn-default"><i class="fa fa-heart-o"></i></button> --}}
                  </p>
                </form>
              </div>
              {{-- <div data-slider-id="1" class="owl-thumbs">
                <button class="owl-thumb-item"><img src="img/detailsquare.jpg" alt="" class="img-fluid"></button>
                <button class="owl-thumb-item"><img src="img/detailsquare2.jpg" alt="" class="img-fluid"></button>
                <button class="owl-thumb-item"><img src="img/detailsquare3.jpg" alt="" class="img-fluid"></button>
              </div> --}}
            </div>
          </div>

            <div class="avatar"> <a href="{{route('supliyer.detail',$detail_product->user_id)}}"><img alt="" width="70" src="{{ asset('assets/dist/img/'.$detail_product->user->photo)}}" class="img-fluid rounded-circle"> </a>
                    <div class="title">
                        <p class="ml-3">{{$detail_product->user->name}}</p>
                    </div>
            </div>

          <div id="details" class="box mb-4 mt-4">

            <h4>Product details</h4>
            {{-- <p>White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>
            <h4>Material & care</h4>
            <ul>
              <li>Polyester</li>
              <li>Machine wash</li>
            </ul>
            <h4>Size & Fit</h4>
            <ul>
              <li>Regular fit</li>
              <li>The model (height 5'8 "and chest 33") is wearing a size S</li>
            </ul>
            <blockquote class="blockquote">
              <p class="mb-0"><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em></p>
            </blockquote> --}}
            <p>{!!$detail_product->description!!}</p>

          </div>

          <div id="product-social" class="box social text-center mb-5 mt-5">
            <h4 class="heading-light">Show it to your friends</h4>
            <ul class="social list-inline">
              <li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="external facebook"><i class="fa fa-facebook"></i></a></li>
              <li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="external gplus"><i class="fa fa-google-plus"></i></a></li>
              <li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="external twitter"><i class="fa fa-twitter"></i></a></li>
              <li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="email"><i class="fa fa-envelope"></i></a></li>
            </ul>
          </div>
          <div class="row">
                <div class="col-lg-3 col-md-6">
                <div class="box text-uppercase mt-0 mb-small">
                    <h3>You may also like these products</h3>
                </div>
                </div>
                @foreach ($product as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="product">
                        <div class="image"><a href="{{route('product.detail.category',$item->slug)}}"><img src="{{asset('assets/dist/img/'.$item->photo)}}" alt="" class="img-fluid image1"></a></div>
                            <div class="text">
                            <h3 class="h5"><a href="{{route('product.detail.category',$item->slug)}}">{{$item->name}}</a></h3>
                            <p class="price">{{$item->price}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
          </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">Categories</h3>
                </div>
                <div class="panel-body">
                    @php
                        $x=$detail_product->category_id;
                    @endphp
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
        </div>
      </div>
    </div>
  </div>
  <!-- GET IT-->
  <div class="get-it">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-center p-3">
          <h3>Do you want cool website like this one?</h3>
        </div>
        <div class="col-lg-4 text-center p-3">   <a href="#" class="btn btn-template-outlined-white">Buy this template now</a></div>
      </div>
    </div>
  </div>
@endsection
