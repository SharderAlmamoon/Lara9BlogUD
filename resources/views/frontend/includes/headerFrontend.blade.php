           
           @php 
               $route = Route::current()->getName();
           @endphp
           
           <div id="sticky-header" class="menu__area transparent-header">
<div class="container custom-container">
<div class="row">
    <div class="col-12">
        <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
        <div class="menu__wrap">
            <nav class="menu__nav">
                <div class="logo">
                    <a href="{{route('hompage')}}" class="logo__black"><img src="{{ asset('frontend/assets/img/logo/logo_black.png')}}" alt=""></a>
                    <a href="{{route('hompage')}}" class="logo__white"><img src="{{ asset('frontend/assets/img/logo/logo_white.png')}}" alt=""></a>
                </div>
                <div class="navbar__wrap main__menu d-none d-xl-flex">
                    <ul class="navigation">
                        <li class="{{($route == 'hompage')? 'active':''}}"><a href="{{route('hompage')}}">Home</a></li>
                        <li class="{{($route == 'front.about')? 'active':''}}"><a href="{{route('front.about')}}">About</a></li>
                        <li><a href="services-details.html">Services</a></li>
                        <li class="{{($route == 'portfolio.detailss')? 'active':''}}"><a href="{{route('portfolio.detailss')}}">Portfolio</a></li>
                       <li class="{{($route == 'ourblog.home')? 'active':''}}"><a href="{{route('ourblog.home')}}">Our Blogs</a></li>
                        <li><a href="contact.html">contact me</a></li>
                    </ul>
                </div>
                <div class="header__btn d-md-block">
                    <a href="contact.html" class="btn">Contact me</a>
                </div>
            </nav>
        </div>
        <!-- Mobile Menu  -->
        @include('frontend.includes.mobailmenu')
                            <!-- End Mobile Menu -->
                        </div>
                    </div>
                </div>
            </div>