<?php

namespace App\Http\Controllers\Api\V1\Campaign;

use App\Http\Controllers\Controller;
use App\Services\PreCampaignService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class PreCampaignController extends Controller
{
    /**
     * Display a object of the resource.
     */
    public function getFormData(PreCampaignService $preCampaignService)
    {
        $campaignService = $preCampaignService->getFormData();
        return $this->sendSuccess($campaignService);        
    }
}
