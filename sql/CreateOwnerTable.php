<?php

require_once("./Connection.php");

$sql = "CREATE TABLE owner (
id SERIAL PRIMARY KEY,
name VARCHAR(250),
email VARCHAR(50))";

pg_query($conn, $sql);
