<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $fillable = [
        'name',
        'type',
        'active_flag',
    ];
}
