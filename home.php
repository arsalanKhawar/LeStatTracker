<!--page user will be directed to when logged in-->
<?php
include_once("header.php");
include_once("includes/functions.inc.php");

if(!isset($_SESSION["username"])){
    header("location: login.php?error=notLoggedIn");
    exit();
}
?>

<a href="addteam.php">Add a Team</a>
