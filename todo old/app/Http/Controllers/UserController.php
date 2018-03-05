<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function show(Request $req)
    {
      $user = User::find($req->id);
      return view('users.show', ['user' => $user]);
    }
}
