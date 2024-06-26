<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Notifications\ConfirmAppointment;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class RegisterAppointmentController extends Controller
{
    public function makeAppointment(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'address' => 'required',
            'disease' => 'required'
        ]);

        Appointment::create([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'user_id' => Auth::user()->id,
            'email' => $request->email,
            'phone'=> $request->phone,
            'date'=> $request->date,
            'time'=> $request->time,
            'address'=> $request->address,
            'disease' => $request->disease
        ]);
       
        $user = User::find(Auth::user()->id);

        $data = [
            'name' => $request->fname . ' ' . $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => $request->date,
            'time' => $request->time,
            'address' => $request->address,
            'disease' => $request->disease
        ];
        
        $user->notify(new ConfirmAppointment($data));

        return redirect()->route('user.home')->with('success', 'You have booked an appointment!');
    }
}

