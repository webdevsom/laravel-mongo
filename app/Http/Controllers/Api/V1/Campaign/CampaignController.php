<?php

namespace App\Http\Controllers\Api\V1\Campaign;

use App\Http\Controllers\Controller;
use App\Services\CampaignService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request, CampaignService $campaignService): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), $campaignService->validation());

            if ($validator->fails()) {
                return $this->validationError($validator->errors());
            }

            $campaignService = $campaignService->create($request->all());

            return $this->sendSuccess($request->all());
        } catch (Throwable $th) {
            return $this->sendError([]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
