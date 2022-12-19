<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>




    <?php
    session_start();
    if (isset($_SESSION["username"]) && !empty($_SESSION["username"])) {
        echo '
    <header>
    <div id="header-userDiv">

    <i class="fa fa-user-circle-o"></i>

    <p> ' .
            $_SESSION["username"]
            . '
    </p>

    <i class="fa fa-angle-down" aria-hidden="true"></i>


    <div id="header-dropdown" class="header-dropdown-content">
        <a href="profile.php?' . $_SESSION["username"] . '">Profile</a>
        <a href="#">Link 2</a>
        <a href="logoutscript.php">Log Out</a>
    </div>
    
    </div>
    </header>
    ';
    } else {
        echo '
    <header>
    
    <form method="post" id="header-loginButton">
        <input type="submit" name="header-loginButton_"  value="Login"  />
    </form>

    </header>
    ';
    };

    if (array_key_exists('header-loginButton_', $_POST)) {

        header('Location: login.php');
        exit;
    };

    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "databas";
    // $conn = new mysqli($servername, $username, $password, $dbname);


    // // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    // $conn->close();

    ?>

    <script src="script.js"></script>
</body>

</html>