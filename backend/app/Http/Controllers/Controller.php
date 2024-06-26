<?php

namespace App\Http\Controllers;

use App\Constants\ErrorMessages;
use App\Http\Responses\ErrorResponse;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Exception;
use PDOException;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller
{
    /**
     * Handle exceptions and return an appropriate response.
     */
    protected function handleException(Exception $e)
    {
        Log::error($e->getMessage(), [
            'exception' => get_class($e),
            'trace' => $e->getTraceAsString()
        ]);
        if ($e instanceof QueryException) {
            return new ErrorResponse(
                [ErrorMessages::DATABASE_QUERY_ERROR],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        } elseif ($e instanceof PDOException) {
            return new ErrorResponse(
                [ErrorMessages::DATABASE_CONNECTION_ERROR],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        } else {
            return new ErrorResponse(
                [ErrorMessages::INTERNAL_SERVER_ERROR],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
