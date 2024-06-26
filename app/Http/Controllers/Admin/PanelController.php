<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Appointment;
use App\Models\Sensor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
    public function delete(Sensor $sensor)
    {
        $sensor->delete();

        return redirect()->back()->with('success', 'You are deleted successfully!');
    }

    public function editCalendarView(Appointment $appointment)
    {
        return view('dashboard.admin.edit-calendar-table', compact('appointment'));
    }

    public function editCalendar(Request $request, Appointment $appointment)
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

        $appointment->update($request->all());

        return redirect()->route('admin.calendar-table')->with('success', 'You have updated successfully');
    }

    public function deleteCalendar(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->back()->with('success', 'You are deleted successfully!');
    }

    public function createMail()
    {
        return view('emails.admin.email');
    }

    // public function confirmAppointment(Request $request)
    // {
    //     $request->validate($request->input());
        
    //     $data = [
    //         $request->fname . ' ' . $request->lname,
    //         $request->phone,
    //         $request->date,
    //         $request->time,
    //         $request->address,
    //         $request->disease,
    //         $request->confirm
    //     ];

    //     $admin = Admin::find(1);

    //     $admin->notify(new ConfirmAppointment($request));

    // }
}
