<!doctype html>
<html lang="en">
  <head>

    <!-- // Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--
    // Bootstrap CSS  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{-- <img src="./images/img1.jpeg"> --}}
    <title>Shout Box</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand" href="{{url('/')}}">Shout Box</a>
   
    </nav>
<div class="container main-container">
  <div class="row">


        <div class="card">
            <h2 style="margin-left: 20px"> Admin Login</h2>
            <div class="card-body">

        <form name="loginForm" action="{{ url('/admin') }}" method="POST" novalidate>
            @csrf
            <div class="col-md-12">
                <input type="email" class="input" placeholder="Email" name="email" id="email">
                @if ($errors->has('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
                @endif
            </div>
            <div class="col-md-12">
                <input type="password" class="input" placeholder="Password" name="password" id="password">
                @if ($errors->has('password'))
                <span class="text-danger">{{$errors->first('password')}}</span>
                @endif
            </div >
            <button
            type="submit "
            class="myButton"
            [disabled]="!loginForm.validate"
          >
            Login
          </button>
         </form>
      </div>

</div>

</div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- // Option 2: jQuery, Popper.js, and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


@include("footer")
</body>
</html>