<?php
    session_start();
    if(isset($_SESSION["userid"])){
        header("Location: index.php");
    }
    include 'connect.php';
?>

<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

<?php
    if(isset($_POST["username"]) && isset($_POST["pass"])){
        $username = $_POST["username"];
        $password = password_hash($_POST["pass"], PASSWORD_DEFAULT);
        if($_POST["email"] == ""){
            $email = null;
        }else{
            $email = $_POST["email"];
        }
        $query = "INSERT INTO users VALUES(null, '" . $username . "', '". $password ."', '". $email ."', NOW());";
        $result = mysqli_query($mysqli, $query);
        if(mysqli_affected_rows($mysqli) == 1){
            $query = "SELECT id FROM users WHERE username = '" . $username . "' AND password='" . $password . "';";
            $result = $mysqli -> query($query);
            if($result -> num_rows == 1){
                $row = $result -> fetch_array();
                $_SESSION["userid"] = $row[0];
            }
            echo "Account Created";
        }
        header("Location: index.php")
?>

<?php
    }else{
?>

    <body>
        <form action="signup.php" method="POST">
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" required>
            <br>
            <br>
            <label for="pass">Password: </label>
            <input type="password" id="pass" name="pass" required>
            <br>
            <br>
            <label for="passconfirm">Confirm Password: </label>
            <input type="password" id="passconfirm" name="passconfirm" required>
            <br>
            <br>
            <label for="email">Email: </label>
            <input type="text" id="email" name="email"></input>
            <br>
            (Optional for password recovery)
            <br>
            <br>
            <input type="submit" value="Submit"></input>
        </form>
    </body>
</html>
<?php
}
?>