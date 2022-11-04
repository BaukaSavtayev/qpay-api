<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    use HasFactory;
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'userable_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'recipient');
    }

    public function bonuses()
    {
        return $this->hasMany(Bonus::class, 'client_id');
    }
    public function partners()
    {
        return $this->belongsToMany(Business::class, 'partners');
    }

}
