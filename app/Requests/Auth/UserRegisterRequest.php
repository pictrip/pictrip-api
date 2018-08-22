<?php

namespace App\Requests\Auth;

use App\Features\Core\CoreRequest;

/**
 * Class UserRegisterRequest.
 * @property mixed name
 * @property mixed email
 * @property mixed password
 */
class UserRegisterRequest extends CoreRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}