<?php

/* 
 *  Created on : 21-Mar-2015, 19:10:59
    Author     : Juan Wang 13008700
 */

// include top header and database connection
include 'db_connect.php';
/*
 echo ' <html>'; 
 echo '   <head>'; 
 echo '       <title>Title Page</title>'; 
  echo '      <meta charset="UTF-8">'; 
  echo '      <meta name="viewport" content="width=device-width, initial-scale=1.0">'; 
    
echo '<style type="text/css">'; 
 echo '       @import url("titlePagecss.css");'; 
echo '</style>'; 
echo '</head>'; 
  echo '<body>';  
echo '<div id ="main">'; 
 echo ' <div id="formForm" style="margin-top:20%;">'; 
  echo '  <form method="post" action="main.php" name="formName" id ="myName">'; 
  echo '    Name: <br>'; 
echo '	  <input type="text" id="usr_name" name="usr_name"> <br><br>'; 
echo '	  Password: <br>'; 
 echo '     <input type="password" name="password"> <br><br>'; 
echo '	  <input type = "submit" value="Login">'; 
echo '    </form>'; 
echo '  </div>'; 
echo '</div>'; 
echo '</body>'; 
echo '</html>';*/

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