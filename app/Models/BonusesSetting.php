<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use PhpParser\Node\Expr\Cast\Object_;

class BonusesSetting extends Model
{
    use HasFactory;
    protected $table = 'bonuses_settings';
    protected $fillable = [
        'business_id',
        'standard_bonus_size',
        'activation_start',
        'deactivation_start',
    ];

    protected function activationStart(): Attribute
    {
        return Attribute::make(
            //get: fn ($value) => $this->getTrueFormat($value),
            set: fn ($value) => $this->getCountOfHours($value),
        );
    }
    protected function deactivationStart(): Attribute
    {
        return Attribute::make(
            //get: fn ($value) => $this->getTrueFormat($value),
            set: fn ($value) => $this->getCountOfHours($value),
        );
    }
    public function getCountOfHours($value): int
    {
        return $value * 24;
    }
    public function getTrueFormat($value)
    {
        //$value = substr($value, 0, 2);
        //$value
        //return
    }
    public function business(): Object
    {
        return $this->belongsTo(Business::class);
    }
}
