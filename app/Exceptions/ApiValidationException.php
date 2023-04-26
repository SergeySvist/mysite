<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ApiValidationException extends ValidationException
{
    use ApiResponser;

    public function render(): JsonResponse{
        return $this->errorResponse(
            $this->getMessage(),
            $this->status,
            $this->validator->errors()->getMessages(),
        );
    }
}
