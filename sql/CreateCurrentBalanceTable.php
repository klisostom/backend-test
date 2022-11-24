<?php

require_once('./Connection.php');

$sql = "CREATE TABLE current_balance (
    id SERIAL PRIMARY KEY,
    balance NUMERIC(8, 2) NOT NULL DEFAULT 0,
    investment_id INTEGER NOT NULL UNIQUE,
    FOREIGN KEY (investment_id) REFERENCES investment(id))";

pg_query($conn, $sql);
