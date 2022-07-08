<?php

namespace App\Services;
use DB;
use Log;
use App\Helper\DoctorHelper;
use Illuminate\Support\Facades\App;

class DoctorService
{
    public function getLatest(){
        return App::make(DoctorHelper::class)->getLatest();
    }

    public function store($request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6|max:12',
            'password_confirmation' => 'same:password',
        ]);
        // store record
        try {
            DB::beginTransaction();
            $data['name'] = $request->get('name');
            $data['email'] = $request->get('email');
            $data['password'] = bcrypt($request->password_confirmation);
            $doctor = App::make(DoctorHelper::class)->store($data);
            DB::commit();
            return ['status'=>true, 'message'=>'Created doctor successfully!'];
        }catch (\Exception $e){
            DB::rollback();
            Log::error($e->getMessage());
            return ['status'=>false, 'message'=>'Failed to create new doctor!'];
        }
    }
}