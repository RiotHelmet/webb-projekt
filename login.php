<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        form {
            color: white;
        }
    </style>
</head>

<body>

    <form action="loginscript.php" method="post">
        Username:<br>
        <input type="text" name="username" required>
        <br>
        Password:<br>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Submit">
    </form>

    <form method="post">
        <input type="submit" name="signupButton" class="button" value="SignUp" />
    </form>
</body>

</html>


<?php

if (array_key_exists('signupButton', $_POST)) {

    header('Location: signup.php');
    exit;
};
