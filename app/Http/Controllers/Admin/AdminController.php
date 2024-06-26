<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Appointment;
use App\Models\User;
use App\Notifications\ConfirmAppointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function check(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:1|max:15'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('fail', 'Incorrect credentials');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect()->route('nav.login');
    }

    public function index()
    {
        $users = User::all();

        $appointments = Appointment::all();

        $currentTime = Carbon::now();

        return view('dashboard.admin.home', [
            'users' => $users,
            'appointments' => $appointments,
            'currentTime' => $currentTime
        ]);
    }

    public function appointmentCalendar()
    {
        $appointments = Appointment::all();

        $users = User::all();

        $currentTime = Carbon::now();

        return view('dashboard.admin.calendar-table', compact('appointments', 'users', 'currentTime'));
    }

    public function manageUsers()
    {
        $users = User::all();

        $appointments = Appointment::all();

        $currentTime = Carbon::now();

        return view('dashboard.admin.user-table', [
            'users' => $users,
            'appointments' => $appointments,
            'currentTime' => $currentTime
        ]);
    }

    public function appointmentCheck(Appointment $appointment)
    {
        
        return view('dashboard.admin.check-appointment', compact('appointment'));
    }

    public function appointmentConfirm()
    {
        return view('dashboard.admin.confirm-appointment');
    }

    public function appointmentConfirmHandle(Request $request)
    {
        $data = $request->all();

        $admin = Admin::find(Auth::guard('admin')->user()->id);

        $admin->unreadNotifications()->update(['read_at' => now()]);

        $admin->notify(new ConfirmAppointment($data));

        return redirect()->route('admin.home')->with('success', 'You are confirmed appointment!');
    }

}
