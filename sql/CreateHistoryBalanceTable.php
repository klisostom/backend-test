<?php

require_once('./Connection.php');

$sql = "CREATE TABLE history_balance (
    id SERIAL PRIMARY KEY,
    balance NUMERIC(8, 2) NOT NULL DEFAULT 0,
    current_balance_id INTEGER NOT NULL,
    FOREIGN KEY (current_balance_id) REFERENCES current_balance(id))";

pg_query($conn, $sql);