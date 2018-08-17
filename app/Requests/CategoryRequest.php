<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed name
 * @property mixed limit
 */
class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => '',
            'limit' => 'numeric|min:0|max:50'
        ];
    }
}
