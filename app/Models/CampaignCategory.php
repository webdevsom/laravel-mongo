<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignCategory extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $fillable = [
        'name',
        'type',
        'active_flag',
    ];
}
