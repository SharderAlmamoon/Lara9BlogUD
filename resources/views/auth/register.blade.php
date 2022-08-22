
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Adimn | Register </title>

    <!-- vendor css -->
    <link href=" {{ asset('backend/lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href=" {{ asset('backend/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href=" {{ asset('backend/css/bracket.css')}}">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> bracket <span class="tx-info">plus</span> <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-40">The Admin Template For Perfectionist</div>


         <!-- Validation Errors -->
         <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf
            <!-- Name -->
            <div class="form-group">
            <input id="name" name="name" value="{{ old('name')}}" type="text" class="form-control" placeholder="Enter your FullName" required autofocus>
            </div><!-- form-group -->

            <!-- UserName -->
            <div class="form-group">
            <input id="username" type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="Enter your UserName" required autofocus>
            </div><!-- form-group -->
    
            <!-- Email Address -->
            <div class="form-group">
            <input id="email" type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter your Email" required>
            </div><!-- form-group -->

             <!-- Password -->
            <div class="form-group">
            <input id="password" type="password" name="password" class="form-control" placeholder="Enter your Password"  required autocomplete="new-password">
            </div><!-- form-group -->

             <!-- Confirm Password -->
            <div class="form-group">
            <input id="password_confirmation" type="password" name="password_confirmation" value="{{old('password')}}" class="form-control" placeholder="Enter your Confirm Password"  required>
            </div><!-- form-group -->

            <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
            <button type="submit" class="btn btn-info btn-block">Sign Up</button>

            <div class="mg-t-40 tx-center"> yet a member? <a href="{{route('login')}}" class="tx-info">Sign in</a></div> 
         </form>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script href=" {{ asset('backend/lib/jquery/jquery.min.js')}}"></script>
    <script href=" {{ asset('backend/lib/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <script href=" {{ asset('backend/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script href=" {{ asset('backend/lib/select2/js/select2.min.js')}}"></script>
    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      });
    </script>

  </body>
</html>
