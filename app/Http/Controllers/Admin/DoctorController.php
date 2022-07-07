<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DoctorService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;

class DoctorController extends Controller
{
    public function index(): Factory|View|Application
    {
        $doctors = App::make(DoctorService::class)->getLatest();
        return view('admin.doctors.index', compact('doctors'));
    }


}
