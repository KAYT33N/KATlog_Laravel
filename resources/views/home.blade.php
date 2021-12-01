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
      img {
        max-width: 100% ;
      }
      .topPart {
        background-color: #461A32 ;
      }
      .postF{
        background-color: hsla(0, 0%, 100%,0.6) ;

      }
    </style>
  </head>

  <body>

    @include('sections.header')
    @include('sections.navbar')

<!--posts -->

    <div class="container">
    @foreach($posts as $post)
          <div class="my-5 postF border-primary " style="border: 3px solid purple;" >

              <div class="d-flex topPart py-2 text-light">
                <div class="col-sm-5 ">
                  <span class="col-sm-5 px-2" >Post author :</span>
                  <a style="" class=" col-sm-2 text-light" href=" {{ route('author',['user'=>$post->user->user_name]) }} " >{{ $post->user->user_name }}</a>
                </div>
                <div class="col-sm-5">
                  <span class="col-sm-5 px-2" >Post title :</span>
                  <b class="">{{ $post->title }}</b>
                </div>
              </div>

              <div class=" container  px-3"  >
                  <article class="my-3">
                    {!! $post->body !!}
                  </article>
                  <div class=" d-flex justify-content-around" >
                    @if($user && $user->user_name == $post->user->user_name)
                        <div>
                          <a class="pr-5" style="color: #461A32 ;" href='{{ route("post.edit",["post"=>$post]) }}'>edit</a>
                          <a class="pr-5" style="color: #461A32 ;" href='{{ route("post.delete",["post"=>$post->id]) }}' >delete</a>
                        </div>
                    @endif
                    <span id="time" style="color: #461A32 ;" class="d-flex" >{{ $post->updated_at }}</span>
                  </div>
              </div>
              @include('sections.comments')
          </div>
    @endforeach
    </div>

    @include('sections.footer')
  </body>
</html>
