<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'active_flag',
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'campaign_type' => 'string',
        'is_duration_continues' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
        'frequency_type' => 'string',
        'frequency' => 'string',
        'budget_type' => 'string',
        'budget_currency' => 'string',
        'budget' => 'integer',
        'active_flag' => 'boolean',
    ];

    public function audiences(): HasMany
    {
        return $this->hasMany(CampaignAudience::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(CampaignCategory::class);
    }

    public function devices(): HasMany
    {
        return $this->hasMany(CampaignDevice::class);
    }

    public function locations(): HasMany
    {
        return $this->hasMany(CampaignLocation::class);
    }

    public function media(): HasMany
    {
        return $this->hasMany(CampaignMedia::class);
    }

    public function websites(): HasMany
    {
        return $this->hasMany(CampaignWebsite::class);
    }
}
