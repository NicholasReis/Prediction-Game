<?php
    session_start();
    if(isset($_SESSION["userid"])){
        unset($_SESSION["userid"]);
        echo "You are logged out.";
    }else{
        echo "You were not logged in.";
    }
    
    header("Location: index.php");
?>