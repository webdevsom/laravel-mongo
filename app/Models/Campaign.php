<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $fillable = [
        'name',
        'description',
        'campaign_type',
        'is_duration_continues',
        'start_date',
        'end_date',
        'frequency_type',
        'frequency',
        'budget_type',
        'budget_currency',
        'budget',
    ];
}
