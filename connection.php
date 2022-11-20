<?php

use Exception;

try {
    $host = "192.168.0.106";
    $port = "5433";
    $dbname = "postgres";
    $user = "postgres";
    $password = "postgres";
    $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
    $dbconn = pg_connect($connection_string);
} catch (Exception $e) {
    throw new Exception($e->getMessage());
}
