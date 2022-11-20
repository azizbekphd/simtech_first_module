<?php

include("./config.php");

global $db_conn;
$db_conn = mysqli_connect(
    $db_config["hostname"],
    $db_config["username"],
    $db_config["password"],
    $db_config["db_name"],
    $db_config["port"]
);

if (!$db_conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    function sql_query(string $query, int $result_mode = MYSQLI_STORE_RESULT) {
        return mysqli_query($GLOBALS["db_conn"], $query, $result_mode);
    }
}

