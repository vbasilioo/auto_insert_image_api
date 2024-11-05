<?php

namespace App\Helpers\Requests\Paginate;

class PageRuleHelper {

    public static function rule(): array
    {
        return [
            'page' => 'required|integer'
        ];
    }
}
