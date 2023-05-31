<!--This page will give the user an input form to login to their account-->

<?php
    include_once 'header.php';
?>
<link rel="stylesheet" href="<?php echo 'styles.css' ?>">

<!-- Creating login form -->
<section class="login">
    <h2 id="loginlabel">Login</h2>
    <div class="login-form">
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <?php
//checks if site was redirected to signup page due to an error
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Make sure you fill out all the fields!</p>";
        }
        if($_GET["error"] == "stmtfailed"){
            echo "internal error";
        }
        if($_GET["error"] == "invalidlogin"){
            echo "Invalid Login!";
        }
    }

?>
</section>