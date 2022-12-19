<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "databas";
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM users";
$result = $conn->query($sql);


$login_success = false;
$full_name = "";


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (
            strtolower($row["username"]) == strtolower($_POST["username"]) &&
            password_verify($_POST["password"], $row["password"])
        ) {
            $login_success = true;
            $currentUser = $row["username"];
        }
    }
} else {
    echo "0 results";
}
if ($login_success) {

    session_start();
    $_SESSION["username"] = $currentUser;

    header('Location: index.php');
    exit;
} else {
    echo "Login Failed";
}

$conn->close();
