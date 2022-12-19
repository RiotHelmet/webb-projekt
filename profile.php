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
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "databas";
    $conn = new mysqli($servername, $username, $password, $dbname);


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

    $results = $conn->query("SELECT * FROM `users` WHERE `username` = '$url_path'");


    if($results->num_rows < 1) {
        echo "This page doesnt exist";
    } else {
        $result = $results->fetch_assoc();
        $ID = $result["userID"];
        $posts = $conn->query("SELECT * from `postedcontent` where `authorID` = '$ID'");



        echo '<div id="main-content-div">
        
        <div>

        <img src="pic_trulli.jpg">
        
        <p>' . $result["username"] . '</p>
        </div>

        <div id="profile-posts-container">';
        
        if($posts->num_rows < 1) {
            echo "This user doesnt have any posts";
        } else {
            $posts = $posts->fetch_assoc();
            foreach($posts as $post) {
                echo '
                
                <div>

                </div>
                
                ';
            }
        }
        echo '</div>

        </div>';


    }
    



    $conn->close();

    ?>

    <script src="script.js" ></script>

</body>
</html>

<?php

