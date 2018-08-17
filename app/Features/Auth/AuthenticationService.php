<?php

namespace App\Features\Auth;

use App\Repositories\UserRepository;
use App\Requests\Auth\UserRegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthenticationService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UserRegisterRequest $request
     * @return \App\Models\User
     */
    public function register(UserRegisterRequest $request)
    {
        return $this->userRepository->create(
            $request->name,
            $request->email,
            $request->password
        );
    }

    /**
     * @param string $email
     * @param string $password
     * @return string|false
     */
    public function authenticate(string $email, string $password){

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            $token = $user->createToken('App')->accessToken;

            return $token;
        }

        return false;
    }
}