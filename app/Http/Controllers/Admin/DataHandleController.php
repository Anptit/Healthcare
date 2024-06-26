<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataHandleController extends Controller
{
    public function userFilter(Request $request) 
    {
        $name = $request->query('name');
        $start_date = $request->query('start_date');
        $end_date = $request->query('end_date');

        $users = User::where('name', 'LIKE', '%' . $name .'%')
                    ->whereBetween('created_at', [$start_date, $end_date])
                    ->get();
        
        return view('dashboard.admin.user-table', compact('users'));
    }

    public function appointmentFilter(Request $request)
    {
        $name = $request->query('name');
        $start_date = $request->query('start_date');
        $end_date = $request->query('end_date');

        $appointments = Appointment::where('name', 'LIKE', '%' . $name .'%')
                    ->whereBetween('created_at', [$start_date, $end_date])
                    ->get();
        
        return view('dashboard.admin.user-table', compact('appointments'));
    }
}
