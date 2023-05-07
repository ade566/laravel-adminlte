<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use InvalidArgumentException;
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

      return redirect(url('users'))->with('success', 'User Admin berhasil ditambahkan!');

    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }

  function delete(Request $req){
    try {
      $item = User::find($req->id);

      if (!$item) {
        throw new InvalidArgumentException('Data tidak ditemukan!', 500);
      }
      
      $item->delete();

      return redirect(url('users'))->with('success', 'User Admin berhasil ditambahkan!');

    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }
}
