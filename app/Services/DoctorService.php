<?php
namespace App\Services;
use App\Helper\DoctorHelper;
use Illuminate\Support\Facades\App;

class DoctorService
{
    public function getLatest(){
        return App::make(DoctorHelper::class)->getLatest();
    }
}