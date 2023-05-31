<!--this page will send form data to see if it in the users database-->
<?php

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
}

require_once 'includes/functions.inc.php';
require_once 'includes/dbh.inc.php';

if(emptyLoginInput($username,$password) !== false){
    header("locations: ../login.php?error=emptyinput");
    exit();
}