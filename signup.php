<?php
    include 'connect.php';
?>

<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

<?php
    if(isset($_POST["username"])){
        echo "Set";
        if($_POST["email"] == ""){
            $email = "";
        }else{
            $email = $_POST["email"];
        }
        $query = "INSERT INTO users VALUES(null, '" . $_POST['username'] . "', '". $_POST['pass'] ."', '". $email ."', NOW());";
        $result = mysqli_query($mysqli, $query);
        echo "Results in";

    }else{
        echo "Not set";
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