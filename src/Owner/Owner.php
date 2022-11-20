<?php

namespace Klisostom\BackendTest\Owner;

use Klisostom\BackendTest\Interfaces\IOwner;

class Owner implements IOwner
{
    public function __construct(
        private string $name,
        private string $email,
    ) {
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }
}
