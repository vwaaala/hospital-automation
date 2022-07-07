<?php
namespace App\Helper;
use DB;
use App\Models\Doctor;

class DoctorHelper
{
    public function getLatest(){
        return Doctor::latest()->paginate(10);
    }
}
