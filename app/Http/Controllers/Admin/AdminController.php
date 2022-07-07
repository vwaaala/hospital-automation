<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Admin;

class AdminController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('admin.dashboard');
    }

    public function login(): Factory|View|Application
    {
        return view('admin.login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function check(Request $request): RedirectResponse
    {
        // validate form data
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:6|max:12'
        ], [
            'email.exists' => 'This email is not associated with any admin account'
        ]);
        $credentials = $request->only('email','password');
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->with('fail','Incorrect credentials');
        }
    }
}
