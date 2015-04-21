
<?php
/*
 *  Created on : 12-Mar-2015, 10:14:00
    Author     : Jana Willmann 14075531
    Description: 
        - get all users from database and they role
        - go to update_project_user.php when finished pushing it into database

*/
include('db_connect.php');
include('editProject2.html');

session_start();
//echo "ID: ";
//print_r($_SESSION['currentProjetcID']);

include('db_connect.php');  
$query_opt = "SELECT DISTINCT name, id FROM users";
$res_opt = mysqli_query($connection, $query_opt);
$counter = mysqli_num_rows($res_opt);

if ($counter > 0) {

echo "<table style='width:100%'>";
echo "<tr>";
echo "<th align='left'>Name </th>";
echo "<th align = 'left'>Role </th> ";
echo "</tr>";

while ($row = mysqli_fetch_array($res_opt)) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td width='65%'>";
            $id = $row['id'];
            //session_start();
            $cur_ID_proj = $_SESSION['currentProjectID'];

            $query = "select role from user_project where userId='$id' and projectId='$cur_ID_proj'";
            $res= mysqli_query($connection, $query);
            $obj = mysqli_fetch_row($res);
            $role = $obj[0];
       
            echo "    <select name='". $row['id'] ."' id='category".$row['id']."'>";
            if($role=="project manager"){
                echo "      <option value='None'>None</option>";
                echo "      <option value='Manager' selected>Project Manager</option>";
                echo "      <option value='Developer'>Developer</option>";
                echo "      <option value='Tester'>Tester</option>";
            }
            else if ($role=="developer") { 
                echo "      <option value='None'>None</option>";
                echo "      <option value='Manager'>Project Manager</option>";
                echo "      <option value='Developer' selected>Developer</option>";
                echo "      <option value='Tester'>Tester</option>";
            }
            else if($role=="tester"){
                echo "      <option value='None'>None</option>";
                echo "      <option value='Manager'>Project Manager</option>";
                echo "      <option value='Developer'>Developer</option>";
                echo "      <option value='Tester' selected>Tester</option>";
            }else{
                echo "      <option value='None' selected>None</option>";
                echo "      <option value='Manager'>Project Manager</option>";
                echo "      <option value='Developer'>Developer</option>";
                echo "      <option value='Tester'>Tester</option>";
            }

    echo "    </select>";
    echo "</td> ";
    echo "</tr>\n";
}
echo "</table>";
}

echo "	  <br><br><br>";

echo "        <button id='submit' style='margin-left:20px;' >Submit</button>";
echo "       <div id='submitButton' 
	</div>";
echo " </form>";        

echo "  </body>";

echo "</html>";