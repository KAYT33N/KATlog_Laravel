<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="theme-color" media="(prefers-color-scheme:light)" content="#461A32">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my-colors.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/katapp.js') }}"></script>

    <title>Accound management</title>
    <style media="screen">
      body {
        background: url('{{ asset("bg.png") }}') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
      hr {
        margin-top: 0px ;
        background-color: #461A32 ;
      }
      .nav-link {
        color: black;
      }
      .nav-link:hover {
        color: hsl(327, 46%, 35%) ;
      }
      .nav-pills > li > a.active {
          background-color: #461A32 !important;
      }
      .p0{
        padding: 0px !important;
      }
      img {
        border-radius:35%;
        object-fit:cover;
      }
    </style>
    <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('.prev')
              .attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
        }

      }
      $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
    </script>
  </head>

  <body>

        @include('sections.header')
        @include('sections.navbar')

    <div class="container ">
      <div class="mx-auto mt-4 d-flex">
        <div class="p0 col-12 d-md-flex border border-5 border-primary" style="background-color: hsla(0, 0%, 100%,0.6) ; padding=20px ;" >

<!-- buttons -->
          <div class="col-12 col-md-4 border border-5 border-primary p-2">
            <ul class="nav flex-column nav-pills">
              <li class="nav-item">
                <a data-toggle="pill" class="nav-link active" href="#a">Change profile picture</a>
              </li>
              <li class="nav-item">
                <a data-toggle="pill" class="nav-link " href="#b">Change name</a>
              </li>
              <!--
              <li class="nav-item">
                <a data-toggle="pill" class="nav-link" href="#c">Change password</a>
              </li>
              -->
              <li class="nav-item">
                <a data-toggle="pill" class="nav-link" href="#d">Delete account</a>
              </li>
            </ul>
          </div>

          <div class="col-12 col-md-8 border border-5 border-primary">
            <div class="tab-content">
<!-- First page : profile picture -->
              <div class="p-2 tab-pane container active" id="a">
                <form class="" action="{{ route('user.profile') }}" method="post" enctype="multipart/form-data" style="text-align:center" >
                  @csrf
                  <div class="custom-file">
                    <input class="custom-file-input" type="file" onchange="readURL(this);" name="avatar" id="avatar" style="width:100%;">
                    <label class="custom-file-label" for="fileToUpload">Choose file</label>
                  </div>
                  <div class="col-12 p-2">
                    <img class="prev bg-light border border-primary border-4 "  src="{{ $user->profile }}" alt="sm preveiw" style="width:36px; height: 36px;" />
                    <img class="prev bg-light border border-primary border-4 "  src="{{ $user->profile }}" alt="md preveiw" style="width:100px; height: 100px; " />
                    <img class="d-none d-sm-inline prev bg-light border border-primary border-4 "  src="{{ $user->profile }}" alt="xl preveiw" style="width:200px;height: 200px; " />
                  </div>
                  <div class="col-12 ">
                    <input class="btn btn-primary " type="submit" value="Upload Image" name="submit">
                  </div>
                </form>
              </div>
<!-- Second page : name -->
              <div class="p-2 tab-pane container fade" id="b">
                  <form class="mt-1 mt-sm-3 d-block " action="{{ route('user.name') }}" method="post">
                    @csrf
                    <input type="hidden" name="Ol_fName" value="{{ $user->first_name }}">
                    <input type="hidden" name="Ol_lName" value="{{ $user->last_name }}">
                      <div class="d-md-flex">
                        <div class="col-12 col-md-6">
                          <label class="text-dark" for="fName"> <b>First name :</b> </label>
                          <input class="ml-2 ml-md-5 col-11 col-md-10 form-control" type="text" name="first_name" placeholder="{{ $user->first_name }}">
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="text-dark" for="lName"> <b>Last name :</b> </label>
                          <input class="ml-2 ml-md-5 col-11 col-md-10 form-control" type="text" name="last_name" placeholder="{{ $user->last_name }}">
                        </div>
                      </div>
                      <div class="m-3 p-3 col-12 d-flex justify-content-center">
                        <input class="btn btn-primary " type="submit" value="Sumbit changes" name="submit">
                      </div>
                  </form>
              </div>
<!-- Third page : pass
              <div class="p-2 tab-pane container fade" id="c">
                <div class="p-2 tab-pane container active" id="b">
                    <form class="mt-1 mt-sm-3 d-block " action="include/accManage/nameChange.php" method="post">
                        <input type="hidden" name="Ol_lName" value="<?php //echo $Ol_pass ?>">
                        <div class="col-12">
                          <label class="text-dark" for="fName"> <b>Previous pass :</b> </label>
                          <input class="ml-2 ml-md-5 col-11 col-md-8 form-control" type="password" name="oPass" placeholder="">
                        </div>
                        <div class="col-12">
                          <label class="text-dark" for="fName"> <b>New password :</b> </label>
                          <input class="ml-2 ml-md-5 col-11 col-md-8 form-control" type="password" name="nPass" placeholder="">
                        </div>
                        <div class="col-12">
                          <label class="text-dark" for="fName"> <b>Re enter new password :</b> </label>
                          <input class="ml-2 ml-md-5 col-11 col-md-8 form-control" type="password" name="cPass" placeholder="">
                        </div>
                        <div class="col-12 m-3 p-3  d-flex justify-content-center">
                          <input class="btn btn-primary " type="submit" value="Sumbit changes" name="submit">
                        </div>
                    </form>
                </div>
              </div>
Fourth page : delete account -->
              <div class="p-2 tab-pane container fade" id="d">

                <form class="col-12" action="{{ route('user.delete') }}" method="post">
                  @csrf
                  <div class="">
                    <label class="text-dark" for="password"> <b>enter your password</b> </label>
                    <input class="form-control" type="password" name="password" placeholder="********">
                  </div>
                  <div class="my-2">
                    <label class="text-dark" for="confirm"> <b>type CONFIRM if you are sure</b> </label>
                    <input class="form-control" type="text" name="confirm" placeholder="CONFIRM">
                  </div>
                  <input class="btn btn-danger " type="submit"  name="submit" value="Delete my account">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
