<?php

include("../config.php");

global $db_conn;
$db_conn = mysqli_connect(
    $db_config["hostname"],
    $db_config["username"],
    $db_config["password"],
    null,
    $db_config["port"]
);

if (!$db_conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    function sql_query(string $query, int $result_mode = MYSQLI_STORE_RESULT) {
        return mysqli_query($GLOBALS["db_conn"], $query, $result_mode);
    }
}

if (
    sql_query("CREATE DATABASE IF NOT EXISTS " . $db_config["db_name"] . ";") &&
    sql_query("USE " . $db_config["db_name"] . ";") &&
    sql_query("CREATE TABLE IF NOT EXISTS feedbacks(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        prefix VARCHAR(10) NOT NULL,
        email VARCHAR(50) NOT NULL,
        rating TINYINT NOT NULL,
        message VARCHAR(200) DEFAULT '',
        application VARCHAR(50) DEFAULT NULL
    );")
) {
    echo "Database created successfully";
} else {
    echo "Unable to create database";
}
