<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('backend.includes.metaTagAdmin')
    <title>AdminDashboard</title>
    
    <!-- vendor css -->
    
    @include('backend.includes.title&CssAll')
    
</head>

<body>
    
    <!-- ########## START: LEFT PANEL ########## -->
    @include('backend.includes.leftSideNav')
    <!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
    
    <!-- ########## START: HEAD PANEL ########## -->
    @include('backend.includes.headerPanel')
    <!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->
    
    <!-- ########## START: RIGHT PANEL ########## -->
    @include('backend.includes.brRightSideHeader')
    <!-- br-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->
    
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        
        <!-- br-page Title Plus Page Body -->
        
            @yield('allbody')

        <!-- FOOTER -->
        @include('backend.includes.footer')
        
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    
    <!-- Script -->
    @include('backend.includes.Script')
  </body>
</html>
