<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Business extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'account',
        'business_owner_name',
        'description',
        'standard_bonus_size',
    ];
    protected $hidden = [
        'user',
        'account',
        'city_id',
        'created_at',
        'updated_at',
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function bonuses_setting()
    {
        return $this->hasOne(BonusSettings::class);
    }
    public function schedule()
    {
        return $this->hasOne(Schedule::class);
    }


    public function contacts()
    {
        return $this->hasOne(Contact::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'partners')->with('bonuses');
    }
    public function employees()
    {
        return $this->hasMany(Employee::class)->with('user');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function bonuses()
    {
        return $this->hasMany(Bonus::class);
    }
}
