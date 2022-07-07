<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Show the form for creating a check resource.
     *
     * @return Application|Factory|View
     */
    public function login()
    {
        return view('patient.login');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function check(Request $request): RedirectResponse
    {
        // validate form data
        $request->validate([
            'email' => 'required|email|exists:patients,email',
            'password' => 'required|min:6|max:12'
        ], [
            'email.exists' => 'This email is not associated with any Patient account'
        ]);
        $credentials = $request->only('email','password');
        if(Auth::guard('patient')->attempt($credentials)){
            return redirect()->route('patient.profile');
        }else{
            return redirect()->back()->with('fail','Incorrect credentials');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('patient.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // validate form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
            'password_confirmation' => 'same:password',
        ]);
        // store patient
        $patient = new Patient();
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->password = Hash::make($request->password_confirmation);
        $save = $patient->save();
        if ($save) {
            return redirect()->back()->with('success', 'Welcome to Sp Physio point ');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong. Please try again!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Patient $patient
     * @return Application|Factory|View
     */
    public function profile(Patient $patient): View|Factory|Application
    {
        //
        return view('patient.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Patient $patient
     * @return Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Patient $patient
     * @return Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Patient $patient
     * @return Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
    public function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
