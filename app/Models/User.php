<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'account',
        'userable_id',
        'userable_type',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'userable_id',
        'userable_type',
        'email_verified_at',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function userable()
    {
        return $this->morphTo();
    }

    public function partners()
    {
        return $this->HasMany(Partner::class, 'client_id', 'userable_id')->with('businesses');
    }
    public function clients()
    {
        return $this->HasMany(Partner::class, 'business_id', 'userable_id')->with('clients');
    }
    public function bonuses()
    {
        return $this->HasMany(Partner::class, 'business_id', 'userable_id')->with('clients');
    }
    protected function setPassowrdAttribute ($value)
    {
        return Hash::make($value);
    }
}
