<?php

namespace App\Requests\Auth;

use App\Features\Core\CoreRequest;

/**
 * @property mixed email
 * @property mixed password
 */
class UserLoginRequest extends CoreRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
    public function authorize()
    {
        return true;
    }
}