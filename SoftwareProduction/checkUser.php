<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
print_r($_SESSION['currentProjetcID']);
include('db_connect.php'); 
//get selected User
//get selected role
//insert into database


//go back
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;