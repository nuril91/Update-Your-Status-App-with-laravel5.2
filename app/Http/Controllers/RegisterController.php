<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use Redirect;
use DB;
use Session;

class RegisterController extends Controller
{

  public function reg(Request $request){
    $input = Input::only('name2','email2','password2');

    $users = DB::table('users')->where('email', '=', $input['email2'])->get();
    if(count($users)){
      Session::flash('status', 'Email sudah ada');
      return view('auth.login');
    }else{
      $user = new Register;
      $user->name = $input['name2'];
      $user->email = $input['email2'];
      $user->password = bcrypt($input['password2']);
      $user->save();

      $credentials = array(
        'email' => Input::get('email2'),
        'password' => Input::get('password2')
      );

      if (Auth::attempt($credentials)) {
        return Redirect::to('home');
      }
    }
  }
}
