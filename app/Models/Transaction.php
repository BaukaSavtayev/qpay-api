<?php

namespace App\Models;

use App\Enums\Transactions\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function business()
    {
        return $this->hasOne(Business::class, 'id', 'userable_id');
    }
    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'recipient');
    }
}
