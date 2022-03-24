<?php

namespace App\Services;

use Response;

class AppBaseService
{
    protected $errorMessage = 'No query results for model';

    public function sendResponse($result, $message = '', $pagination = null, $options = null)
    {
        return Response::json(self::makeResponse($message, $result, $pagination, $options));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json([
            'success' => false,
            'message' => $error
        ], $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
    }

    public static function makeResponse($message, $data, $pagination = null, $options = null)
    {
        $response = [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];
        return $response;
    }
}
