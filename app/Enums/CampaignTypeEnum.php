<?php
namespace App\Enums;

enum CampaignTypeEnum: string 
{
    case CPM = 'CPM';
    case CPC = 'CPC';
    case CPA = 'CPA';
}