<?php

/* 
 *  Created on : 21-Mar-2015, 19:10:59
    Author     : Juan Wang 13008700
 */

// include top header and database connection
include 'topsearch.php';

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