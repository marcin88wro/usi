<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

//1
        Route::post('doctor/create', array('as' => 'doctor.create', 'uses' => 'DoctorController@create_doctor'));

//2
        Route::post('doctor/{id?}/edit', array('as' => 'doctor.edit', 'uses' => 'DoctorController@edit_doctor'));

//3 ok
        Route::delete('doctor/{id?}/delete', array('as' => 'doctor.delete', 'uses' => 'DoctorController@doctor_delete'));

//4 ok
        Route::get('doctor/{id?}', array('as' => 'doctor.get', 'uses' => 'DoctorController@get_doctor'));

//5
        Route::get('doctor/{id?}/appointment', array('as' => 'doctor_appointment.get', 'uses' => 'DoctorController@doctorAppointment'));        
        
//6 ok
        Route::get('doctor/{doctor_id?}/appointment/{appointment_id?}', array('as' => 'doctor_appointment', 'uses' => 'DoctorController@doctor_appointment'));        

//7
        //Route::get('doctor', array('as' => 'read_doctors', 'uses' => 'DoctorController@xxx'));
        
//8 ok
        Route::get('doctor', array('as' => 'read_doctors', 'uses' => 'DoctorController@show_doctor'));

//9     
      //Route::get('doctor', array('as' => 'read_doctors', 'uses' => 'DoctorController@xxx'));
        
//10                                                                  
        Route::post('patient/create', array('as' => 'patient.create', 'uses' => 'PatientController@create_patient'));

//11
        Route::post('patient/{id?}/edit', array('as' => 'patient.edit', 'uses' => 'PatientController@edit_patient'));

//12 ok
        Route::delete('patient/{id?}/delete', array('as' => 'patient.delete', 'uses' => 'PatientController@patient_delete'));

//13 ok
        Route::get('patient/{id?}', array('as' => 'patient.get', 'uses' => 'PatientController@get_patient'));

//14
        Route::get('patient/{patient_id?}/appointment}', array('as' => 'doctor_appointment', 'uses' => 'PatientController@patientid_appointment'));        
        
//15 ok
        Route::get('patient/{patient_id?}/appointment/{appointment_id?}', array('as' => 'patient_appointment', 'uses' => 'PatientController@patient_appointment'));        
        
//16
        Route::post('patient/{id?}/appointment', array('as' => 'patient_appointments_by_date.post', 'uses' => 'PatientController@patient_appointments_by_date'));        
       
//17        
        
//18
        Route::get('patient', array('as' => 'read_patients', 'uses' => 'PatientController@show_patient'));

//19
        Route::post('appointment/create', array('as' => 'appointment.create', 'uses' => 'AppointmentController@create_appointment'));

//20
        Route::post('appointment/{id?}/edit', array('as' => 'appointment.edit', 'uses' => 'AppointmentController@appointment_edit'));

//21 ok
        Route::delete('appointment/{id?}/delete', array('as' => 'appointment.delete', 'uses' => 'AppointmentController@appointment_delete'));

//22 ok
        Route::get('appointment/{id?}', array('as' => 'appointment.get', 'uses' => 'AppointmentController@get_appointment'));

//23
        Route::get('appointment', array('as' => 'read_appointment', 'uses' => 'AppointmentController@show_appointment'));        
        
//24
        Route::post('speciality/{id?}/edit', array('as' => 'speciality.edit', 'uses' => 'SpecialityController@edit_speciality'));

//25 ok
        Route::get('speciality/{id?}', array('as' => 'speciality.get', 'uses' => 'SpecialityController@get_speciality'));

//26
        Route::get('speciality', array('as' => 'show_speciality', 'uses' => 'SpecialityController@show_speciality'));