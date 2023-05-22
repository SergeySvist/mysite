<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class ApiUnauthorizedException extends UnauthorizedHttpException
{
    use ApiResponser;

    public function __construct()
    {
        parent::__construct("");
    }

    public function render(){
        return $this->errorResponse(
            $this->getMessage(),
            Response::HTTP_UNAUTHORIZED,
        );
    }
}
