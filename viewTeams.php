<?php
include_once("header.php");
require_once 'includes/dbh.inc.php';


if(!isset($_SESSION["username"])){
    header("location: login.php?error=notLoggedIn");
    exit();
}
?>


<body>
    <?php
    //Gets teams asocciated with current user and displays it.
        $currentuser = $_SESSION["userid"];
        $sql = "SELECT teamname FROM teams WHERE userid=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "error";
                exit();
        }
        mysqli_stmt_bind_param($stmt, "s",$currentuser);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){
             while($row = mysqli_fetch_assoc($result)){
                echo $row["teamname"];
             }
        }
    ?>
</body>
