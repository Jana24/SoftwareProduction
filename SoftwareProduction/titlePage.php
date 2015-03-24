<?php

/* 
 *  Created on : 21-Mar-2015, 19:10:59
    Author     : Juan Wang 13008700
 */

// include login information
  include('private/db_login.php');
  // echo "host is $db_host  user is $db_username  password is  selected  database is $db_name";
  // connect to database
  $connection = mysqli_connect($db_host, $db_username, $db_password, $db_name);
  //echo $connection;
  if (!$connection){
    die ("Could not connect to database: <br />". mysql_error());
  }
  
  // select the database
  $db_select=  mysqli_select_db($connection, $db_name);
  
  //echo " db selected".$db_select;
  
  if (!$db_select){
    die ("could not select the database: <br />". mysql_error());
  }
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
  echo '  <form name="formName" id ="myName">'; 
  echo '    Name: <br>'; 
echo '	  <input type="text" name="name"> <br><br>'; 
echo '	  Password: <br>'; 
 echo '     <input type="text" name="password"> <br><br>'; 
echo '	  <input type = "button" value="Login">'; 
echo '    </form>'; 
echo '  </div>'; 
echo '</div>'; 
echo '</body>'; 
         echo '</html>';