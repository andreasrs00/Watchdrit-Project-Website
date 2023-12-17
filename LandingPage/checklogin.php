<?php
  session_start();
  
$host = "localhost";
$port = "5432";
$dbname = "Watchdrit";
$user = "postgres";
$password = "123";

$connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$connection) {
    echo "Connection Failed" . pg_last_error();
}

  // Check if the user is logged in. You need to replace this with your actual authentication logic.
  $is_logged_in = isset($_SESSION['email']);

  // Set a session variable indicating whether the user is logged in or not.
  $_SESSION['is_logged_in'] = $is_logged_in;
?>
