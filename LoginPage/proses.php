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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        // Process Login
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Validate user credentials by querying the database
        $query = "SELECT * FROM customer WHERE email = $1";
        $result = pg_query_params($connection, $query, array($email));

        if ($result) {
            $row = pg_fetch_assoc($result);

            // Verify the password using password_verify
            if ($row && password_verify($password, $row['password'])) {
                // Authentication successful
                $_SESSION["email"] = $email;
                header("Location: /Watchdrit-Project-Website/LandingPage/index.php");
                exit();
            } else {
                // Authentication failed
                echo "Invalid email or password.";
            }
        } else {
            // Error executing query
            echo "Error executing query: " . pg_last_error($connection);
        }
    } elseif (isset($_POST["signup"])) {
        // Process Sign Up
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Enkripsi kata sandi menggunakan password_hash()
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Validate and store user data in the database
        $query = "INSERT INTO customer (name, email, password) VALUES ($1, $2, $3)";
        $result = pg_query_params($connection, $query, array($name, $email, $hashed_password));

        if ($result) {
            echo "Signup Successful! You can now login.";
        } else {
            // Error inserting data
            echo "Error inserting data: " . pg_last_error($connection) . " Query: " . $query;
        }
    }
}
?>
