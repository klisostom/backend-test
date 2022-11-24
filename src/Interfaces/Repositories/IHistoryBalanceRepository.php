<?php

namespace Klisostom\BackendTest\Interfaces\Repositories;

interface IHistoryBalanceRepository
{
    public function create(float $newBalance, int $currentBalanceId): array;
}
