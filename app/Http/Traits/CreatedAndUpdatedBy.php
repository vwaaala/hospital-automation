<?php

namespace App\Http\Traits;

trait CreatedAndUpdatedBy{
    //  this trait will insert the user id who is logged in and
    // assigning a new data inside the database


    public static function boot()
    {
        // if user is logged in
        if (auth()->check()) {

            // Creating Function
            static::creating(function($model){
                $model->created_by_id = auth()->user()->id;
            });

            // Updating Function
            static::updating(function($model){
                $model->updated_by_id = auth()->user()->id;
            });
        }
    }

}