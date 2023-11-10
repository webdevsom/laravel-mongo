<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class CampaignAudience extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'mongodb';

    protected $fillable = [
        'gender',
        'min_age',
        'max_age',
        'educations',
        'occupations',
        'active_flag',
        'created_at',
        'updated_at',
    ];
}
