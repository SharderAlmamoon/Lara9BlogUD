<section id="aboutSection" class="about">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                           
                            <ul class="about__icons__wrap">
                            @foreach($gallery as $g)
                                <li>
                                 <img class="light" src="{{ asset('backend/Aboutgallery/'.$g->gallery_about_image)}}" alt="XD">
                                </li>
                            @endforeach
                            </ul>
                           
                        </div>
                        @foreach($aboutAll as $about)
                        <div class="col-lg-6">
                            <div class="about__content">
                                <div class="section__title">
                                    <span class="sub-title">01 - About me</span>
                                    <h2 class="title">{{$about->title}}</h2>
                                </div>
                                <div class="about__exp">
                                    <div class="about__exp__icon">
                                        <img src="{{ asset('frontend/assets/img/icons/about_icon.png')}}" alt="">
                                    </div>
                                    <div class="about__exp__content">
                                        <p>{{$about->short_title}}</p>
                                    </div>
                                </div>
                                <p class="desc">{{$about->short_description}}</p>
                                <a href="{{asset('backend/CV/'.'almamun_resume.pdf')}}" download class="btn">Download my resume</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>