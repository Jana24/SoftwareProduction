<?php

/* 
 *  Created on : 21-Mar-2015, 19:10:59
    Author     : Juan Wang 13008700
 */

// include login information
  include('db_connect.php');
  
echo '  <html>'; 
echo '    <head>'; 
echo '        <title>Search</title>'; 
echo '        <meta charset="UTF-8">'; 
echo '        <meta name="viewport" content="width=device-width, initial-scale=1.0">'; 
    
echo '  <style type="text/css">'; 
echo '    @import url("searchcss.css");'; 
echo '       .searchForm {
            margin-left:20px;
            
}';
echo '  </style>'; 
  
echo '  <script>'; 
  
echo '  </script>'; 
echo '  </head>'; 
echo '  <body>'; 
echo '    <div id ="main">'; 
echo '	  <button id="homeButton" ><a href="main.php" style="text-decoration:none; color:black; ">Home</a></button>'; 
echo '	  <form class="searchForm" method="POST" ACTION="topsearch.php">'; 
echo '	    <input type="text"  name="search1">'; 
echo '	    <input type="submit" value="Search" name="topsearch">'; 
echo '	  </form> '; 
echo '	  <form class="searchForm" ACTION="detailsearch.php">
            <input type="submit" value="Advanced Search" name="detailsearch">
          </form>'; 
        
echo '    <div class="topButtons">'; 
echo '	  <button id="settingsButton">Settings</button>'; 
echo '	  <button id="profileButton">Profile</button>'; 
echo '	</div> '; 


//if use the search button at the top of page
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
  $query2 = "select * from activities where name like '%$text%' or description like '%$text%' order by id limit 100; ";
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
        echo "<tr>";	
        echo "<td>$id</td>";
        echo "<td>$type</td>";
        echo "<td>$name</td>";	
        echo "<td>$status</td>";
        echo "<td>$projectId</td>";	
        echo "<td>$assigneeId</td>";
        echo "<td>$description</td>";	
        echo "<td>$expectedHours</td>";
        echo "<td>$actualHours</td>";        
        echo "<td>$creationDate</td>";  
        echo "</tr>";
  }
  } else {include('error.html');    }
  echo " </table>";    echo "<br>";
  
}
