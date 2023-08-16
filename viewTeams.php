<?php
include_once("header.php");

if(!isset($_SESSION["username"])){
    header("location: login.php?error=notLoggedIn");
    exit();
}
