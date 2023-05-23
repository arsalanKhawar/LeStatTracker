<!--This page will add the new user information into the database. It handles the information sent from signup.php-->
<?php
    if(isset($_POST["submit"])){
        echo "hi";
    }
    else{
        header("location: ../signup.php");
    }
?>
