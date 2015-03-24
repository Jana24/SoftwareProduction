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