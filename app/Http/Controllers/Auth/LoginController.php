<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function index(){

        return view('auth.login');
    }
    public function login(Request $request){

        $this->validate($request, [
        
            'email' => 'required|email',
            'password' => 'required',
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
      dd('ok');
    }
}
