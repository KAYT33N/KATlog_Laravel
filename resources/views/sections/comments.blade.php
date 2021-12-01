<div name="comments" style="max-width:100%" class="">

  @if($post->comments)
    @foreach($post->comments as $comment)
      <fieldset  class="border-primary m-2 mt-1 " style="border: 3px solid purple;">
        <legend class="ml-3 py-1 px-3 bg-primary font-size-5px " style="font-size:1rem;width:auto" > <a class="text-light" href="{{ root('author',['user'=>$comment->user->user_name]) }}">{{ $comment->user->user_name }}</a> </legend>
        <div class="py-1 px-2">
          {{ $comment->body }}
        </div>
      </fieldset>
    @endforeach
  @endif
  @if ($user)
    <div name="addCom" class="">
      <fieldset  class="border-primary m-2 mt-1 " style="border: 3px solid purple;">
        <legend class="ml-3 py-1 px-3 bg-primary text-light font-size-5px " style="font-size:1rem;width:auto" > <a class="text-light" href="{{ route('author',['user'=>$user->user_name]) }}">{{ $user->user_name }}</a> </legend>
        <div>
          <form class="" action="include/commentSubmit.php" method="post">
            <input type="hidden" name="postID" value="'.$id.'">
            <textarea name="text" rows="2" class="float-left col-12 col-sm-10" style="background-color: inherit;border: 0px solid white ;" placeholder="Type your comment here :"></textarea>
            <button class="btn btn-primary m-1 float-right spinow" type="submit" name="submit">Submit</button>
          </form>
        </div>
      </fieldset>
    </div>
  @endif
</div>
