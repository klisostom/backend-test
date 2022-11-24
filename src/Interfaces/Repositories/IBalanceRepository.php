<?php

namespace Klisostom\BackendTest\Interfaces\Repositories;

interface IBalanceRepository
{
    public function create(float $newBalance, int $investmentId): array;
}
