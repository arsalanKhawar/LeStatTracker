<?php

//checks if input fields are empty
function emptySignupInput($email,$username,$password,$confirmpassword){
    $result = true;
    if(empty($email) || empty($username) || empty($password) || empty($confirmpassword)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

// checks if username is valid
function invalidUsername($username){
    $result = true;
    if(!preg_match("/^[a-z0-9_-]{6,30}$/i", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//checks if user gave a valid email
function invalidEmail($email){
    $result = true;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//checks if password matches
function passwordMatch($password,$confirmpassword){
    $result = true;
    if($password !== $confirmpassword){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function usernameExists($conn,$username,$email){
    $sql = "SELECT * from users where username = ? OR useremail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed"); //checks if sql statement works
            exit();
    }
    mysqli_stmt_bind_param($stmt, "ss",$username,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){ //reutrns data if username or email exists. Otherwise returns false
        return $row;
    }

    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
//adds new user to database
function createUser($conn,$email,$username,$password){
    $sql = "INSERT into users (useremail,username,userpswd) values (?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed"); //checks if sql statement works
            exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $email,$username,$hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php?error=none");
    exit();
}

function emptyLoginInput($username,$password){
    $result = true;
    if(empty($username) || empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//login user to website
function loginUser($conn, $username,$password){
    $usernameExists = usernameExists($conn,$username,$username); //user can use email or username to login
    if($usernameExists === false){
        header("location: ../login.php?error=invalidlogin");
        exit();
    }

    $hashedPassword = $usernameExists["userpswd"];
    $checkpswd = password_verify($password,$hashedPassword);
    if($checkpswd === false){
        header("location: ../login.php?error=invalidlogin");
        exit();
    }

    else if($checkpswd === true){
        session_start();
        $_SESSION["userid"] = $usernameExists["userid"];
        $_SESSION["username"] = $usernameExists["username"];
        header("location: ../home.php");
        exit();
    }

}

//adds new team to database
function createTeam($conn,$userid,$teamname){
    $sql = "INSERT into teams (userid,teamname) values (?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../addteam.php?error=stmtfailed"); //checks if sql statement works
            exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $userid,$teamname);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../addteam.php?error=$teamname");
    exit();
}

function emptyTeamName($teamname){
    $result = true;
    if(empty($teamname)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


// function getUserID($conn,$username){
//     $sql = "SELECT * from users where username = ? OR useremail = ?;";
//     $stmt = mysqli_stmt_init($conn);
//     if(!mysqli_stmt_prepare($stmt,$sql)){
//         header("location: ../signup.php?error=stmtfailed"); //checks if sql statement works
//             exit();
//     }
//     mysqli_stmt_bind_param($stmt, "ss",$username,$username);
//     mysqli_stmt_execute($stmt);

//     $resultData = mysqli_stmt_get_result($stmt);
//     if($row = mysqli_fetch_assoc($resultData)){ //returns data if username or email exists. Otherwise returns false
//         return $row['userid'];
//     }

//     else{
//         $result = false;
//         return array_column($row, 'user_id');
//     }
//     mysqli_stmt_close($stmt);
// }