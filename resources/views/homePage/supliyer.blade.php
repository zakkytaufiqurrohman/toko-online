@extends('homePage.layouts.app')
@section('content')
        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row d-flex align-items-center flex-wrap">
                    <div class="col-md-7">
                      <h1 class="h2">our supliyer</h1>
                    </div>
                    <div class="col-md-5">
                      <ul class="breadcrumb d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">supliyer</li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="content">
            <div class="container">
                <section class="bar mb-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
                            <h2>Who is responsible for Universal?</h2>
                            </div>
                            <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                            <div class="row text-center">
                                @foreach ($supliyer as $item)
                                    <div class="col-md-2 col-sm-3">
                                        <div data-animate="fadeInUp" class="team-member">
                                        <div class="image"><a href="{{route('supliyer.detail',$item->id)}}"><img src="{{ asset('assets/dist/img/'.$item->photo)}}" alt="" class="img-fluid rounded-circle"></a></div>
                                        <h3><a href="team-member.html">{{$item->name}}</h3>
                                        <p class="role">{{ $item->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
@endsection
