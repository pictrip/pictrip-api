<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function create(string $name, string $email, string $password)
    {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);

        $user->save();

        return $user;
    }
}