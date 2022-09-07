<section class="blog">
                <div class="container">
                    <div class="row gx-0 justify-content-center">
                        @foreach($allPost as $post)
                        <div class="col-lg-4 col-md-6 col-sm-9">
                            <div class="blog__post__item">
                                <div class="blog__post__thumb">
                                    <a href="blog-details.html"><img src="{{ asset('backend/postImage/'.$post->post_image)}}" width="100%" alt="POSTIMAGE"></a>
                                    <div class="blog__post__tags">
                                        <a href="blog.html">{{$post->categoryName->post_category_name}}</a>
                                    </div>
                                </div>
                                <div class="blog__post__content">
                                    <span class="date">{{$post->created_at->diffForHumans()}}</span>
                                    <h3 class="title"><a href="blog-details.html">{{$post->post_title}}</a></h3>
                                    <a href="{{route('readmore.blog',$post->id)}}" class="read__more">Read mORe</a>
                                </div>
                            </div>
                        </div>
                       @endforeach
                    </div>
                    <div class="blog__button text-center">
                        <a href="blog.html" class="btn">more blog</a>
                    </div>
                </div>
            </section>