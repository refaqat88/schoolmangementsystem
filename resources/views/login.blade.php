<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Scims-Log-in</title>

    <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>

    <link rel="stylesheet" href="{{asset('css/loginstyle.css')}}" media="screen" type="text/css" />
    <style>
        .error{
            color:red;
        }
    </style>
</head>

<body style="background-image: url('{{asset('adminassets/img/bg/fabio-mangione.jpg')}}');" >

<div class="login-card">
    <h1>Login</h1><br>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="error alert alert-danger alert-block">
            {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <form class="form" method="POST" action="{{ url('login') }}">
        @csrf
        <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
{{--        <input id="username" type="text"--}}
{{--               class="form-control @error('username') is-invalid @enderror" name="username"--}}
{{--               value="{{ old('username') }}" placeholder="username"  autocomplete="username" autofocus>--}}
        @error('username')
        <span class="error invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" name="password">
 
        @error('password')
 


        <span class="error invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror


        Select Language
        <input class="form-check-input" type="radio" value="en" name="language" id="language" checked>


      <label class="form-check-label" for="language">
        English
      </label>
     
      <input class="form-check-input" type="radio" value="ur" name="language" id="language" >
      <label class="form-check-label" for="language">
        Urdu
      </label>
     
        <input type="submit" style="margin-top:10px" name="login" class="login login-submit" value="login">
    </form>

    <div class="login-help">
{{--        <a href="#">Register</a> • <a href="#">Forgot Password</a>--}}
    </div>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

<script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>

</body>

</html>