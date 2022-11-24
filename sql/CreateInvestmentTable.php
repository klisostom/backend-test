<?php

require_once('./Connection.php');

$sql = "CREATE TABLE investment (
    id SERIAL PRIMARY KEY,
    amount NUMERIC(8, 2) NOT NULL DEFAULT 0,
    owner_id INTEGER NOT NULL,
    creation_date DATE NOT NULL DEFAULT CURRENT_DATE,
    FOREIGN KEY (owner_id) REFERENCES owner(id))";

pg_query($conn, $sql);
