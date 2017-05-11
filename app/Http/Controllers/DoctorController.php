<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Doctor;
use App\Patient;
use App\Speciality;
use App\Http\Requests;

class DoctorController extends Controller
{
//1
        public function create_doctor(){
        $data = request()->all();
        $doctor = new Doctor();
        $doctor->speciality_id = array_get($data, "speciality_id");
        $doctor->first_name = array_get($data, "first_name");
        $doctor->last_name = array_get($data, "phone");
        $doctor->phone = array_get($data, "phone");
        $doctor->gender = array_get($data, "gender");
        $doctor->birthday = array_get($data, "birthday");
        $doctor->email = array_get($data, "email");
        $doctor->room = array_get($data, "room");
        $doctor->save();
        //return response()->json($data);
        return response()->json(["id"=>$doctor->id]);
        }
//2 nie zmienia
        public function edit_doctor(){         
        $doctor_id = request()->route("id");
        $doctor = Doctor::find($doctor_id);
        $data = request()->all();
        $doctor->SPECIALITY_id = array_get($data, "SPECIALITY_id", $doctor->SPECIALITY_id);
        $doctor->first_name = array_get($data, "first_name", $doctor->first_name);
        $doctor->last_name = array_get($data, "last_name", $doctor->last_name);
        $doctor->phone = array_get($data, "phone", $doctor->phone);
        $doctor->gender = array_get($data, "gender", $doctor->gender);
        $doctor->birthday = array_get($data, "birthday", $doctor->birthday);
        $doctor->email = array_get($data, "email", $doctor->email);
        $doctor->room = array_get($data, "room", $doctor->room);
        $doctor->save();
        return response()->json($doctor);
        }
//3 ok
        public function doctor_delete($doctor_id){
        Doctor::destroy($doctor_id);
        return response()->json(array('id' => $doctor_id));
        }
//4 ok
        public function get_doctor(){
        $id = request()->route("id");
        $doctor = Doctor::find($id);
        return response()->json($doctor);
        }
//5        
        public function doctorAppointment(){
        $id = request()->route("id");
        $doctor = Doctor::find($id);
        return response()->json(["id"=>$doctor->appointment]);
        }
//6 ok   
        public function doctor_appointment($doctor_id, $appointment_id){
        $appointment = Appointment::where('doctor_id', $doctor_id)->where('id', $appointment_id)->get()->first();
        return response()->json($appointment);
        }
//8 ok
        public function show_doctor(){
        $doctors = Doctor::all();
        return response()->json($doctors);
        }
}
