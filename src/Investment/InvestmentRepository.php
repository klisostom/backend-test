<?php

namespace Klisostom\BackendTest\Investment;

use Klisostom\BackendTest\Interfaces\Repositories\IInvestmentRepository;

class InvestmentRepository implements IInvestmentRepository
{
    public function create(array $data): array
    {
        try {
            $query = "INSERT INTO investment (amount, owner_id, creation_date)
                VALUES ('$data[ownerId]','$data[ownerId]', '$data[creationDate]')
                RETURNING id, amount, owner_id, creation_date";
            $result = pg_query($GLOBALS['conn'], $query);

            return pg_fetch_all($result);
        } catch (\Throwable $th) {
            print_r(pg_last_error($GLOBALS['conn']));
            error_log($th->getMessage());
            throw $th;
        }
    }
}
