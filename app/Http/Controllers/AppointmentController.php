<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Doctor;
use App\Patient;
use App\Speciality;
use App\Http\Requests;

class AppointmentController extends Controller
{
//19      
        public function create_appointment(){
        $data = request()->all();
        $appointment = new Appointment();
        $appointment->doctor_id = array_get($data, "doctor_id", $appointment->doctor_id);
        $appointment->patient_id = array_get($data, "patient_id", $appointment->patient_id);
        $appointment->date = array_get($data, "date", $appointment->date);
        $appointment->duration = array_get($data, "duration", $appointment->duration);
        $appointment->save();
        return response()->json(["id"=>$appointment->id]);
        }
//20 
        public function appointment_edit($appointment_id){
        $appointment = Appointment::find($appointment_id);
        $data = Request::json()->all();
        
        if (array_key_exists("date", $data)) {
            $appointment->date = $data("date");
        }
        if (array_key_exists("duration", $data)) {
            $appointment->duration = $data("duration");
        }
        if (array_key_exists("patient_id", $data)) {
            $appointment->patient_id = $data("patient_id");
        }
        if (array_key_exists("doctor_id", $data)) {
            $appointment->doctor_id = $data("doctor_id");
        }

        $appointment->save();
        return response()->json($appointment);
        
        }
//21 ok
        public function appointment_delete($appointment_id){
        Appointment::destroy($appointment_id);
        return response()->json(array('id' => $appointment_id));
        }
//22 ok
        public function get_appointment(){
        $id = request()->route("id");
        $appointment = Appointment::find($id);
        return response()->json($appointment);
        }
//23
        public function show_appointment(){
        $appointment = \App\Appointment::all();
        return response()->json($appointment);
        }
}
