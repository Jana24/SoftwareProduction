<?php

/*
 *  Created on : 19-Apr-2015, 17:34:00
    Author     : Jana Willmann 14075531
    Description: 
        - get the assigned roles for each user
*/
include('db_connect.php');
session_start();
//echo "ID: ";
//print_r($_SESSION['currentProjetcID']);
$cur_ID_proj = $_SESSION['currentProjectID'];


$persons = $_POST["persons"]; 
$role_for_person = $_POST["role_for_person"]; 

if(isset($_POST))
{
    foreach($_POST as $inputName => $inputValue)
    {       
        if($inputValue != "None"){
            //Found a user that has a role get the ID
            $user_id = $inputName;
            $role = '';

            if($inputValue=="Manager"){
                $role = "project manager";
            }
            else if ($inputValue=="Developer") { 
                $role = "developer";
            }
            else if($inputValue=="Tester"){
                $role = "tester";
            }

            //search if already in database
            $query = "SELECT * from user_project WHERE userId='$user_id' and projectId='$cur_ID_proj'";      
            $result = mysqli_query($connection, $query);  
            $counter = mysqli_num_rows($result);
            
            if($counter != 0){  
                //if so do update
                $update_query = "UPDATE user_project SET role='$role' WHERE userId='$user_id' and projectId='$cur_ID_proj'"; 
                $update_result = mysqli_query($connection, $update_query);
            }
            else{
                //if not insert into
                $insert_query = "insert into user_project(userId, projectId, role) values ($user_id, $cur_ID_proj,'$role')";
                $insert_result = mysqli_query($connection, $insert_query);
            }
            
        }else{
            //person has no role in datbase
            $user_id = $inputName;
            $query = "DELETE from user_project WHERE userId='$user_id' and projectId='$cur_ID_proj'";      
            $result = mysqli_query($connection, $query);     
        }
    
    }
    header("Location: main.php" ); 
    
}
