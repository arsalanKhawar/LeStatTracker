<!-- reminder to add function that displays team name added successfully -->
<!-- form
    pass userid as vars 
    create function to add team here (make sure to find id) -->

    <!--This page will create a registration page and form for the user-->
    <?php
    include_once 'header.php';
?>
<link rel="stylesheet" href="<?php echo 'styles.css' ?>">
<!-- Creating login form -->
<section class="login">
    <h2 id="loginlabel">Add a team:</h2>
    <div class="login-form">
        <form action="includes/addteam.inc.php" method="post">
            <input type="text" name="userid" placeholder="userid">
            <input type="text" name="teamname" placeholder="teamname">
            <button type="submit" name="submit">Submit</button>
        </form>
    </div> 

<?php
    //checks if site was redirected to add a team page due to an error
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Make sure you fill out all the fields!</p>";
        }
        if($_GET["error"] == "teamtaken"){
            echo "This team name is already taken!";
        }
        if($_GET["error"] == "stmtfailed"){
            echo "internal error";
        }
        // two methods (or extract last element from team list)
        else{
            $team = $_GET["error"];
            echo "$team added successfully!";
        }
    }
?>