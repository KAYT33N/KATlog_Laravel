<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  public function dashboard()
  {
    $posts = Post::latest()->get();
    return view('dashboard')->with([
      'posts' => $posts,
      'user'=> auth()->user()
    ]);
  }

  public function name(Request $request)
  {
    $user = auth()->user() ;
    if(!trim($request->post('first_name'))=='')
      $user->first_name = $request->post('first_name');
    if(!trim($request->post('last_name'))=='')
      $user->last_name = $request->post('last_name');
    $user->save();
    return redirect(route('user.dashboard'));
  }

  public function profile(Request $request)
  {
    $fileToUpload = $request->file('avatar');
    //make name
    $name = time().'.'.$fileToUpload->getClientOriginalExtension();
    //upload & return path
    $path = Storage::disk('avatars')->put(
        '',$fileToUpload
    );

    if($path){
      $user = auth()->user();
      $user->profile = '/uploads/profile/'.$path ;
      $user->save();
    }
    return redirect(route('user.dashboard'));
  }

  public function delete(Request $request)
  {
    $user = User::find(auth()->user()->id);
    if(Hash::check($request->post('password'), $user->password))
    {
      foreach ($user->posts as $post) {
        $post->user_id = 1 ;
        $post->save() ;
      }
      Session::flush();
      Auth::logout();
      $user->delete() ;
      return redirect(route('home'));
    }
    return redirect(route('user.dashboard'));
  }
}
