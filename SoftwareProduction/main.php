<?php

/* 
 *  Created on : 21-Mar-2015, 19:10:59
    Author     : Juan Wang 13008700
 */

// include top header and database connection
include 'topsearch.php';
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
echo '  <html>';
echo '      <head>';
echo '          <title>Main</title>';
echo '          <meta charset="UTF-8">';
echo '          <meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '      </head>';
echo '    <style type="text/css">';
echo '      @import url("text.css");';
echo '      table { ';
echo '      width:90%; ';
    //This is important in terms of keeping the table at a good size
echo '      }';
echo '      table,tr,th,td{ ';
echo '      border: 1px solid black; ';
echo '      padding: 5px; ';
echo '      border-collapse:collapse; ';
echo '      margin-left:20px; ';
echo '      font-size:14px; ';
echo '      } ';
   
echo '      h3 { ';
echo '      padding-left:15px;  '; 
echo '      } ';
   
echo '     th { ';
echo '      background-color:#D0D0D0 ;  ';
echo '      } ';
   
echo '    </style> ';
echo '    <body> ';
echo '      <div id ="main"> ';
echo '  	  <button id="homeButton">Home</button> ';

echo '	<a id="searchForm"> ';
echo '	  	  <input type="text"  value="Search" id="search"> ';
echo '	  <input type="submit" value="Go" id="go"> ';
echo '	</a> ';
          
echo '    <div class="topButtons"> ';
echo '	  <button id="settingsButton">Settings</button> ';
echo '	  <button id="profileButton">Profile</button> ';
echo '	</div>';
echo '	  <div id ="myProjectsMain"> '; 
echo '	    <h3>  My Projects </h3> ';
echo '	     <!-- create project ID for the purpose of allowing javascript functions to work --> ';
echo '	    <table id="projectsTableMain"> ';
echo '		<!-- create table 1 --> ';
echo '	      <tbody> ';
echo '	        <tr> ';
echo '            <td width="100px" align="left" style="background-color:#D0D0D0";>Name  </th> ';
echo '            <td width="765px" align="left" style="background-color:#D0D0D0";>Status  </th>';
echo '		</tr> ';
echo '		  </tbody> ';

echo '	    </table> ';
echo '		<br> ';
echo '	    <div class="bottomButtonsMain"> ';
echo '	      <button id="CreateView" onclick="create()">Create  </button> ';
echo '	      <button id="deleteView" onclick="deleteRow()">Delete  </button> ';
echo '	      <button id="projectsView" onclick="view()">View  </button> ';
echo '	      <button id="editsView" onclick="readRow()">Edits  </button> ';
echo '	    </div> ';
echo '	  </div> ';
	  
echo '	  <!-- now create a second section to contain table number 2 --> ';
echo '	  <div id="myActivitiesMain"> ';
echo '	    <h3>My Activites</h3> ';
		
echo '	    <table id="activitiesTable"> ';
echo '	      <thead> ';
echo '	        <tr> ';
echo '                  <th width="100px" align="left">Name  </th> ';
echo '                  <th width = "200px" align="left">Project</th> ';
echo '                  <th width= "295px" align="left">Due to</th> ';
echo '                  <th width="100px" align="left">Days Left</th> ';
echo '		  <th width ="135px" align="left">Status</th> ';
echo '                </tr> ';
echo '	      </thead> ';
echo '		  <tbody> ';
echo '		    <tr> ';
echo '                <td>Content 1 </td> ';
echo '                <td>Project 2  </td> ';
echo '                <td>15.02.2015</td> ';
echo '                <td>2  </td> ';
echo '                <td>pending</td> ';
echo '              </tr> ';
echo '		    <tr> ';
echo '                <td>Content 2</td> ';
echo '                <td>Project 5</td> ';
echo '                <td>18.02.2015</td> ';
echo '                <td>5  </td> ';
echo '                <td>Not started</td> ';
echo '              </tr> ';
echo '              <tr> ';
echo '		      <td>Content 3</td> ';
echo '                <td>Project 2</td>';
echo '                <td>21.02.2015</td> ';
echo '                <td>9  </td> ';
echo '		      <td>In progress</td> ';
echo '		  </tbody> ';
echo '	    </table> ';
echo '		<br><br> ';
echo '        <div class="bottomButtons"> ';
echo '	      <button id="projectsView">View  </button> ';
echo '	      <button id="editsView">Edits  </button> ';
echo '	    </div> ';
	  
echo '	  </div> ';
	  
echo '    <div> ';
echo '  </body> ';

echo ' </html>  ';
//if user uses the search button at the top of page
if (!empty($_POST['topsearch'])) { 

  
$text=(isset($_POST['search1']))? $_POST['search1']:"";
if ( !empty($text)) {
    // display Search Projects Result
    echo "<table border=\"1\">";
echo "  <h1> Search results for projects: </h1>";
echo "  <tr>";
echo "   <th>id</th>";
echo "   <th>name</th>";
echo "	 <th>status</th>";
echo "	 <th>description</th>";
echo "	 <th>managerId</th>";
echo "	 <th>budget</th>";
echo "	 <th>creationDate</th>";
echo "	 <th>startDate</th>";
echo "	 <th>dueDate</th>";
echo "  </tr>  ";
$query1 = "select * from projects where name like '%$text%' or description like '%$text%' order by id limit 100; ";
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
	echo "<tr>";	
        echo "<td>$id</td>";	
        echo "<td>$name</td>";	
        echo "<td>$status</td>";
        echo "<td>$description</td>";	
        echo "<td>$managerId</td>";	
        echo "<td>$budget</td>";
        echo "<td>$creationDate</td>";        
        echo "<td>$startDate</td>";
        echo "<td>$dueDate</td>";	
        echo "</tr>";
  }
  //display Search Activities Result
        echo "<table border=\"1\">";
        echo "  <h1> Search results for activities: </h1>";
        echo "  <tr>";
        echo "   <th>id</th>";
        echo "   <th>type</th>";
        echo "   <th>name</th>";
        echo "	 <th>status</th>";
        echo "	 <th>projectId</th>";
        echo "	 <th>assigneeId</th>";
        echo "	 <th>description</th>";
        echo "	 <th>expectedHours</th>";
        echo "	 <th>actualHours</th>";
        echo "	 <th>creationDate</th>";
        echo "  </tr>  ";

        //Now create query related to main page
          $query2 = "Select p.id, p.name from projects natural join users natural join user project where p.name like '%$text%'; ";
          //  execute the query and display activities in results
         $result2= mysqli_query($connection ,$query2);
         if(!$result2){
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
        echo "<tr>";	
        echo "<td>$id</td>";	
        echo "<td>$name</td>";	
        echo "<td>$status</td>";
        echo "<td>$description</td>";	
        echo "<td>$managerId</td>";	
        echo "<td>$budget</td>";
        echo "<td>$creationDate</td>";   
        echo "<td>$startDate</td>";
        echo "<td>$dueDate</td>";	
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

