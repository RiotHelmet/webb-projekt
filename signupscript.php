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



$firstName = $_POST["firstname"];
$lastName = $_POST["lastname"];
$uName = $_POST["username"];
$email = $_POST["email"];
$hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$ID = $conn->query("SELECT userID from users ORDER BY userID DESC LIMIT 1")->fetch_assoc();
if($ID->num_rows === 0) {
    $ID = 0;
} else {
    $ID = $ID["userID"] + 1;
}

$sql = "INSERT INTO users (userID, firstname, lastname, email, username, password)
        VALUES ('$ID', '$firstName', '$lastName', '$email', '$uName', '$hash')";
$conn->query($sql);

$conn->close();

header('Location: index.php');
exit;
