<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
  function index(Request $req){
    $collection = User::getData();

    return view('users.index', [
      'collection' => $collection
    ]);
  }
}
