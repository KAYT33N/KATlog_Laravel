<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sign up mafakaaa</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my-colors.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/katapp.js') }}"></script>
    <style media="screen">

    body {
      background: url("{{ asset('bg.png') }}") no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
    * {
      text-align: center;
    }
    </style>
  </head>
  <body class="" >
    <br><br>
    <div class="container ">
      <div class="mx-auto col-10 col-md-8 col-lg-7 col-xl-6">
        <div style="background-color: hsla(0, 0%, 100%,0.6) ;" >
          <div style="background-color: #461A32" class="py-3">
            <h3 id="head" class="text-light">sign up form</h3>
          </div>
          <div  class="mx-1 my-2">
            <p id="error-msg" class="m-2"></p>
            <form class="form-inline" onsubmit="return validateForm()" action="{{ route('auth.signup_handle') }}" method="post">
                @csrf

                <label class="col-12 col-sm-6" for="user_name"> <b>Enter your username</b> </label>
                <input class="col-9 col-sm-5 form-control mb-2 mb-sm-1 mx-auto" type="text" name="user_name" >

                <label class="col-12 col-sm-6" for="first_name"> <b>First name :</b> </label>
                <input class="col-9 col-sm-5 form-control mb-2 mb-sm-1 mx-auto" type="text" name="first_name" >

                <label class="col-12 col-sm-6" for="last_name"> <b>Last name :</b> </label>
                <input class="col-9 col-sm-5 form-control mb-2 mb-sm-1 mx-auto" type="text" name="last_name" >

                <label class="col-12 col-sm-6" for="password"> <b>Enter password :</b> </label>
                <input class="col-9 col-sm-5 form-control mb-2 mb-sm-1 mx-auto" type="password" name="password" >

                <label class="col-12 col-sm-6" for="passConf"> <b>Confirm password :</b> </label>
                <input class="col-9 col-sm-5 form-control mb-2 mb-sm-1 mx-auto" type="password" name="passConf" >
                <button style="width:195px" class="mt-3 mx-auto btn btn-secondary" id="submit" type="submit" name="submit"> <b>submit</b> </button>
            </form>
          </div>

          <div class="py-4">
            <form class="" action="{{ route('home') }}" method="get">
              <button style="width:195px" class=" btn btn-secondary spinow" type="submit"> <b>Back to blog</b> </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
