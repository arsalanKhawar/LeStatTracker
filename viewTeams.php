<?php
include_once("header.php");
require_once 'includes/dbh.inc.php';

if (!isset($_SESSION["username"])) {
    header("location: login.php?error=notLoggedIn");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Teams</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <div class="teamTable">
        <h1>Your Teams</h1>
        <?php
        // Gets teams associated with the current user and displays it.
        $currentuser = $_SESSION["userid"];
        $sql = "SELECT teamname FROM teams WHERE userid=?;";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Error";
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "s", $currentuser);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $resultCheck = mysqli_num_rows($result);
        
        if ($resultCheck > 0) {
            echo "<table>";
            echo "<tr><th>Team Name</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . htmlspecialchars($row["teamname"]) . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No teams found. Please add a team</p>";
        }
        ?>
    </div>
</body>
</html>
