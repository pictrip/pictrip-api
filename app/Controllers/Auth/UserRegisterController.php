<?php

namespace App\Controllers\Auth;

use App\Features\Auth\AuthenticationService;
use App\Http\Controllers\Controller;
use App\Requests\Auth\UserRegisterRequest;
use App\Resources\UserResource;

class UserRegisterController extends Controller
{
    public function __invoke(
        UserRegisterRequest $request,
        AuthenticationService $service
    )
    {
        $user = $service->register($request);
        $token = $service->authenticate($request->email, $request->password);

        $resource = new UserResource($user);
        $resource->setToken($token);

        return $resource;
    }
}