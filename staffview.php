<?php
session_start();
if(isset($_SESSION['username']))
echo "WELCOME ".$_SESSION['username']."<br><br>";
?>
<a href='logout.php'>LOGOUT</a><br> <br>
<?php
// 1- connect to the database
include('dbconnect.php');
// 2- write the select query in alphapatical order using stname 
$sql = "select staffid,username,password,gender,phonenum,role from staff order by staffid asc ";
// 3- run the sql query
$stmt=$conn->query($sql);
// 4- fetch all the records from the table and store it in array
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
// 5- get the number of rows in the array 
$n=$stmt->rowCount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Records</title>
    <link rel="stylesheet" href="styleview.css"> 
</head>
<body>
<?php
// 6- if the number of rows more than zero the display the data
if($n>0){
	echo "<table border='1'><tr>
		<th>STAFF ID</th>
		<th>USERNAME</th>
		<th>PASSWORD</th>
		<th>GENDER</th>
		<th>PHONE NUMBER</th>
		<th>ROLE</th> <!-- New column for role -->
		<th>Action</th></tr>";
		
	foreach($rows as $row){
		echo "<tr>";
		echo "<td>{$row['staffid']}</td>";
		echo "<td>{$row['username']}</td>";
		echo "<td>{$row['password']}</td>";
		echo "<td>{$row['gender']}</td>";
		echo "<td>{$row['phonenum']}</td>";
		echo "<td>{$row['role']}</td>"; // Display role data
		echo "<td><a href='staffdelete.php?staffid={$row['staffid']}'
		onclick=\"return confirm('Do you want to delete this staff?');\"> Delete </a>
		<a href='staffupdate.php?staffid={$row['staffid']}'> || Update</a>
		</td></tr>";
	}
	echo"</table>";
	echo "<br><br><a href=staff.php>Insert another record</a>";
	echo "<div style='background-color: green; width: 150px; padding: 10px; text-align: center;'>
          <a href='spage.php' style='color: white; text-decoration: none;'>Exit</a>
      </div>";
   
} else {
    echo "No records have been found";
}
?>