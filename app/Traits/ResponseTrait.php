<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ResponseTrait
{
    protected function createdResponse($data)
    {
        $response = [
        'code' => 201,
        'status' => 'success',
        'data' => $data
        ];
        return response()->json($response, $response['code']);
    }

    protected function showResponse($data)
    {
        $response = [
        'code' => 200,
        'status' => 'success',
        'data' => $data
        ];
        return response()->json($response, $response['code']);
    }

    protected function listResponse($data)
    {
        $response = [
        'code' => 200,
        'status' => 'success',
        'data' => $data
        ];
        return response()->json($response, $response['code']);
    }

    protected function notFoundResponse()
    {
        $response = [
        'code' => 404,
        'status' => 'error',
        'data' => 'Resource not found',
        'message' => 'Not found'
        ];
        return response()->json($response, $response['code']);
    }

    protected function deletedResponse()
    {
        $response = [
        'code' => 204,
        'status' => 'success',
        'data' => [],
        'message' => 'Resource deleted'
        ];
        return response()->json($response, $response['code']);
    }

    protected function clientErrorResponse($data)
    {
        $response = [
        'code' => 422,
        'status' => 'error',
        'data' => $data,
        'message' => 'Unprocessable entity'
        ];
        return response()->json($response, $response['code']);
    }
}