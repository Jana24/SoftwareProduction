<?php

/*
 *  Created on : 31-Mar-2015, 12:14:00
    Author     : Jana Willmann 14075531
*/
//session_start();

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


$projName  = $_POST['proj_name'];
$description = $_POST['proj_description'];
$status = $_POST['status'];
$start_date = $_POST['startDate'];
$end_date = $_POST['endDate']; 
print_r($_POST);
//$query = "SELECT * FROM projects";

$dateFormated = explode('/', $start_date);
$sdate = $dateFormated[2].'-'.$dateFormated[1].'-'.$dateFormated[0];

$dateFormated = explode('/', $end_date);
$edate = $dateFormated[2].'-'.$dateFormated[1].'-'.$dateFormated[0];


print_r($end_date);
print_r($edate);

$query = "INSERT INTO projects(";
$query .= "name, status, description, managerId, budget, creationDate, startDate, dueDate";
$query .= ") VALUES (";
$query .= " '$projName', 'not started', '$description', 1, 1300.00, CURRENT_TIMESTAMP, '$sdate', '$edate'";
$query .= ")";

$result = mysqli_query($connection, $query);
if($result){
    echo "SUCCESS!";
}
else{
    die("Database query failed. " .mysql_error($connection));

}

?> 
    

