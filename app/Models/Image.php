<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $hidden = ['imageable_id', 'imageable_type'];
    protected $fillable = [
        'imageable_type',
        'imageable_id',
        'url'
    ];
    public function imageable()
    {
        return $this->morphTo();
    }
}
