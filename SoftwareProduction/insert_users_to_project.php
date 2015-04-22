
<?php
/*
 *  Created on : 12-Mar-2015, 10:14:00
    Author     : Jana Willmann 14075531
    Description: 
        - get all users from database and create a table with these and add drop down list to each row
        - if button clicked go to update_project_user.php
*/

include('createProject2.html');

session_start();


include('db_connect.php');  

//get all users
$query_opt = "SELECT DISTINCT name, id FROM users";
$res_opt = mysqli_query($connection, $query_opt);
$counter = mysqli_num_rows($res_opt);

if ($counter > 0) {
//create new table
echo "<table style='width:100%'>";
echo "<tr>";
echo "<th align='left'>Name </th>";
echo "<th align = 'left'>Role </th> ";
echo "</tr>";

while ($row = mysqli_fetch_array($res_opt)) {
    //create new row for user and set drop down list
    echo "<tr>";
    echo "<td>" . $row['name'] .  "</td>";
    echo "<td width='65%'>";
    echo "    <select name='". $row['id'] ."' id='category".$row['id']."'>";
    echo "      <option value='None'>None</option>";
    echo "      <option value='Manager'>Project Manager</option>";
    echo "      <option value='Developer'>Developer</option>";
    echo "      <option value='Tester'>Tester</option>";
    echo "    </select>";
    echo "</td> ";
    echo "</tr>\n";
}
echo "</table>";
}

echo "	  <br><br><br>";

echo "        <button id='submit' style='margin-left:20px;' >Submit</button>
	</div>";
echo " </form>";        

echo "  </body>";

echo "</html>";