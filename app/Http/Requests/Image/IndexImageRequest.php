<?php

namespace App\Http\Requests\Image;

use App\Helpers\Requests\Paginate\PageRuleHelper;
use App\Helpers\Requests\Paginate\PerPageRuleHelper;
use Illuminate\Foundation\Http\FormRequest;

class IndexImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            ...PerPageRuleHelper::rule(),
            ...PageRuleHelper::rule(),
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'per_page' => $this->input('per_page', 10),
            'page' => $this->input('page', 1),
        ]);
    }
}
