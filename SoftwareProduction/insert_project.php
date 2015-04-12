<?php

/*
 *  Created on : 31-Mar-2015, 12:14:00
    Author     : Jana Willmann 14075531
*/
//session_start();

// include login information
include('db_connect.php');  
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

//$query = "SELECT * FROM projects";

$dateFormated = explode('/', $start_date);
$sdate = $dateFormated[2].'-'.$dateFormated[1].'-'.$dateFormated[0];

$dateFormated = explode('/', $end_date);
$edate = $dateFormated[2].'-'.$dateFormated[1].'-'.$dateFormated[0];

//check status, so the right one goes into DB:
print_r("Status: " .$status);
if($status == "not_started"){
    print_r("1Status: " .$status);
    $database_status = "not started";
}else if($status == "ungoing"){
    print_r("2Status: " .$status);
    $database_status = "undergoing";
}else if($status == "completed"){
    print_r("3Status: " .$status);
    $database_status = "finished";
}

$query = "INSERT INTO projects(";
$query .= "name, status, description, managerId, budget, creationDate, startDate, dueDate";
$query .= ") VALUES (";
$query .= " '$projName', '$database_status', '$description', 1, 1300.00, CURRENT_TIMESTAMP, '$sdate', '$edate'";
$query .= ")";

$result = mysqli_query($connection, $query);
if($result){
    echo "SUCCESS!";
    header("Location: createProject2.html" ); 
    exit;    
}
else{
    die("Database query failed. " .mysql_error($connection));
    echo "Something went wrong!";
    header("Location: createProject1.html"); 
}

?> 
    

