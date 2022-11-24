<?php

namespace Klisostom\BackendTest\HistoryBalance;

use Klisostom\BackendTest\Interfaces\Repositories\IHistoryBalanceRepository;

class HistoryBalanceRepository implements IHistoryBalanceRepository
{
    public function create(float $newBalance, int $currentBalanceId): array
    {
        try {
            $query = "INSERT INTO history_balance (balance, current_balance_id)
                VALUES ($newBalance, $currentBalanceId)
                RETURNING *";

            return pg_fetch_all(pg_query($GLOBALS['conn'], $query));
        } catch (\Throwable $th) {
            print_r(pg_last_error($GLOBALS['conn']));
            error_log($th->getMessage());
            throw $th;
        }
    }
}
