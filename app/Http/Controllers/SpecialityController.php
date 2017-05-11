<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Doctor;
use App\Patient;
use App\Speciality;
use App\Http\Requests;

class SpecialityController extends Controller
{
//24
        public function edit_speciality(){         
        $speciality_id = request()->route("id");
        $speciality = Speciality::find($speciality_id);
        $data = request()->all();
        $speciality->name = array_get($data, "name", $speciality->name);
        $speciality->price_per_appointment = array_get($data, "price_per_appointment", $speciality->price_per_appointment);
        $speciality->session()->save();
        return response()->json($speciality);
        }
//25 ok
        public function get_speciality(){
        $id = request()->route("id");
        $speciality = Speciality::find($id);
        return response()->json($speciality);
        }
//26
        public function show_speciality(){
        $speciality = Speciality::all();
        return response()->json($speciality);
        }
}
