<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class CampaignDevice extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'mongodb';

    protected $fillable = [
        'name',
        'type',
        'active_flag',
        'created_at',
        'updated_at',
    ];
}
