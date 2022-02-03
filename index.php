<?php
    include 'connect.php'
?>
<html>
    <head>
        <title>Prediction Game</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <script src="./script.js"></script>
    </head>

<?php
    session_start();
    if(isset($_SESSION["userid"])){
?>


<body>
    You are logged in.<br>
    <br>
    <a href="logout.php">Click here to log out</a>
        <div id="prediction-grid">
            <script>//addData()</script>
        </div>
</body>

<?php

    }else{
?>

    <header>
        <nav>
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </nav>
    </header>

</html>

<?php
    }
?>