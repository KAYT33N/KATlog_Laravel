<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my-colors.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/katapp.js') }}"></script>
    <title>blog</title>
    <style media="screen">
    body {
      background: url("{{ asset('bg.png') }}") no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
      button {
        color: BLACK ;
      }
      .text-primary{
        transition: all 1s ;
      }
      img {
        max-width: 100% ;
      }
      .author_pic {
        width:100%;
        object-fit:cover;
        transition: all 0.5s ;
      }
      .topPart {
        background-color: #461A32 ;
      }
      .postF{
        background-color: hsla(0, 0%, 100%,0.6) ;

      }
    </style>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#prof').click(function() {
          if ( $(this).css("height") == '200px' ) {
            $(this).css("height", "350px");
          }else {
            $(this).css("height", "200px");
          }
      });
    });
    </script>
  </head>
  <body>
    @include('sections.header')
    @include('sections.navbar')

    <div class="d-block d-md-flex container justify-content-between ">

      <div class="col-12 col-md-5 my-5 ">
          <div class="card postF border border-primary">
            <div class="card-header bg-primary text-light">
              <b> User's profile </b>
            </div>
            <div class="author_pic" >
              <img class="bg-light author_pic" style="height: 200px;" src="{{ $author->profile }}" id="prof" alt="authors profile picture" />
            </div>
            <div class="card-body">
              <h6>User name : <b>{{ $author->user_name }}</b> </h6>
              <h6>name : <b>{{ $author->first_name . ' ' . $author->last_name }}</b> </h6>
            </div>
          </div>
      </div>

      <div class="col-12 col-md-7">
          @foreach($author->posts as $post)
            <div class="my-5 postF border-primary " style="border: 3px solid purple;" >

              <div class="d-flex topPart py-2 text-light">
                <div class="">
                  <span class="col-sm-5 px-2" >Post title :</span>
                  <b class="">{{ $post->title }}</b>
                </div>
              </div>

              <div class=" container  px-3"  >
                  <article class="my-3">
                    {!! $post->body !!}
                  </article>
                  <div class=" d-flex justify-content-around" >
                    @if($user && $user->id == $author->id)
                        <div>
                          <a class="pr-5" style="color: #461A32 ;" href='{{ route("post.edit",["post"=>$post]) }}'>edit</a>
                          <a class="pr-5" style="color: #461A32 ;" href='{{ route("post.delete",["post"=>$post->id]) }}' >delete</a>
                        </div>
                    @endif
                    <span id="time" style="color: #461A32 ;" class="d-flex" >{{ $post->created_at }}</span>
                  </div>
              </div>
              @include('sections.comments')
          </div>
        @endforeach
      </div>

    </div>


    @include('sections.footer')
  </body>
</html>
