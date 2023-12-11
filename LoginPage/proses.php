<?php
session_start();

$host = "localhost";
$port = "5432";
$dbname = "Watchdrit";
$user = "postgres";
$password = "123";

$connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$connection) {
    echo "Connection Failed" . pg_last_error($connection);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        // Process Login
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Validate user credentials by querying the database
        $query = "SELECT * FROM customer WHERE email = $1 AND password = $2";
        $result = pg_query_params($connection, $query, array($email, $password));

        if ($result && pg_num_rows($result) > 0) {
            // Authentication successful
            $_SESSION["email"] = $email;
            header("Location: /Watchdrit-Project-Website/LandingPage/index.html");
            exit();
        } else {
            // Authentication failed
            echo "Invalid email or password.";
        }
    } elseif (isset($_POST["signup"])) {
        // Process Sign Up
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Validate and store user data in the database
        $query = "INSERT INTO customer (name, email, password) VALUES ($1, $2, $3)";
        $result = pg_query_params($connection, $query, array($name, $email, $password));

        if ($result) {
            echo "Signup Successful! You can now login.";
        } else {
            echo "Error inserting data: " . pg_last_error($connection) . " Query: " . $query;
        }
    }
}
?>
