<!--Initialized database connection. Will be referenced on any page that needs to access the database-->
<?php
$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "lestattracker";

$conn = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}