<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  function run(Request $req){
    try {
      $user = User::where('email', $req->email)->first();

      if (!$user) {
        return redirect()->back()->with('message', 'User tidak ditemukan');
      }

      if (!Hash::check($req->password, $user->password)) {
        return redirect()->back()->with('message', 'Password tidak sesuai');
      }

      Auth::guard('web')->login($user, $remember = true);

      return redirect('dashboard');
    } catch (\Throwable $th) {
      return redirect()->back()->with('message', $th->getMessage());
    }
  }

  function logout(Request $request){
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
  } 
}
