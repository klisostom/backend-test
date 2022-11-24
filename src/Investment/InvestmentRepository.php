<?php

namespace Klisostom\BackendTest\Investment;

use Klisostom\BackendTest\Interfaces\Repositories\IInvestmentRepository;

class InvestmentRepository implements IInvestmentRepository
{
    public function create(array $data): array
    {
        try {
            $query = "INSERT INTO investment (amount, owner_id, creation_date)
                VALUES ('$data[amount]','$data[ownerId]', '$data[creationDate]')
                RETURNING id, amount, owner_id, creation_date";
            $result = pg_query($GLOBALS['conn'], $query);

            return pg_fetch_all($result);
        } catch (\Throwable $th) {
            print_r(pg_last_error($GLOBALS['conn']));
            error_log($th->getMessage());
            throw $th;
        }
    }

    public function investmentByOwner(int $ownerId)
    {
        try {
            $queryInvestment = "SELECT * FROM investment WHERE owner_id={$ownerId}";
            return pg_fetch_all(pg_query($GLOBALS['conn'], $queryInvestment));
        } catch (\Throwable $th) {
            print_r(pg_last_error($GLOBALS['conn']));
            error_log($th->getMessage());
        }
    }
}
