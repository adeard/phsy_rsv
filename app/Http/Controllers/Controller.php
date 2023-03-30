<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function format($status, $data, $ErrorMessage){
        $arr['status']    = !empty($status) ? $status : '';
        $arr['data']      = !empty($data) ? $data : '';
        $arr['error_msg'] = !empty($ErrorMessage) ? $ErrorMessage : '';
        return $arr;
    }

    protected function generateResponse($result, $statusCode = Response::HTTP_OK)
    {
        return response($result, $statusCode)->header('Content-Type', 'application/json');
    }

    protected function generateErrorResponse(\Throwable $exception, $userMessage = false, $inputNamespace = false, $request = null)
    {
        $response = [
            'status' => 'error',
            'message' => $userMessage ? $userMessage : $exception->getMessage()
        ];
        $statusCode = ($exception->getCode())? $exception->getCode() :  400;

        $response = [
            'status' => 'error',
            'error_msg' => $exception->getMessage(),
            'data' => $exception->getFile().". Line : ".$exception->getLine()
        ];

        return response()->json($response, $statusCode);
    }
}
