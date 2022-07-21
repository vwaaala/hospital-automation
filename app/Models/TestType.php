<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Traits\CreatedAndUpdatedBy;

class TestType extends Model
{
    use HasFactory;
    use CreatedAndUpdatedBy;

    protected $fillable  = ['name', 'price', 'discount',
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