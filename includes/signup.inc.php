<!--This page will add the new user information into the database. It handles the information sent from signup.php-->
<?php
    if(isset($_POST["submit"])){
        $name = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        
        
    }
    else{
        header("location: ../signup.php");
    }
?>
