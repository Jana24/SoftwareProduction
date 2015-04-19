<?php

/*
 *  Created on : 19-Apr-2015, 17:34:00
    Author     : Jana Willmann 14075531
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
            //write to database
            print_r("User_ID ".$user_id);
            print_r("Project_ID ".$cur_ID_proj);
            print_r("Role ".$inputValue);
            print_r("Role ".$user_id);
            print_r("Role ".$projName);
            if($inputValue=="Manager"){
                $role = "project manager";
            }
            else if ($inputValue=="Developer") { 
                $role = "developer";
            }
            else if($inputValue=="Tester"){
                $role = "tester";
            }
            
            //update or insert, if not there yet
            $query = "INSERT INTO table (userId, projectId, role) VALUES($user_id, $cur_ID_proj, $role) ON DUPLICATE KEY UPDATE userID=VALUES('$user_id'), projectID=VALUES('$cur_ID_proj')";      
            $result = mysqli_query($connection, $query);
            
        }else{
            
            $query = "DELETE from user_project WHERE userId='$user_id' and projectId='$cur_ID_proj'";      
            $result = mysqli_query($connection, $query);     
        }
    
    }
    //header("Location: main.php" ); 
    
}
