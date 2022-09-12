@extends('frontend.frontendMaster.masterFrontend')
@section('title')
 Almamoon | dashboard
@endsection
@section('mainfunction')
    <main>
        <!-- banner-area -->
        @include('frontend.includes.banner')

        <!-- banner-area-end -->

        <!-- about-area -->
        @include('frontend.includes.about')

        <!-- about-area-end -->

        <!-- services-area -->
        @include('frontend.includes.services')

        <!-- services-area-end -->

        <!-- work-process-area -->

        @include('frontend.includes.workaccess')
        <!-- work-process-area-end -->

        <!-- portfolio-area -->

        @include('frontend.includes.portfolio')
        <!-- portfolio-area-end -->

        <!-- partner-area -->
        @include('frontend.includes.partnar')
        <!-- partner-area-end -->

        <!-- testimonial-area -->
        @include('frontend.includes.testimonial')
        <!-- testimonial-area-end -->

        <!-- blog-area -->
        @include('frontend.includes.blogarea')

        <!-- blog-area-end -->

        <!-- contact-area -->
        @include('frontend.includes.contactFrom')
        <!-- contact-area-end -->
    </main>
@endsection