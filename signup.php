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

    <form action="signupscript.php" method="post">
        First name:<br>
        <input type="text" name="firstname" required>
        <br>
        Last name:<br>
        <input type="text" name="lastname" required>
        <br>
        Email:<br>
        <input type="email" name="email" required>
        <br>
        Username:<br>
        <input type="text" name="username" required>
        <br>
        Password:<br>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Submit">
    </form>

    <form method="post">
        <input type="submit" name="login" class="button" value="Login" />
    </form>
</body>

</html>

<?php

if (array_key_exists('login', $_POST)) {

    header('Location: login.php');
    exit;
};
