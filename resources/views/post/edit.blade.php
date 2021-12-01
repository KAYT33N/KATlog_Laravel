<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>newPost page</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my-colors.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/katapp.js') }}"></script>
    <script type="text/javascript">
      function back() {
        window.location.replace("/") ;
      }
    </script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <style media="screen">
    body {
      background: url("{{ asset('bg.png') }}") no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="my-3 container">
          <form class="" style="" action="{{ route('post.update',['post'=>$post->id]) }}" method="post">
            @csrf
            <div class="d-md-flex justify-content-around">
              <button style="display:inline" class="col-md-3 btn btn-danger spinow" type="button" name="button" onclick="back()"> Back to blog </button>
              <div class="py-1 col-md-6 bg-light" style="border-radius:5px;">
                <label class="col-4 d-inline" for="title"> title : </label>
                <input class="col-8 d-inline form-control" style="min-width:150px;" type="text" name="title" value="{{$post->title}}" >
              </div>
              <button class="py-1 col-md-2 btn btn-primary spinow" type="submit" name="submit" >Update post</button>
            </div>
            <br><br>
            <div style="border: 2px solid #461A32 ;" class="">
              <textarea class=" " name="body" rows="8" id="body">{!! $post->body !!}</textarea>
            </div>
          </form>
        </div>
        <script>
          CKEDITOR.replace("body");
        </script>
  </body>
</html>
