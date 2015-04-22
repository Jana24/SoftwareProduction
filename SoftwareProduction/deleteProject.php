<?php

/* 
 * Created on : 14-April-2015, 12:14:00
    Author     : Jana Willmann 14075531
    Description:
        - deletes the chosen project from database
        - redirects back to main.php
 */
 

include('db_connect.php');  

$id = $_GET['projId'];

//delte from user_project table
$query_opt = "delete from user_project where projectId='$id'";
$res_opt = mysqli_query($connection, $query_opt);

//delte from project table
$query = "delete from projects where id='$id'";
$res = mysqli_query($connection, $query);

header("Location: main.php");

