<?php

namespace App\Http\Controllers\Api;

use Illuminate\Validation\Validator;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{

    protected function formatValidationErrors(Validator $validator)
    {
        return [
            "ok"        => false,
            "message"   =>  "The given data was invalid",
            "error"     =>  [
                "message"       =>  "The given data was invalid",
                "errors"         =>  $validator->errors(),
                "status_code"   => 422,
            ]
        ];
    }

}
