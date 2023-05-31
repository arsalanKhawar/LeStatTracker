<!--this page will send form data to see if it in the users database-->
<?php

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];


    require_once 'functions.inc.php';
    require_once 'dbh.inc.php';

    if(emptyLoginInput($username,$password) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $password);
}
else{
    header("location: ../login.php");
    exit();
}



