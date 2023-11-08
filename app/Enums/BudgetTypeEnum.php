<?php
namespace App\Enums;

enum BudgetTypeEnum: string 
{
    case PER_DAY = 'Per Day';
    case IN_TOTAL = 'In Total';
}