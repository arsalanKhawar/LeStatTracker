<!--this page will send form data to see if it in the teams database-->
<?php
session_start();
$userid = $_SESSION["userid"];

if(isset($_POST["submit"])){
    $teamname = $_POST["teamname"]; // could make this global

    require_once 'functions.inc.php';
    require_once 'dbh.inc.php';

    //reminder to rename this function so it can be used universally
    if(emptyTeamName($teamname) !== false){ 
        header("location: ../addteam.php?error=emptyinput");
        exit();
    }
    if(teamExists($conn,$teamname,$userid) !== false){ 
        header("location: ../addteam.php?error=teamtaken");
        exit();
    }
    
    createTeam($conn, $userid, $teamname);
}
else{
    header("location: ../addteam.php");
    exit();
}

