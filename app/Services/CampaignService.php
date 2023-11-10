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
use App\Models\Masters\CampaignType;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
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
        
        collect($data['audiences'] ?? [])->each(function($item) use ($campaign) {
            $campaign->audiences()->create($item);
        });
        collect($data['categories'] ?? [])->each(function($item) use ($campaign) {
            $campaign->categories()->create($item);
        });
        collect($data['devices'] ?? [])->each(function($item) use ($campaign) {
            $campaign->devices()->create($item);
        });
        collect($data['browsers'] ?? [])->each(function($item) use ($campaign) {
            $campaign->browsers()->create($item);
        });
        collect($data['locations'] ?? [])->each(function($item) use ($campaign) {
            $campaign->locations()->create($item);
        });
        collect($data['websites'] ?? [])->each(function($item) use ($campaign) {
            $campaign->websites()->create($item);
        });
        collect($data['media'] ?? [])->each(function($item) use ($campaign) {
            $campaign->media()->create($item);
        });
        
        return ['message' => _('Campaign created.')];
    }

    public function validation(): array
    {
        return [
            'name' => ['required', 'string', 'max:254',],
            'description' => ['required', 'string'],
            'campaign_type' => ['required', Rule::exists('campaign_types', 'name')],
            'is_duration_continues' => ['required', 'boolean'],
            'start_date' => ['required', 'date'],
            'end_date' => ['accepted_if:is_duration_continues,false', 'date'],
            'frequency_type' => ['required', Rule::exists('frequencies', 'name')],
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
            'categories.*.name' => ['required', Rule::exists('categories', 'name')],
            'categories.*.type' => ['required', new Enum(IncludeStatusEnum::class)],
            // devices
            'devices' => ['required', 'array'],
            'devices.*.name' => ['required', Rule::exists('devices', 'name')],
            'devices.*.type' => ['required', 'in:Device'],
            // browsers
            'browsers' => ['required', 'array'],
            'browsers.*.name' => ['required', Rule::exists('devices', 'name')],
            'browsers.*.type' => ['required', 'in:Browser'],
            // locations
            'locations' => ['required', 'array'],
            'locations.*.city' => ['nullable', 'string'],
            'locations.*.state' => ['nullable', 'string'],
            'locations.*.country' => ['required', 'string'],
            'locations.*.type' => ['required', new Enum(IncludeStatusEnum::class)],
            // websites
            'websites' => ['required', 'array'],
            'websites.*.url' => ['required', 'url',],
            'websites.*.type' => ['required', new Enum(IncludeStatusEnum::class)],
        ];
    }
}
