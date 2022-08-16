<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact|Page</title>
</head>
<body>
    <h2>THIS IS CONTACT PAGE With CONTROLLER</h2>
    {{Auth::user()->name}}
    <br><br>
    <!-- <a href="{{route('abouttttt.about')}}">About</a> -->
    <a href="{{url('/about')}}">About</a>
                    <li>
                    <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">LOgOUT</a>
                     </form>
                    </li>

</body>
</html>