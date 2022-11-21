<?php

namespace Klisostom\BackendTest\Owner;

require_once("./connection.php");

use Klisostom\BackendTest\Interfaces\Repositories\IOwnerRepository;

class OwnerRepository implements IOwnerRepository
{
    public function create(array $data)
    {
        try {
            $query = "INSERT INTO owner VALUES ('$data[name]','$data[email]')";
            $result = pg_query($dbconn, $query);
            var_dump(['result', $result]);
            var_dump(['gettype', gettype($result)]);

            return $result;
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            throw $th;
        }
    }
}
