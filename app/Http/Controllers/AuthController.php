<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function user_name()
    {
        return 'user_name';
    }
    /**
     * Displays login page
     *
     */
    public function login_page()
    {
      return view('auth.login');
    }

    /**
     * Handles login form
     *
     */
    public function login(Request $request)
    {
      $validated = $request->validate([
          'user_name' => 'required|max:255',
          'password' => 'required|max:255',
      ]);
      if($validated)
      {
        $cred = $request->only('user_name','password');
        if (Auth::attempt($cred))
          return redirect(route('home'));
        else
          return redirect(route('auth.login'));
      }
    }

    /**
     * Displays sign up page
     *
     */
    public function signup_page()
    {
      return view('auth.signup');
    }

    /**
     * Handles sign up form
     *
     */
    public function signup(Request $request)
    {
      $validated = $request->validate([
          'user_name' => 'required|unique:users|max:255',
          'first_name' => 'required|max:255',
          'last_name' => 'required|max:255',
          'password' => 'required|max:255',
          'passConf' => 'required|max:255'
      ]);
      if($validated)
      {
        $user = User::create([
          'user_name' => trim($request->post('user_name')) ,
          'first_name' => trim($request->post('first_name')) ,
          'last_name' => trim($request->post('last_name')) ,
          'password' => Hash::make($request->post('password')) ,
        ]);
        if($user)
          return redirect(route('home'));
        else
          return redirect(route('auth.signup'));
      }
  }

    /**
     * destroy session
     *
     */
    public function logout()
    {
      Session::flush();
      Auth::logout();

      return Redirect(route('home'));
    }
}
