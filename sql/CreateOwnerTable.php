<?php

require_once("./connection.php");

$sql = `CREATE TABLE public."owner"
(
    id serial NOT NULL,
    name character varying(250),
    email character varying(50),
    PRIMARY KEY (id)
)`;

$result = pg_query($dbconn, $sql);
var_dump(pg_fetch_all($result));
