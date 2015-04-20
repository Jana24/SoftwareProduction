
<?php

/*
 *  Created on : 19-April-2015, 17:14:00
    Author     : Jana Willmann 14075531
*/
//session_start();

// include login information
include('db_connect.php');  

$projName  = $_POST['proj_name'];
$description = $_POST['proj_description'];
$status = $_POST['status'];
$start_date = $_POST['startDate'];
$end_date = $_POST['endDate']; 
session_start();
//$query = "SELECT * FROM projects";
$id = $_SESSION['currentProjectID'];


$dateFormated = explode('/', $start_date);
$sdate = $dateFormated[2].'-'.$dateFormated[1].'-'.$dateFormated[0];

$dateFormated = explode('/', $end_date);
$edate = $dateFormated[2].'-'.$dateFormated[1].'-'.$dateFormated[0];

//check status, so the right one goes into DB:
if($status == "not_started"){
    $database_status = "not started";
}else if($status == "undergoing"){
    $database_status = "undergoing";
}else if($status == "completed"){
    $database_status = "completed";
}

$query = "UPDATE projects SET ";
$query .= "name = '$projName', status = '$database_status', ";
$query .= "description = '$description', startDate ='$sdate', dueDate ='$edate' ";
$query .= "where id = $id";

$result = mysqli_query($connection, $query);
if($result){
    echo "SUCCESS!";
    header("Location: update_users_to_project.php" ); 
    exit;    
}
else{
    die("Database query failed. " .mysql_error($connection));
    echo "Something went wrong!";
    header("Location: editProject1.html"); 
}

?> 
    








