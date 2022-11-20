<?php

namespace Klisostom\BackendTest\Interfaces\Repositories;

use Klisostom\BackendTest\Owner\Owner;

interface IOwnerRepository
{
    public function create(): Owner;
}
