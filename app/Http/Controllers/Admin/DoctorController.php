<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Services\DoctorService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Http\RedirectResponse;

class DoctorController extends Controller
{
    public function index(): Factory|View|Application
    {
        $doctors = App::make(DoctorService::class)->getLatest();
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create(){
        return view('admin.doctors.create');
    }

    public function store(Request $request){
        $resp = App::make(DoctorService::class)->store($request);
        if($resp['status']){
            Session::flash('status', $resp['message']);
        }else{
            Session::flash('error', $resp['message']);
        }

        return redirect()->route('admin.doctor.index');
    }

}
