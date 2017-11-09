<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Home;
use Illuminate\Support\Facades\Input;
use Redirect;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tampil = DB::table('status')
            ->leftJoin('users', 'status.id_user', '=', 'users.id')
            ->where('status.id_user', '<>', Auth::user()->id)
            ->orderby('status.created_at','desc')
            ->get();
      $tampil2 = DB::table('status')
            ->leftJoin('users', 'status.id_user', '=', 'users.id')
            ->where('status.id_user', Auth::user()->id)
            ->orderby('status.created_at','desc')
            ->skip(0)
            ->take(1)
            ->get();
        return view('home')->with(array('tampil' => $tampil, 'tampil2' => $tampil2));
    }

    public function simpan(){
        $input = Input::only('id_user','status');
        $user = new Home;
        $user->id_user = $input['id_user'];
        $user->isi_status = $input['status'];
        $user->save();

        return Redirect::to('home');
    }
}
