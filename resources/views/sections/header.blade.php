<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style media="screen">
    .text-primary{
      transition: all 1s ;
    }
    hr {
      background-color: #461A32 ;
    }
    .prof {
      border-radius:35% ;
      object-fit:cover ;
      width: 36px ;
      height: 36px ;
    }
    </style>
  </head>
  <body>
    <header id="header" class="navbar navbar-light sticky-top bg-light">
      <div class="container">
        <div class="d-none d-md-inline">
          <span class="text-light" >XDD</span>
        </div>


        <div class="">
            <h1><a id="headText" href="{{ route('home') }}" style="" class="display-2 text-primary text-decoration-none" > KAT </a></h1>
        </div>

        <div class="">
          @if($user)
            <a class="" href="#" data-toggle="collapse" data-target="#collapsibleNavbar">
              <img class="prof bg-light border border-primary border-4 " src="{{ $user->profile }}" alt="Profile picture" style=";">
            </a>
          @endif
        </div>
      </div>

      @if($user)
      <div class="collapse navbar-collapse " id="collapsibleNavbar">
        <hr/>
        <ul class="container-fluid navbar-nav justify-content-end">
          <li class="nav-item col-sm-6">
            <h4 class="text-primary">Welcome <b>{{ $user->user_name }}</b> </h4>
          </li>
          <div class="" style="width:200px;">
            <hr/>
          </div>
          <li class="nav-item  col-sm-5">
            <a class="nav-link text-primary spinow" href="{{ route('post.create') }}">Add new Post</a>
          </li>
          <li class="nav-item  col-sm-2">
            <a class="nav-link text-primary spinow" href="{{ route('auth.logout') }}">Logout</a>
          </li>
          <li class="nav-item  col-sm-5">
            <a class="nav-link text-primary spinow" href="{{ route('user.dashboard') }}">Account management</a>
          </li>
        </ul>
      </div>
      @endif
    </header>
  </body>
</html>
