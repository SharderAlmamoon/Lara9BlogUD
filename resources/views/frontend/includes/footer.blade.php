<footer class="footer">
            <div class="container">
                <div class="row justify-content-between">
                    @foreach($footer as $foot)
                    <div class="col-lg-4">
                        <div class="footer__widget">
                            <div class="fw-title">
                                <h5 class="sub-title">Contact us</h5>
                                <h4 class="title">{{$foot->number}}</h4>
                            </div>
                            <div class="footer__widget__text">
                                <p>{!! Str::limit($foot->footer_short_description,500) !!}</p>
                            </div>
                            <!-- {!! Str::limit($foot->footer_short_description,150) !!} -->
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="footer__widget">
                            <div class="fw-title">
                                <h5 class="sub-title">my address</h5>
                                <h4 class="title">BANGLADESH</h4>
                            </div>
                            <div class="footer__widget__address">
                            <p>{{$foot->address}}</p>
                                <a href="mailto:noreply@envato.com" class="mail">{{$foot->email}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="footer__widget">
                            <div class="fw-title">
                                <h5 class="sub-title">Follow me</h5>
                                <h4 class="title">socially connect</h4>
                            </div>
                            <div class="footer__widget__social">
                                <p>{!! Str::limit($foot->footer_short_description,200) !!}</p>
                                <ul class="footer__social__list">
                                    <li><a href="{{$foot->facebook_link}}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{$foot->twitter_link}}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{$foot->dribble_link}}"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="{{$foot->linkedin_link}}"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="{{$foot->pinterest_link}}"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright__wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright__text text-center">
                                <p>{{$foot->copywrite_text}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </footer>