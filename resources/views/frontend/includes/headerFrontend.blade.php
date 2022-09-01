<div id="sticky-header" class="menu__area transparent-header">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                            <div class="menu__wrap">
                                <nav class="menu__nav">
                                    <div class="logo">
                                        <a href="index.html" class="logo__black"><img src="{{ asset('frontend/assets/img/logo/logo_black.png')}}" alt=""></a>
                                        <a href="index.html" class="logo__white"><img src="{{ asset('frontend/assets/img/logo/logo_white.png')}}" alt=""></a>
                                    </div>
                                    <div class="navbar__wrap main__menu d-none d-xl-flex">
                                        <ul class="navigation">
                                            <li class="active"><a href="{{route('hompage')}}">Home</a></li>
                                            <li><a href="{{route('front.about')}}">About</a></li>
                                            <li><a href="services-details.html">Services</a></li>
                                            <li class="menu-item-has-children"><a href="#">Portfolio</a>
                                                <ul class="sub-menu">
                                                    <li><a href="{{route('portfolio.home')}}">Portfolio</a></li>
                                                    <li><a href="{{route('portfolio.detailss')}}">Portfolio Details</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">Our Blog</a>
                                                <ul class="sub-menu">
                                                    <li><a href="blog.html">Our News</a></li>
                                                    <li><a href="blog-details.html">News Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">contact me</a></li>
                                        </ul>
                                    </div>
                                    <div class="header__btn d-none d-md-block">
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