<?php

namespace Klisostom\BackendTest\HistoryBalance;

use Klisostom\BackendTest\Interfaces\IHistoryBalance;

class HistoryBalance implements IHistoryBalance
{
    public function create(array $data): array
    {
        return (new HistoryBalanceRepository())->create($data[0]['balance'], $data[0]['id']);
    }
}
