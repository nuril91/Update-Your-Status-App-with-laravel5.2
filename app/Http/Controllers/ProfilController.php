<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Profil;
use Redirect;
use DB;
use Auth;
use Session;

class ProfilController extends Controller
{

    public function index(){
      $tampil = DB::table('users')->where('id', Auth::user()->id)->first();
      return view('profil')->with('tampil', $tampil);
    }

    public function upload(Request $request){
      $this->validate($request, [
            'foto' => ['mimes:jpg,jpeg,JPEG,png,gif,bmp', 'max:2024']
      ]);

      $photo = $request->file('foto')->getClientOriginalName();
      $destination = resource_path('assets/images');
      $request->file('foto')->move($destination, $photo);

      DB::table('users')
          ->where('id', Auth::user()->id)
          ->update(['foto' => $photo]);

      return Redirect::to('profil');
    }

    public function simpanbio(Request $request){
      $this->validate($request, [
        'nama' => 'required|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required',
      ]);

      DB::table('users')
          ->where('id', Auth::user()->id)
          ->update([
            'name' => $request['nama'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
          ]);
      Session::flash('status', 'Data Berhasil Diubah');
      return Redirect::to('profil');
    }
}
