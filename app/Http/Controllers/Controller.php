<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $errorMessage = [
        200 => 'OK',
        204 => 'No Content',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        412 => 'Precondition Failed',
        415 => 'Unsupported Media Type',
        422 => 'Unprocessable Entity',
        500 => 'Internal Server Error',
        501 => 'Not Implemented'
    ];

    /**
     * @param $token
     * @return JsonResponse
     */
    protected function respondWithToken($token)
    {
        return $this->sendSuccess([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }

    /**
     * @param $response
     * @return JsonResponse
     */
    protected function sendSuccess($response): JsonResponse
    {
        return response()->json(
            $this->frameResponse('success', 200, 'OK', $this->sendResponse($response)),
            200
        );
    }

    /**
     * @param string $status
     * @param int $statusCode
     * @param string $statusMessage
     * @param array|object $data
     * @return array
     */
    protected function frameResponse(string $status, int $statusCode, string $statusMessage, $data): array
    {
        return [
            'status' => $status,
            'statusCode' => $statusCode,
            'statusMessage' => $statusMessage,
            'data' => $data,
        ];
    }

    /**
     * @param $response
     * @return array|object
     */
    protected function sendResponse($response)
    {
        return (object)$response;
    }

    /**
     * @param $response
     * @param int $status
     * @return JsonResponse
     */
    protected function sendError($response, $status = 500): JsonResponse
    {
        return response()->json(
            $this->frameResponse('error', $status, $this->errorMessage[$status], $this->sendResponse($response)),
            $status
        );
    }

    /**
     * @param $response
     * @return JsonResponse
     */
    protected function validationError($response): JsonResponse
    {

        return response()->json(
            $this->frameResponse('error', 422, 'Unprocessable Entity', $this->sendResponse($response)),
            422
        );
    }
}
