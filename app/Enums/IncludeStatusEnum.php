<?php
namespace App\Enums;

enum IncludeStatusEnum: string 
{
    case ALL = 'All';
    case INCLUDE = 'Include';
    case EXCLUDE = 'Exclude';
}