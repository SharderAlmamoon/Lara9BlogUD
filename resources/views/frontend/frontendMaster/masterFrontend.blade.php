
<!doctype html>
<html class="no-js" lang="en">
    <head>
       @include('frontend.includes.cssFrontend')
    </head>
    <body>

        <!-- preloader-start -->
        <div id="preloader">
            <div class="rasalina-spin-box"></div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->
       
        <!-- header-area -->

        <header>
        @include('frontend.includes.headerFrontend')
            <!-- HEader TOp -->
        </header>
        <!-- header-area-end -->

        <!-- main-area -->
         @yield('mainfunction')
        <!-- main-area-end -->
        
        <!-- Footer-area -->
        @include('frontend.includes.footer')
        <!-- Footer-area-end -->

		<!-- JS here -->
        @include('frontend.includes.scriptFrontend')
    </body>
</html>
