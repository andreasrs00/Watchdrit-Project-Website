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

if (isset($_POST['update_password'])) {
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Replace 'your_users_table' with your actual table name
    $sql = "UPDATE customer SET password = '$hashedPassword' WHERE email = '$email'";
    $execQuery = pg_query($connection, $sql);

    if ($execQuery == TRUE) {
        echo "Password updated successfully!";
    } else {
        echo "Failed to update password. Please try again.";
    }
}

// Close the database connection at the end of the script

?>