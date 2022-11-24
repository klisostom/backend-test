<?php

namespace Klisostom\BackendTest\Balance;

use Klisostom\BackendTest\HistoryBalance\HistoryBalance;
use Klisostom\BackendTest\Interfaces\Repositories\IBalanceRepository;

class BalanceRepository implements IBalanceRepository
{
    public function create(float $newBalance, int $investmentId): array
    {
        try {
            $query = "INSERT INTO current_balance (balance, investment_id)
                VALUES ($newBalance, $investmentId)
                ON CONFLICT ON CONSTRAINT current_balance_investment_id_key
                DO UPDATE SET balance=$newBalance
                RETURNING *";
            $result = pg_fetch_all(pg_query($GLOBALS['conn'], $query));

            (new HistoryBalance())->create($result);

            return ($result);
        } catch (\Throwable $th) {
            print_r(pg_last_error($GLOBALS['conn']));
            error_log($th->getMessage());
            throw $th;
        }
    }
}
