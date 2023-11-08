<?php
namespace App\Services;

use App\Enums\BrowserEnum;
use App\Enums\BudgetTypeEnum;
use App\Enums\CampaignFrequencyEnum;
use App\Enums\CampaignTypeEnum;
use App\Enums\DeviceEnum;
use App\Enums\GenderEnum;
use App\Enums\IncludeStatusEnum;
use App\Models\Campaign;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rules\Enum;

class PreCampaignService
{
    public function getFormData(): array
    {
        $campaign = [
            'campaign_types' => array_column(CampaignTypeEnum::cases(), 'value'),
            'frequency_types' => array_column(CampaignFrequencyEnum::cases(), 'value'),
            'budget_types' => array_column(BudgetTypeEnum::cases(), 'value'),
            'audiences'=>[
                'gender' => array_column(GenderEnum::cases(), 'value'),
            ],
            'devices.*.name' => array_column(DeviceEnum::cases(), 'value'),
            'browsers.*.name' => array_column(BrowserEnum::cases(), 'value'),
            'locations.*.type' => array_column(IncludeStatusEnum::cases(), 'value'),
            'websites.*.type' => array_column(IncludeStatusEnum::cases(), 'value'),
        ];

        return $campaign;
    }
}
