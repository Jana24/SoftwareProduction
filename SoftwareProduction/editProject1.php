<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include('db_connect.php');  
include('editProject1.html');
session_start();
$id= $_GET['projId'];
$_SESSION['currentProjectID'] = $id;

//$_SESSION['current_user'] = "Juan Wang";

$query = "select name, status, description, startDate, dueDate from projects where id = '$id'";
$res_opt = mysqli_query($connection, $query);
$row = mysqli_fetch_array($res_opt);


$projName  = $row['name'];
$description = $row['description'];
$status = $row['status'];
$start_date = $row['startDate'];
$end_date = $row['dueDate']; 


echo 'Name: ';
echo' <input type="text" id ="myName" name="proj_name" size="40" value="'.$projName.'"> <br><br><br><br>	';

echo 'Description: <br><br> 
    <TEXTAREA name="proj_description" id ="myDescription" ROWS=8 COLS=50>'. $description .'</TEXTAREA>

    <br><br><br><br>

    Status: 
    <select id="myStatus" name="status">';
    if($status == "not started"){
        echo '
        <option id="myStatus" value="not_started" selected>Not Started</option>
        <option id="myStatus" value="undergoing">Undergoing</option>
        <option id="myStatus" value="completed">Completed</option>';
    }else if($status == "undergoing"){
        echo '
        <option id="myStatus" value="not_started" selected>Not Started</option>
        <option id="myStatus" value="undergoing" selected>Undergoing</option>
        <option id="myStatus" value="completed">Completed</option>';
    }else if($status == "completed"){
        echo '
        <option id="myStatus" value="not_started" selected>Not Started</option>
        <option id="myStatus" value="undergoing">Undergoing</option>
        <option id="myStatus" value="completed" selected>Completed</option>';
    }
echo '
    </select>
    <br><br><br><br>';
    $dateFormated = explode('-', $start_date);
    $day = explode(' ', $dateFormated[2]);
    $sdate = $day[0].'/'.$dateFormated[1].'/'.$dateFormated[0];

    $dateFormated = explode('-', $end_date);
    $day = explode(' ', $dateFormated[2]);
    $edate = $day[0].'/'.$dateFormated[1].'/'.$dateFormated[0];

    
echo '

    Start date: 
    <input type="text" id ="startDate" name="startDate" size="40" value="'.$sdate.'">
    <br><br><br><br>	

    End date: 
    <input name="endDate" id ="endDate" type="text" size="40" value="'.$edate.'"> 

    <br><br><br><br>	
    <input type="submit" value="Submit" id="submit" name="submit" value="Next"/>
</div>
</form>    
</div>

</div>
</body>

</html> ';