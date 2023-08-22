<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use InvalidArgumentException;

class AuthController extends Controller
{
    function login(Request $req){
        try {
            $user = User::where('email', $req->email)->first();

            if (!$user) {
                throw new InvalidArgumentException('Email / Password salah!', 500);
            }

            if (!Hash::check($req->password, $user->password)) {
                throw new InvalidArgumentException('Email / Password salah!', 500);
            }

            Auth::login($user, $remember = true);

            return redirect('dashboard');
        } catch (\Throwable $th) {
            return redirect('/')->with('error', $th->getMessage());
        }
    }
}
