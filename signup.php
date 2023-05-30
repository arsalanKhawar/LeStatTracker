<!--This page will create a registration page and form for the user-->
<?php
    include_once 'header.php';
?>
<link rel="stylesheet" href="<?php echo 'styles.css'; ?>">

<!-- Creating Registration form -->
<section class="signup">
    <h2 id="signuplabel">Sign up</h2>
    <div class="signup-form">
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="confirmpassword" placeholder="Confirm Password">
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</section>

<?php
//checks if site was redirected to signup page due to an error
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Make sure you fill out all the fields!</p>";
        }
        if($_GET["error"] == "invalidusername"){
            echo "invalid username";
        }
        if($_GET["error"] == "invalidemail"){
            echo "invalid email";
        }
        if($_GET["error"] == "passwordsdontmatch"){
            echo "Passwords do not match!";
        }
        if($_GET["error"] == "usernametaken"){
            echo "This username is already taken!";
        }
        if($_GET["error"] == "stmtfailed"){
            echo "internal error";
        }
        if($_GET["error"] == "none"){
            echo "User added successfully!";
        }
    }

?>
