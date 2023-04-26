<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Response;

class ApiBadRequestException extends BadRequestException
{
    use ApiResponser;
    public function render(): JsonResponse{
        return $this->errorResponse(
            $this->getMessage(),
            Response::HTTP_NOT_FOUND,

        );
    }
}
