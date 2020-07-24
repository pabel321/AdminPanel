<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function passwordChange()
    {
        return view('auth.passwordChange');
    }

    public function updatePassword(Request $request)
    {
        $password=Auth::user()->password;
        $oldpass=$request->oldpass;
        if (Hash::check($oldpass, $password)) {
            $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
        }
        else
        {
            return Redirect()->back();
        }
    }
}
