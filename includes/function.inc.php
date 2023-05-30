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
    if(!preg_match("/^[a-z0-9A-Z]{6,30}$/i", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

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
