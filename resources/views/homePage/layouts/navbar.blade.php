
<header class="nav-holder make-sticky">
        <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
          <div class="container"><a href="index.html" class="navbar-brand home"><img src="img/logo.png" alt="Universal logo" class="d-none d-md-inline-block"><img src="img/logo-small.png" alt="Universal logo" class="d-inline-block d-md-none"><span class="sr-only">Universal - go to homepage</span></a>
            <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <div id="navigation" class="navbar-collapse collapse">
              <ul class="nav navbar-nav ml-auto">
              <li class="nav-item  active"><a href="{{route('home')}}" >Home</a>
                </li>
            <li class="nav-item dropdown menu-large"><a href="{{route('product')}}" >Product</a>
                </li>
                <!-- ========== FULL WIDTH MEGAMENU ==================-->
                <li class="nav-item dropdown menu-large"><a href="#" data-hover="dropdown" data-delay="200" ">Supplier </a>
                </li>
                      <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle">Category <b class="caret"></b></a>
                  <ul class="dropdown-menu megamenu">
                    <li>
                      <div class="row">
                        @foreach ($category as $cat)
                            <div class="col-md-6 col-lg-3">
                            <a href="{{route('product.category',$cat->slug)}}"><h5>{{$cat->name}}</h5></a>
                                @foreach ($cat->masterCategory as $item)
                                <ul class="list-unstyled mb-3">
                                <li class="nav-item"><a href="{{route('product.category',$item->slug)}}" class="nav-link">{{$item->name}}</a></li>
                                </ul>
                                @endforeach
                            </div>
                        @endforeach
                     </div>
                    </li>
                  </ul>
                </li>
                <!-- ========== FULL WIDTH MEGAMENU END ==================-->
                <!-- ========== Contact dropdown ==================-->
                <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Contact <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item"><a href="contact.html" class="nav-link">Contact option 1</a></li>
                    <li class="dropdown-item"><a href="contact2.html" class="nav-link">Contact option 2</a></li>
                    <li class="dropdown-item"><a href="contact3.html" class="nav-link">Contact option 3</a></li>
                  </ul>
                </li>
                <!-- ========== Contact dropdown end ==================-->
              </ul>
            </div>
            <div id="search" class="collapse clearfix">
              <form role="search" class="navbar-form">
                <div class="input-group">
                  <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button></span>
                </div>
              </form>
            </div>
          </div>
        </div>
</header>
