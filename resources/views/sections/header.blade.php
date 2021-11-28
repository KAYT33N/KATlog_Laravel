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
            <h1><a id="headText" href="{{ route('dashboard') }}" style="" class="display-2 text-primary text-decoration-none" > KAT </a></h1>
        </div>

        <div class="">
          <?php
          if(isset($_SESSION['username'])){
            echo '
            <a class="" href="#" data-toggle="collapse" data-target="#collapsibleNavbar">
              <img class="prof bg-light border border-primary border-4 " src="/include/upload/'.$prof.'?nocache='.time().' " alt="Profile picture" style=";">
            </a>
              ';
          }
          ?>
        </div>
      </div>

      <div class="collapse navbar-collapse " id="collapsibleNavbar">
        <hr/>
        <ul class="container-fluid navbar-nav justify-content-end">
          <li class="nav-item col-sm-6">
            <h4 class="text-primary" href="../newPost.php">Welcome <b>{{ $user->first_name }}</b> </h4>
          </li>
          <div class="" style="width:200px;">
            <hr/>
          </div>
          <li class="nav-item  col-sm-5">
            <a class="nav-link text-primary spinow" href="../newPost.php">Add new Post</a>
          </li>
          <li class="nav-item  col-sm-2">
            <a class="nav-link text-primary spinow" href="/include/logout.php">Logout</a>
          </li>
          <li class="nav-item  col-sm-5">
            <a class="nav-link text-primary spinow" href="/accManage.php">Account management</a>
          </li>
        </ul>
      </div>
    </header>
  </body>
</html>
