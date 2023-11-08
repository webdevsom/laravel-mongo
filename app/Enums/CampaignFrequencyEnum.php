<?php
namespace App\Enums;

enum CampaignFrequencyEnum: string 
{
    case DAILY = 'Daily';
    case WEEKLY = 'Weekly';
    case MONTHLY = 'Monthly';
}