<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style media="screen">
      li{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <nav id="navbar" class="navbar navbar-light bg-light">
      <div class="container ">
      @if(!$user)
          <form class="col-12 col-sm-8 d-inline form-inline justify-content-around"  action="{{ route('auth.login_handle') }}" name="login" method="post">
              @csrf
              <input  class="col-4 d-inline form-control"  type="text" name="user_name" placeholder="username">
              <input  class="col-4 d-inline form-control "  type="password" name="password" placeholder="password">
              <button class="col-3 d-inline btn btn-secondary spinow" type="submit" name="submit"> Login </button>
          </form>
          <div class="col-12 col-sm-3 d-flex justify-content-center my-2 my-sm-0">
            <a class=" btn btn-primary col-10 col-sm-12 spinow" style="" href="{{ route('auth.signup') }}" target="_parent"> signUp </a>
          </div>
        @endif
      </div>
    </nav>
  </body>
</html>
