<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $fillable= [
        'business_id',
        'client_id'
    ];

    public function businesses()
    {
        return $this->hasMany(Business::class, 'id', 'business_id');
    }
    public function clients()
    {
        return $this->hasMany(Client::class, 'id', 'client_id');
    }


}
