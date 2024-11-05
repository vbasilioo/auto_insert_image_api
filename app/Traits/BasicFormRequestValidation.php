<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

trait BasicFormRequestValidation
{
    public function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator);
    }
}
