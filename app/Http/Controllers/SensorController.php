<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'temperature_body' => 'required',
    //         'temperature_room' => 'required',
    //         'bpm' => 'required',
    //         'spo2' => 'required',
    //         'humidity' => 'required',
    //         'user_id' => 'required'
    //     ]);

    //     Sensor::create($data);

    //     return response()->json(['message' => 'Data received']);
    // }
}
