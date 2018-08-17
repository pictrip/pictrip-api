<?php

namespace App\Controllers\Auth;

use App\Features\Auth\AuthenticationService;
use App\Http\Controllers\Controller;
use App\Requests\Auth\UserLoginRequest;
use App\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function __invoke(UserLoginRequest $request, AuthenticationService $service)
    {
        $token = $service->authenticate($request->email, $request->password);

        if (!$token) {
            $errors = ['message' => trans('auth.failed')];

            return response()->json($errors, 422);
        }

        $user = Auth::user();

        $resource = new UserResource($user);
        $resource->setToken($token);

        return $resource;
    }
}