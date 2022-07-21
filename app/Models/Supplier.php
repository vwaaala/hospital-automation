<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Traits\CreatedAndUpdatedBy;

class Supplier extends Model
{
    use HasFactory;
    use CreatedAndUpdatedBy;

    protected $fillable  = ['name', 'email', 'phone','address',
        'company','product','description','status',
        'created_by_id', 'updated_by_id'];


    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }


    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by_id', 'id');
    }

}