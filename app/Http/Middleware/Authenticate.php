<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if ($request->routeIs('doctor.*')){
                return route('doctor.login');
            }elseif ($request->routeIs('admin.*')){
                return route('admin.login');
            }
            return route('patient.login');
        }
    }
}
