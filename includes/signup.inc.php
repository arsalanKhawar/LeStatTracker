<!--This page will add the new user information into the database. It handles the information sent from signup.php-->
<?php
    if(isset($_POST["submit"])){
        $name = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptySignupInput() !== false){ //checks if input fields are empty.
            header("location: ../signup.php?error=emptyinput");
            exit();
        }

    }
    else{
        header("location: ../signup.php");
    }
?>
