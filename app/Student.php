<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Attendance;


class Student extends Model
{
    public function getFullNameAttribute(){
    	return "$this->first_name $this->middle_name $this->last_name";
    }

    public function is_present($date){
    	$attendance = Attendance::whereDate('attendance_date', $date)
    							->where('user_id', $this->id)
    							->first();
    	if($attendance){
    		return $attendance->is_present;
    	}else{
    		return false;
    	}
  	 }

     public function attendances(){
         return $this->hasMany('App\Attendance');
     }

     public function getSalaryAttribute(){
        
        $salary=0;

        if ($this->clinical_job==='Physician/Doctors'){
            $salary=20000;
        }
        else if($this->clinical_job==='Nurse'){
            $salary=13500;
        }
        else if($this->clinical_job==='Techs'){
            $salary=11500;
        }
        else if($this->clinical_job==='Therapist'){
            $salary=10000;
        }
        else if($this->clinical_job==='Medical Assistant'){
            $salary=9000;
        }
        else if($this->clinical_job==='Pharmacist'){
            $salary=10500;
        }
        else if($this->clinical_job==='Medical Tech'){
            $salary=15000;
        }
        else if($this->clinical_job==='Dietitian'){
            $salary=12000;
        }

        return $salary;
    }
}
