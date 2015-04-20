<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include('db_connect.php');  

$id = $_GET['projId'];
$query_opt = "delete from user_project where projectId='$id'";
$res_opt = mysqli_query($connection, $query_opt);

$query = "delete from projects where id='$id'";
$res = mysqli_query($connection, $query);

header("Location: main.php");

