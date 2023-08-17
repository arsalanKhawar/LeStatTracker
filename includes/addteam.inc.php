<!--this page will send form data to see if it in the teams database-->
<?php

if(isset($_POST["submit"])){
    $userid = $_POST["userid"];
    $teamname = $_POST["teamname"]; // could make this global

    require_once 'functions.inc.php';
    require_once 'dbh.inc.php';

    //reminder to rename this function so it can be used universally
    if(emptyLoginInput($userid,$teamname) !== false){ 
        header("location: ../addteam.php?error=emptyinput");
        exit();
    }

    createTeam($conn, $userid, $teamname);
}
else{
    header("location: ../addteam.php");
    exit();
}

