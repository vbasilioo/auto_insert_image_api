<?php

namespace App\Builder;

use Illuminate\Contracts\Validation\Validator;

class ReturnApi
{

    public static function success($data = null, $message = "")
    {
        return response()->json([
            "error" => false,
            "message" => $message,
            "data" => $data
        ]);
    }

    public static function error($message = "", $data = null, $status = 400)
    {

        return response()->json(
            [
                "error" => true,
                "message" => $message,
                "data" => $data
            ],
            $status
        );
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        return ReturnApi::error($errors->first(), $errors->toArray());
    }
}
