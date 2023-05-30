<?php
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

function invalidUsername($username){
    $result = true;
    if(!preg_match("/^[a-z0-9_-]{3,30}$/i", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
