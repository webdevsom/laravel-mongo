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

class CampaignService
{
    public function create(array $request = []): array
    {
        $data = collect($request);
        $campaignData = $data->only([
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
        ])->toArray();

        $campaign = Campaign::create($campaignData);

        $audienceData = $data->only(['gender', 'min_age', 'max_age', 'educations', 'occupations',])->toArray();
        $categoryData = $data->only(['name', 'type',])->toArray();
        $deviceData = $data->only(['name', 'type',])->toArray();
        $locationData = $data->only(['city', 'state', 'country', 'type',])->toArray();
        $mediaData = $data->only(['name', 'url', 'destination_url', 'script', 'size',])->toArray();
        $websiteData = $data->only(['url', 'type',])->toArray();

        return [];
    }

    public function validation(): array
    {
        return [
            'name' => ['required', 'string', 'max:254',],
            'description' => ['required', 'string'],
            'campaign_type' => ['required', new Enum(CampaignTypeEnum::class)],
            'is_duration_continues' => ['required', 'boolean'],
            'start_date' => ['required', 'date'],
            'end_date' => ['accepted_if:is_duration_continues,false', 'date'],
            'frequency_type' => ['required', new Enum(CampaignFrequencyEnum::class)],
            'frequency' => ['required', 'string', 'max:254',],
            'budget_type' => ['required', new Enum(BudgetTypeEnum::class)],
            'budget' => ['required', 'integer'],
            // audiences
            'audiences' => ['required', 'array'],
            'audiences.*.gender' => ['required', new Enum(GenderEnum::class)],
            'audiences.*.min_age' => ['required', 'numeric', 'min:18',],
            'audiences.*.max_age' => ['required', 'numeric', 'min:50',],
            'audiences.*.educations' => ['nullable', 'array'],
            'audiences.*.educations.*' => ['string'],
            'audiences.*.occupations' => ['nullable', 'array'],
            'audiences.*.occupations.*' => ['string'],
            // categories
            'categories' => ['required', 'array'],
            'categories.*.name' => ['required', 'array'],
            'categories.*.type' => ['required', 'array'],
            // devices
            'devices' => ['required', 'array'],
            'devices.*.name' => ['required', new Enum(DeviceEnum::class)],
            'devices.*.type' => ['required', 'in:Device'],
            // browsers
            'browsers' => ['required', 'array'],
            'browsers.*.name' => ['required', new Enum(BrowserEnum::class)],
            'browsers.*.type' => ['required', 'in:Browser'],
            // locations
            'locations' => ['required', 'array'],
            'locations.*.city' => ['nullable', 'string'],
            'locations.*.state' => ['nullable', 'string'],
            'locations.*.country' => ['required', 'string'],
            'locations.*.type' => ['required', new Enum(IncludeStatusEnum::class)],
            // websites
            'websites' => ['required', 'array'],
            'websites.*.url' => ['required', 'string',],
            'websites.*.type' => ['required', new Enum(IncludeStatusEnum::class)],
        ];
    }
}
