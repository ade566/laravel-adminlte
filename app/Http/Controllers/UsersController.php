<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
  function index(Request $req){
    $collection = User::getData();

    return view('users.index', [
      'collection' => $collection
    ]);
  }

  function add(){
    return view('users.add', [
      'title' => 'Tambah User Admin'
    ]);
  }

  function store(Request $req){
    try {
      $post = array_merge($req->only(['name', 'email']), [
        'password' => Hash::make($req->password)
      ]);
      User::create($post);

      return redirect()->back()->with('success', 'User Admin berhasil ditambahkan!');

    } catch (\Throwable $th) {
      return redirect(url('users'))->with('message', $th->getMessage());
    }
  }
}
