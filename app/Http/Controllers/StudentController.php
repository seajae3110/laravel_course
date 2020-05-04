<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Carbon\Carbon;
use App\Attendance;
use App\Patients;


class StudentController extends Controller
{
    public function index(Request  $request){
        $clinical_job = 0;

        if($request->clinical_job){
            $clinical_job = $request->clinical_job;
        }

        if($clinical_job){
            $students = Student::where('clinical_job', '=', $clinical_job)->get();
        }
        else{
            $students = Student::all();
        }
    	return view('students.index', compact('students','clinical_job'));
    }

    public function addStudent(){
    	return view('students.add-student');
    }

    public function store(Request $request){
    	$request->validate([
    		'first_name' => 'required',
    		'last_name' => 'required',
            'clinical_job' => 'required',
    	]);

    	$student = new Student;
    	$student->first_name = $request->first_name;
    	$student->middle_name = $request->middle_name ? $request->middle_name : 'N/A';
    	$student->last_name = $request->last_name;
        $student->clinical_job = $request->clinical_job;
    	$student->save();

    	return redirect()->route('students.staffs')->withStatus('Staff Added.');
    }

    public function updateStaff(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'clinical_job' => 'required'
        ]);


        $student = Student::find($request->id);
        if($student){
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->middle_name = $request->middle_name ? $request->middle_name : 'N/A';
            $student->clinical_job = $request->clinical_job;
            $student->save();
        }

        return redirect()->back()->withStatus('Staff Updated!');
        
        }

    public function destroyStaff(Request $request){
        $student = Student::find($request->id);

            if($student){
                $student->delete();
            }

        return redirect()->back()->withStatus('Staff Fired!');
    }


    public function checkAttendance(){
        $students = Student::all();
        $todaysDate = Carbon::today();

        return view('students.check-attendance', compact('students','todaysDate') );
    }

    public function attendancePresent(Request $request){
        $student = Student::find($request->id);
        $attendance = Attendance::where('user_id', $request->id)
                                ->whereDate('attendance_date', Carbon::parse($request->todays_date))
                                ->first();

        if(!$attendance){
            $attendance = new Attendance;
        }

        $attendance->user_id = $request->id;
        $attendance->attendance_date = Carbon::parse($request->todays_date);
        $attendance->is_present = true;
        $attendance->save();

        return redirect()->back()->withStatus($student->full_name.' is present.');
    }   

    public function attendanceAbsent(Request $request){
        $student = Student::find($request->id);
        $attendance = Attendance::where('user_id', $request->id)
                                ->whereDate('attendance_date', Carbon::parse($request->todays_date))
                                ->first();

        if(!$attendance){
            $attendance = new Attendance;
        }

        $attendance->user_id = $request->id;
        $attendance->attendance_date = Carbon::parse($request->todays_date);
        $attendance->is_present = false;
        $attendance->save();

        return redirect()->back()->withStatus($student->full_name.' is absent.');
    }

    public function attendanceReport(){
        $students = Student::all();
        $attendance = Attendance::all();
        $dates = Attendance::groupBy('attendance_date')->pluck('attendance_date');
        return view('students.attendance-report', compact('dates', 'students'));
    }

    public function display(){
        return view('students.display_report');
    }

    public function staff(Request  $request){ 
        $clinical_job = 0;

        if($request->clinical_job){
            $clinical_job = $request->clinical_job;
        }

        if($clinical_job){
            $students = Student::where('clinical_job', '=', $clinical_job)->get();
        }
        else{
            $students = Student::all();
        }
        return view('students.staffs', compact('students','clinical_job'));
    }
                                    /**P A T I E N T S */
    public function storePatient(Request $request){
    	$request->validate([
    		'first_name' => 'required',
    		'last_name' => 'required',
            'reasons' => 'required',
            'senior' => 'required'
    	]);

    	$patient = new Patients;
    	$patient->first_name = $request->first_name;
    	$patient->middle_name = $request->middle_name ? $request->middle_name : 'N/A';
    	$patient->last_name = $request->last_name;
        $patient->reasons = $request->reasons;
        $patient->senior = $request->senior;
    	$patient->save();

    	return redirect()->route('students.patients')->withStatus('Patient Added.');
    }
    
}

