<?php
namespace App\Enums;

enum BrowserEnum: string 
{
    case CHROME = 'Chrome';
    case FIREFOX = 'Firefox';
    case SAFARI = 'Safari';
    case OTHERS = 'Others';
}