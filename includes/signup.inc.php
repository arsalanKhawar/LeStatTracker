<!--This page will add the new user information into the database. It handles the information sent from signup.php-->
<?php
    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptySignupInput($email,$username,$password,$confirmpassword) !== false){ //checks if input fields are empty.
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if(invalidUsername($username) !== false){ //checks for invalid usernames
            header("location: ../signup.php?error=invalidusername");
            exit();
        }
        if(invalidEmail($email) !== false){ //checks for invalid emails
            header("location: ../signup.php?error=invalidemail");
            exit();
        }
        if(passwordMatch($password,$confirmpassword) !== false){ //checks if passwords match
            header("location: ../signup.php?error=passwordsdontmatch");
            exit();
        }
        if(usernameExists($conn,$username,$email)){
            header("location: ../signup.php?error=usernametaken"); //checks if username has been taken
            exit();
        }

        createUser($conn,$email,$username,$password);

    }
    else{
        header("location: ../signup.php");
    }
?>
