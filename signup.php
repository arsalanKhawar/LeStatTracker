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
        <input type="text" name="username" placeholder="use">
        <input type="text" name="password" placeholder="Password">
        <input type="text" name="confirmpassword" placeholder="Confirm Password">
        <button type="submit" name="submit">Submit</button>
    </form>
    </div>
</section>