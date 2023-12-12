<?php
$host = "localhost";
$port = "5432";
$dbname = "Watchdrit";
$user = "postgres";
$password = "123";

// Menggunakan pg_connect
$connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$connection) {
    echo "Connection Failed" . pg_last_error();
}
?>
