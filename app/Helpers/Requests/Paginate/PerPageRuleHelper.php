<?php

namespace App\Helpers\Requests\Paginate;

class PerPageRuleHelper
{
    public static function rule(): array
    {
        return [
            'per_page' => 'required|integer'
        ];
    }
}
