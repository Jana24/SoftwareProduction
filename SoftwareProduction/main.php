<style type="text/css">
    .selectedTag{
        background: #bebebe;
        font-weight:bold;
    }
    .deselectedTag{
        background: #ffffff;
        font-weight:normal;
    }
 </style>

<?php

/* 
 *  Created on : 23-Mar-2015, 19:10:59
    Author     : Daniel Mckean
    Description:
        - display the projects and activities from the user that is logged in
        - from this page it is possible to edit, delete and create a project
 
 */

// include top header and database connection
include 'topsearch.php';

  //Now create query related to main page
session_start();

$user = $_SESSION['current_user'];



echo '  <html>';
echo '      <head>';
echo '          <title>Main</title>';
echo '          <meta charset="UTF-8">';
echo '          <meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '               <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>';
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
echo '      border: 1px solid #D6D6D6; ';
echo '      padding: 5px; ';
echo '      border-collapse:collapse; ';
echo '      margin-left:50px; ';
echo '      font-size:14px; ';
echo '      } ';
   
echo '      h3 { ';
echo '      padding-left:50px;  '; 
echo '      } ';

//echo '           tr:nth-of-type(odd) { 
 //           background: #eee; 
 //           }
 //  ';
echo '     th { ';
echo '      background-color:#99CCFF ;  ';
echo '      padding:6px;';
echo '      } ';
echo '      tr:hover { 
                cursor: pointer;
                background: #d6d6d6; 
             }
             td a { 
                display: block; 
                color:black;
                padding: 6px; 
                text-decoration:none;
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
echo '<input type="hidden" id="hiddenId">';
echo '	    <table id="projectsTableMain" > ';
echo '		<!-- create table 1 --> ';     
echo '	      <tbody> ';
echo '	        <tr> ';                  
echo '          <td width="200px" align="left" style="background-color:#99CCFF; padding:6px; font-weight:bold";>Name  </th> ';
echo '          <td width="750px" align="left" style="background-color:#99CCFF; padding:6px; font-weight:bold";>Status  </th>';
echo '		</tr> ';
            //get everything from the projects that the user is involved in
            $query2 = "select p.name, p.status, p.id from projects p, user_project up, users u where p.id=up.projectid and up.userId=u.id and u.name='$user';";
            $result2 = mysqli_query($connection, $query2);
            while($obj=mysqli_fetch_object($result2))
            {
                $name = $obj->name; 
                $status = $obj->status;
                $p_id = $obj->id;
echo '	        <tr id="'.$p_id.'"> ';        
//echo '              <td><a href="editProject1.php?projId='.$p_id.'">'.$name.'</a></td>';
//echo '              <td><a href="editProject1.php?projId='.$p_id.'">'.$status.'</a></td>';
echo '              <td><a href="#" onclick="toggleColor('.$p_id.');">'.$name.'</a></td>';
echo '              <td><a href="#" onclick="toggleColor('.$p_id.');">'.$status.'</a></td>';
echo '		</tr> ';
            }
echo '		  </tbody> ';

echo '	    </table> ';
echo '		<br> ';
echo '	    <div class="bottomButtonsMain"> ';
echo '        <button id="create" onclick=actionProject(2)>Create</button>';
echo '	      <button id="deleteView" onclick="actionProject(1)">Delete  </button> ';
echo '	      <button id="projectsView" onclick="view()">View</button> ';
echo '	      <button id="editsView" onclick="actionProject(3)">Edit</button> ';
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
echo '                  <th width= "295px" align="left">Due</th> ';
echo '                  <th width="100px" align="left">Days Left</th> ';
echo '		  <th width ="135px" align="left">Status</th> ';
echo '                </tr> ';
echo '	      </thead> ';
echo '		  <tbody> ';
echo '		    <tr> ';
echo '                <td style="padding:8px;">Juan Wang</td> ';
echo '                <td>Project 2  </td> ';
echo '                <td>15.02.2015</td> ';
echo '                <td>2  </td> ';
echo '                <td>pending</td> ';
echo '              </tr> ';
echo '		    <tr> ';
echo '                <td style="padding:8px;">Daniel McKean</td> ';
echo '                <td>Project 5</td> ';
echo '                <td>18.02.2015</td> ';
echo '                <td>5  </td> ';
echo '                <td>Not started</td> ';
echo '              </tr> ';
echo '              <tr> ';
echo '		      <td style="padding:8px;">Jana Willmann</td> ';
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
    //toggle for the clicked row
   function toggleColor(id){
        if ($('#'+id).hasClass('selectedTag')) {
            $('#'+id).removeClass('selectedTag').addClass('deselectedTag');
            $('#hiddenId').val(0);  
        }
        else {
            $('#'+$('#hiddenId').val()).removeClass('selectedTag').addClass('deselectedTag');
            $('#hiddenId').val(id);  
            $('#'+id).removeClass('deselectedTag').addClass('selectedTag');
        }
       
   }
   //actions for the buttons edit, create and delete
   function actionProject(token){
       var id = $('#hiddenId').val();
       if(token==3){
           window.open("editProject1.php?projId="+id,"_self");
       }
       else if(token == 2){
           window.open("createProject1.html","_self");
       }
       else if(token == 1){
           //delete
           var x = confirm("Are you sure you want to delete this project?");
           if(x){
               //delete
               window.open("deleteProject.php?projId="+id,"_self");
           }else{
               //close poup
               
           }
       }
   }
</script>