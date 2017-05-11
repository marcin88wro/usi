<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Doctor;
use App\Patient;
use App\Speciality;
use App\Http\Requests;

class PatientController extends Controller
{
//10    
        public function create_patient(){
        $data = request()->all();
        $patient = new Patient();
        $patient->first_name = array_get($data, "first_name");
        $patient->last_name = array_get($data, "last_name");
        $patient->phone = array_get($data, "phone");
        $patient->gender = array_get($data, "gender");
        $patient->birthday = array_get($data, "birthday");
        $patient->email = array_get($data, "email");
        $patient->save();
        return response()->json(["id"=>$patient->id]);
        }
//11
        public function edit_patient(){         
        $patient_id = request()->route("id");
        $patient = Patient::find($patient_id);
        $data = request()->all();
        $patient->first_name = array_get($data, "first_name", $patient->first_name);
        $patient->last_name = array_get($data, "last_name", $patient->last_name);
        $patient->phone = array_get($data, "phone", $patient->phone);
        $patient->gender = array_get($data, "gender", $patient->gender);
        $patient->birthday = array_get($data, "birthday", $patient->birthday);
        $patient->email = array_get($data, "email", $patient->email);
        $patient->save();
        return response()->json($patient);
        }
//12 ok
        public function patient_delete($patient_id){
        Patient::destroy($patient_id);
        return response()->json(array('id' => $patient_id));
        }
//13 ok        
        public function get_patient(){
        $id = request()->route("id");
        $patient = Doctor::find($id);
        return response()->json($patient);
        }
//14        
    //  public function patientid_appointment($doctor_id){
    //  $appointment = Appointment::where('doctor_id', $doctor_id)->where('id', $appointment_id)->get()->first();
    //  return response()->json($appointment);
    //  }
//15 ok       
        public function patient_appointment($patient_id, $appointment_id){
        $appointment = Appointment::where('patient_id', $patient_id)->where('id', $appointment_id)->get()->first();
        return response()->json($appointment);
        }
//16        
    //  public function patient_appointments_by_date($patient_id){
    //  $data = Request::json()->all();
    //  $appointments = null;
    //  }
//18
        public function show_patient(){
             $patients = "ok";// var_dump($patients);
      //  $patients = Patient::all(); //
     //   echo var_dump($patients);
        echo '<pre>';
print_r($patients);
echo '</pre>';//return Response::json($patients);
          //return Response()->json($patients);
        }
}
