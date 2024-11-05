<?php

namespace App\Exceptions;

use App\Builder\ReturnApi;
use Exception;

class ApiException extends Exception
{

    protected $code = 500;
    protected $message = "Erro inesperado";

    public function render()
    {
        return ReturnApi::error(message:$this->message, status:$this->code);
    }
}
