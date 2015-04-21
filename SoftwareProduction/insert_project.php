<?php

/*
 *  Created on : 31-Mar-2015, 12:14:00
    Author     : Jana Willmann 14075531
 *  Description: 
        - This inserts the data from the text fields into the database 
        - if it is a success it will lead to insert_users_to_project.php
 * 
*/
//session_start();

// include login information
include('db_connect.php');  

//get fields value
$projName  = $_POST['proj_name'];
$description = $_POST['proj_description'];
$status = $_POST['status'];
$start_date = $_POST['startDate'];
$end_date = $_POST['endDate']; 

//format the date data
$dateFormated = explode('/', $start_date);
$sdate = $dateFormated[2].'-'.$dateFormated[1].'-'.$dateFormated[0];

$dateFormated = explode('/', $end_date);
$edate = $dateFormated[2].'-'.$dateFormated[1].'-'.$dateFormated[0];

//check status, so the right one goes into DB:
if($status == "not_started"){
    print_r("1Status: " .$status);
    $database_status = "not started";
}else if($status == "undergoing"){
    print_r("2Status: " .$status);
    $database_status = "undergoing";
}else if($status == "completed"){
    print_r("3Status: " .$status);
    $database_status = "completed";
}

//insert into db
$query = "INSERT INTO projects(";
$query .= "name, status, description, managerId, budget, creationDate, startDate, dueDate";
$query .= ") VALUES (";
$query .= " '$projName', '$database_status', '$description', 1, 1300.00, CURRENT_TIMESTAMP, '$sdate', '$edate'";
$query .= ")";

$result = mysqli_query($connection, $query);

if($result){
    //get max id, because it´ the new id and set it as a session value
    $query = "SELECT MAX(id) as id FROM projects limit 1";
    $res = mysqli_query($connection, $query);
    $var_value = mysqli_fetch_object($res);
    session_start();
    $_SESSION['currentProjetcID'] = $var_value->id;
    //go to next page
    header("Location: insert_users_to_project.php" ); 
    exit;    
}
else{
    die("Database query failed. " .mysql_error($connection));
    echo "Something went wrong!";
    header("Location: createProject1.html"); 
}

?> 
    

