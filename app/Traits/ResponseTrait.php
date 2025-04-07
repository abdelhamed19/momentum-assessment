<?php
namespace App\Traits;
trait ResponseTrait
{
    /**
     * @param string $message
     * @param int $statusCode
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function success(string $message, int $statusCode = 200, $data): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
    /**
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function error(string $message, int $statusCode = 400): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'message' => $message,
        ], $statusCode);
    }
}
