<?php

namespace Klisostom\BackendTest\Interfaces\Repositories;

interface IOwnerRepository
{
    public function create(array $data): array;
}
