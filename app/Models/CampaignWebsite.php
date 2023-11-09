<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class CampaignWebsite extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $fillable = [
        'url',
        'type',
        'active_flag',
    ];
}
