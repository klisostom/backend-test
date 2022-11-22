<?php

namespace Klisostom\BackendTest\Owner;

require_once  "./Connection.php";

use Klisostom\BackendTest\Interfaces\Repositories\IOwnerRepository;

class OwnerRepository implements IOwnerRepository
{
    public function create(array $data)
    {
        try {
            $query = "INSERT INTO owner (name, email)
                VALUES ('$data[name]','$data[email]')
                RETURNING id, name, email";
            $result = pg_query($GLOBALS['conn'], $query);

            return pg_fetch_all($result);
        } catch (\Throwable $th) {
            print_r(pg_last_error($GLOBALS['conn']));
            error_log($th->getMessage());
            throw $th;
        }
    }
}
