<?php
    session_start();
    if(isset($_SESSION["userid"])){
        header("Location: index.php");
    }
    include 'connect.php';
?>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

<?php
    if(isset($_POST["username"]) && isset($_POST["pass"])){
        $username = $_POST["username"];
        $password = $_POST["pass"];

        $query = "SELECT id, password FROM users WHERE username = '" . $username . "';";
        $result = $mysqli -> query($query);
        $row = $result -> fetch_array();
        $passhash = $row[1];

        if(password_verify($password, $passhash)){
            $_SESSION["userid"] = $row[0];
        }

        
        header("Location: index.php");
    }else{
?>

    <body>
        <form action="login.php" method="POST">
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" required>
            <br>
            <br>
            <label for="pass">Password: </label>
            <input type="password" id="pass" name="pass" required>
            <br>
            <br>
            <input type="submit" value="Submit"></input>
        </form>
    </body>
</html>

<?php
    }
?>