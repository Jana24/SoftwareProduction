<?php

/* 
  * Created on : 19-April-2015, 12:14:00
    Author     : Jana Willmann 14075531
    Description:
        - checks if inserted user and password are ok 
        - redirects to the main.php
 */

// include top header and database connection
include 'db_connect.php';


$user = $_POST['usr_name']; 
$password = $_POST['password']; 

print_r($password);
print_r($user);

session_start();

$_SESSION['current_user'] = $user;
print_r($_SESSION['current_user']);

$sql="SELECT * FROM users WHERE name='$user'";
$result=mysqli_query($connection, $sql);
if(mysqli_num_rows($result)!= 0){
    $sql="SELECT * FROM users WHERE name='$user' and password='$password'";
    $result=mysqli_query($connection, $sql);
    if(mysqli_num_rows($result)!= 0){
        header("Location: main.php");
    }
    else{
        //wrong pw
         print("Wrong Username or Password");
        header("Location: titlePage.html");  
      
    }
    
}
else{
 print("Wrong Username or Password"); 
    header("Location: titlePage.html");
     
}

/*
 
 */