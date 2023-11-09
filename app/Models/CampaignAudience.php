<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class CampaignAudience extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $fillable = [
        'gender',
        'min_age',
        'max_age',
        'educations',
        'occupations',
        'active_flag',
    ];
}
