<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class CampaignWebsite extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'mongodb';

    protected $fillable = [
        'url',
        'type',
        'active_flag',
        'created_at',
        'updated_at',
    ];
}
