<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    
    public function getTotalReasonAttribute(){
        $bill=0;
        $total_reasons=0;

        if ($this->reasons==='Mild'){
            $total_reasons=5000;
        }
        else if($this->reasons==='Infectious diseases'){
            $total_reasons=10000;
        }
        else if($this->reasons==='Deficiency diseases'){
            $total_reasons=15000;
        }
        else if($this->reasons==='Hereditary diseases'){
            $total_reasons=20000;
        }
        if($this->senior==='Senior(22% Off)'){
            $bill=$total_reasons-($total_reasons*.22);
            return $bill;
        }else{
            return $total_reasons;
        }
        return $total_reasons;
    }
}
