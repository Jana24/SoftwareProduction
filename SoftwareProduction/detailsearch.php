<?php

/* 
 *  Created on : 21-Mar-2015, 19:10:59
    Author     : Juan Wang 13008700
 *  search page with a drop down list to search specifically for projects, activities, and users.
 */

  include 'topsearch.php';
echo '	  <div id="container2">'; 
	  
echo '	    <form  method=POST ACTION="detailsearch.php" style=\"font-size:14px;\">';     
echo '<TABLE border=0 cellpadding=5>';
echo '<TR><TD><input type="text"  name="search2" size="50" ></TD>'; 
echo '<TD><select name="option">';
echo '<option value="0">Please select</option>';
echo '<option value="projects">Projects</option>';
echo '<option value="activities">Activities</option>';
echo '<option value="users">Users</option>';
echo '</select></TD>';
echo '<TD><INPUT TYPE=reset VALUE="Clear"></TD>'
. '<TD><input type="submit" value="Search" name="detailsearch" ></TD>'; 
echo '</form>	'; 
echo '</div> '; 



if (!empty($_POST['detailsearch'])) { 
    $searchtext=(isset($_POST['search2']))? $_POST['search2']:"";
    $option=(isset($_POST['option']))? $_POST['option']:"";
    if ( !empty($searchtext)&&!empty($option)) {
        switch ($option){
            case "projects":
                echo "<table border=\"1\">";
                echo "  <h1> Search results for projects: </h1>";
                echo "  <tr>";
                echo "   <th>id</th>";
                echo "   <th>name</th>";
                echo "	 <th>status</th>";
                echo "	 <th>description</th>";
                echo "	 <th>manager</th>";
                echo "	 <th>budget</th>";
                echo "	 <th>creationDate</th>";
                echo "	 <th>startDate</th>";
                echo "	 <th>dueDate</th>";
                echo "  </tr>  ";
                    $query1 = "select * from projects where name like '%$searchtext%' or description like '%$searchtext%' order by id limit 100; ";
                    //  execute the query and display projects in results
                    $result1= mysqli_query($connection ,$query1);
                    if(!$result1){
                        include ('error.html');
                        die ("Could not query the database: <br />". mysql_error());
                        } 
                    while($row = mysqli_fetch_assoc($result1)){ //identifying columns by name
                        $id = $row["id"]; 
                        $name = $row["name"];	
                        $status = $row["status"];	
                        $description = $row["description"];
                        $managerId = $row["managerId"];
                        $budget = $row["budget"];
                        $creationDate = $row["creationDate"];
                        $startDate = $row["startDate"];
                        $dueDate = $row["dueDate"];
                        //display names for managers
                        $querymanager="select distinct u.name from users u, projects p where u.id=$managerId ;";
                        $resultmanager=mysqli_query($connection,$querymanager);
                            while($row = mysqli_fetch_assoc($resultmanager)){
                                $manager=$row["name"];
                                }
                        echo "<tr>";	
                        echo "<td>$id</td>";	
                        echo "<td>$name</td>";	
                        echo "<td>$status</td>";
                        echo "<td>$description</td>";	
                        echo "<td>$manager</td>";	
                        echo "<td>$budget</td>";
                        echo "<td>$creationDate</td>";   
                        echo "<td>$startDate</td>";
                        echo "<td>$dueDate</td>";	
                        echo "</tr>";
                        }
                        break;
            case "activities":
                //display Search Activities Result
                echo "<table border=\"1\">";
                echo "  <h1> Search results for activities: </h1>";
                echo "  <tr>";
                echo "   <th>id</th>";
                echo "   <th>type</th>";
                echo "   <th>name</th>";
                echo "	 <th>status</th>";
                echo "	 <th>projectId</th>";
                echo "	 <th>assignee</th>";
                echo "	 <th>description</th>";
                echo "	 <th>expectedHours</th>";
                echo "	 <th>actualHours</th>";
                echo "	 <th>creationDate</th>";
                echo "  </tr>  ";
                $query2 = "select * from activities where name like '%$searchtext%' or description like '%$searchtext%' order by id limit 100; ";
                //  execute the query and display activities in results
                $result2= mysqli_query($connection ,$query2);
                if(!$result2){
                    include ('error.html');
                    die ("Could not query the database: <br />". mysql_error());
                    } 
                while($row = mysqli_fetch_assoc($result2)){ //identifying columns by name
                    $id = $row["id"]; 
                    $type = $row["type"]; 
                    $name = $row["name"];	
                    $status = $row["status"];
                    $projectId = $row["projectId"];
                    $assigneeId = $row["assigneeId"];
                    $description = $row["description"];
                    $expectedHours = $row["expectedHours"];
                    $actualHours = $row["actualHours"];
                    $creationDate = $row["creationDate"];
                    //display names for assignees
                    $queryassignee="select distinct u.name from users u, activities a where u.id=$assigneeId ;";
                        $resultassignee=mysqli_query($connection,$queryassignee);
                            while($row = mysqli_fetch_assoc($resultassignee)){
                                $assignee=$row["name"];
                                }
                    echo "<tr>";	
                    echo "<td>$id</td>";
                    echo "<td>$type</td>";
                    echo "<td>$name</td>";	
                    echo "<td>$status</td>";
                    echo "<td>$projectId</td>";	
                    echo "<td>$assignee</td>";
                    echo "<td>$description</td>";	
                    echo "<td>$expectedHours</td>";
                    echo "<td>$actualHours</td>";      
                    echo "<td>$creationDate</td>";  
                    echo "</tr>";
                    }
                    break; 
            case "users":
                //display Search Activities Result
                echo "<table border=\"1\">";
                echo "  <h1> Search results for users: </h1>";
                echo "  <tr>";
                echo "   <th>id</th>";
                echo "   <th>name</th>";
                echo "	 <th>hourlyRate</th>";
                echo "  </tr>  ";
                $query3 = "select * from users where name like '%$searchtext%' order by id limit 100; ";
                //  execute the query and display activities in results
                $result3= mysqli_query($connection ,$query3);
                if(!$result3){
                    include ('error.html');
                    die ("Could not query the database: <br />". mysql_error());
                    } 
                while($row = mysqli_fetch_assoc($result3)){ //identifying columns by name
                    $id = $row["id"];                     
                    $name = $row["name"];	
                    $hourlyRate = $row["hourlyRate"];                    
                    echo "<tr>";	
                    echo "<td>$id</td>";                    
                    echo "<td>$name</td>";	
                    echo "<td>$hourlyRate</td>";
                    echo "</tr>";
                    }
                break;
                }
            }
        
    }
