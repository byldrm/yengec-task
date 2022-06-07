<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;


class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($result, $message, $code = 200)
    {
        if (isset($result['pagination'])) {
            $response = [
                'success' => true,
                'data' => $result['data'],
                'pagination' => $result['pagination'],
                'message' => $message,
            ];
        } else {
            $response = [
                'success' => true,
                'data' => $result,
                'message' => $message,
            ];
        }


        return response()->json($response, $code);
    }


    public function addPagination($data, $collection): array
    {
        $response = array(
            'data' => $collection,
            'pagination' => array(
                'total' => $data->total(),
                'next' => $data->nextPageUrl(),
                'previous' => $data->previousPageUrl(),
                'count' => $data->count(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage()
            )
        );
        return $response;
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
}
