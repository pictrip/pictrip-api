<?php

namespace App\Features\Core;

abstract class DTO
{
    public function __get($name)
    {
        return $this->{'get'.camel_case($name)}();
    }

    public function __set($name, $value)
    {
        return $this->{'set'.camel_case($name)}($value);
    }
}