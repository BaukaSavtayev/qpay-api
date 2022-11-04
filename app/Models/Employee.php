<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'position',
        'business_id'
    ];
    public function business(){
        return $this->belongsTo(Business::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'userable_id');
    }
}
