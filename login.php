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
            <input type=text name=username placeholder="Username">
            <input type=password name=password placeholder="Password">
        </form>
    </div>
</section>