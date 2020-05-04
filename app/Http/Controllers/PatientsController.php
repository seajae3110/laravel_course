<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;
use Carbon\Carbon;


class PatientsController extends Controller
{
    public function patient(Request  $request){

        $senior = 0;

        if($request->senior){
            $senior = $request->senior;
        }

        if($senior){
            $patients = Patients::where('senior', '=', $senior)->get();
        }
        else{
            $patients = Patients::all();
        }

     return view('students.patients', compact('patients','senior'));
     
    }

    public function addPatient(){
    	return view('students.patient-add');
    }

    public function storePatient(Request $request){
    	$request->validate([
    		'first_name' => 'required',
    		'last_name' => 'required',
            'reasons' => 'required',
            'senior' => 'required'
    	]);

    	$patients = new Patients;
    	$patients->first_name = $request->first_name;
    	$patients->middle_name = $request->middle_name ? $request->middle_name : 'N/A';
    	$patients->last_name = $request->last_name;
        $patients->reasons = $request->reasons;
        $patients->senior = $request->senior;
        $patients->mild = $request->mild;
        $patients->infectious_diseases = $request->infectious_diseases;
        $patients->deficiency_diseases = $request->deficiency_diseases;
        $patients->hereditary_diseases = $request->hereditary_diseases;
    	$patients->save();

    	return redirect()->route('students.patients')->withStatus('Patient Added.');
    }
    public function updatePatient(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'senior' => 'required',
            'reasons' => 'required'
        ]);


        $patient = Patients::find($request->id);
        if($patient){
            $patient->first_name = $request->first_name;
    	    $patient->middle_name = $request->middle_name ? $request->middle_name : 'N/A';
    	    $patient->last_name = $request->last_name;
            $patient->reasons = $request->reasons;
            $patient->senior = $request->senior;
            $patient->mild = $request->mild;
            $patient->infectious_diseases = $request->infectious_diseases;
            $patient->deficiency_diseases = $request->deficiency_diseases;
            $patient->hereditary_diseases = $request->hereditary_diseases;
    	    $patient->save();
        }

        return redirect()->back()->withStatus('Patient Updated!');
        
        }

        public function destroyPatient(Request $request){
            $patient = Patients::find($request->id);

            if($patient){
                $patient->delete();
            }

            return redirect()->back()->withStatus('Patient Discharge.');
        }

        


}
