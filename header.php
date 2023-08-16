<!--This page is for the navigation bar on top of every page in the website-->
<?php
    include_once 'header.php';
    session_start();
?>
<link rel="stylesheet" href="<?php echo 'styles.css'; ?>">

<nav>
    <ul>
        <?php
            if(isset($_SESSION["username"])){
                echo "<li><a href =  'home.php' >Home</a></li>";
                echo "<li><a href =  'logout.php' >Logout</a></li>";
            }
            else{
                echo "<li><a href =  'login.php' >Login</a></li>";
                echo "<li><a href =  'signup.php' >Signup</a></li>";
            }
        ?>

    </ul>
</nav>