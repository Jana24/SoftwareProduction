<?php

/* 
 *  Created on : 21-Mar-2015, 19:10:59
    Author     : Juan Wang 13008700
 */

// include top header and database connection
include 'topsearch.php';

  //Now create query related to main page
session_start();

//TODO: delete folowing line
//$_SESSION['current_user'] = "Juan Wang";
$user = $_SESSION['current_user'];




echo '  <html>';
echo '      <head>';
echo '          <title>Main</title>';
echo '          <meta charset="UTF-8">';
echo '          <meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '      <script>$("tr").click( function() {
            window.location = $(this).find("a").attr("href");
            }).hover( function() {
                $(this).toggleClass("hover");
            });
            </script>';
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
echo '      tr:hover { 
                cursor: pointer;
                background: grey; 
             }
             td a { 
                display: block; 
                border: 1px solid black;
                padding: 16px; 
             }
             #projectsTableMain tr td {
                padding-left: 0;
                padding-right: 0;
            }';
   
echo '    </style> ';
echo '    <body> ';

echo '	  <div id ="myProjectsMain"> '; 
echo '	    <h3>  My Projects </h3> ';
echo '	     <!-- create project ID for the purpose of allowing javascript functions to work --> ';
echo '	    <table id="projectsTableMain" > ';
echo '		<!-- create table 1 --> ';     
echo '	      <tbody> ';
echo '	        <tr> ';                  
echo '          <td width="100px" align="left" style="background-color:#D0D0D0";>Name  </th> ';
echo '          <td width="765px" align="left" style="background-color:#D0D0D0";>Status  </th>';
echo '		</tr> ';
            $query2 = "select p.name, p.status, p.id from projects p, user_project up, users u where p.id=up.projectid and up.userId=u.id and u.name='$user';";
            $result2 = mysqli_query($connection, $query2);
            while($obj=mysqli_fetch_object($result2))
            {
                $name = $obj->name; 
                $status = $obj->status;
                $p_id = $obj->id;
echo '	        <tr id='.$p_id.'"> ';        
echo '              <td><a href="editProject1.php?projId='.$p_id.'">'.$name.'</a></td>';
echo '              <td><a href="editProject1.php?projId='.$p_id.'">'.$status.'</a></td>';
echo '		</tr> ';
            }
echo '		  </tbody> ';

echo '	    </table> ';
echo '		<br> ';
echo '	    <div class="bottomButtonsMain"> ';
echo '	      <FORM METHOD="LINK" ACTION="createProject1.html">';
echo '          <INPUT TYPE="submit" VALUE="Create">';
echo '          </FORM>';
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





/*if(!$result2){
    include ('error.html');
    die ("Could not query the database: <br />". mysql_error());
} */

?> 