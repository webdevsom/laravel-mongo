<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class MediaSize extends Model
{
    use HasFactory;
    
    protected $connection = 'mongodb';

    protected $fillable = [
        'name',
        'size',
        'media_type',
        'active_flag',
    ];
}
