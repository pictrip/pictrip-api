<?php

namespace App\Controllers\Auth;

use App\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class UserGetController
{
    public function __invoke()
    {
        $user = Auth::user();

        return new UserResource($user);
    }
}