<?php

namespace Klisostom\BackendTest\Interfaces\Repositories;

interface IInvestmentRepository
{
    public function create(array $data): array;
}
