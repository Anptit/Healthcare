<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = $user->sensors()->paginate(5);

        return view('dashboard.user.home', [
            'user' => $user,
            'sensors' => $data
        ]);
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email|unique:admins,email',
            'password' => 'required|max:15|min:1',
            'confirm_password' => 'required|max:15|min:1|same:password',
            'gender' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
        ]);

        if ($user) {
            return redirect()->route('user.login')->with('success', 'You are created account successfully!');
        }

        return redirect()->back()->with('fail', 'Something went wrong. Try again!');
    }

    public function check(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:1|max:15'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.home');
        }

        return redirect()->back()->with('fail', 'Credentials incorrect!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('nav.login')->withoutCookie('laravel_session');
    }

}
