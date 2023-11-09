<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class CampaignLocation extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $fillable = [
        'city',
        'state',
        'country',
        'type',
        'active_flag',
    ];
}
