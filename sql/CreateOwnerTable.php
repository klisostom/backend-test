<?php

require_once("./Connection.php");

$sql = "CREATE TABLE owner (
id INT PRIMARY KEY NOT NULL,
name CHAR(250),
email CHAR(50))";

pg_query($conn, $sql);
