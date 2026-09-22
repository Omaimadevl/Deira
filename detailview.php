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
$sql = "select tripid,cusid,staffid,pname,nom,sdate,comments from detail order by tripid asc ";
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
    <title>Trips Details</title>
    <link rel="stylesheet" href="styleview.css"> 
</head>
<body>
<?php
// 6- if the number of rows more than zero the display the data
if($n>0){
	echo "<table border='1'><tr>
		<th>TRIP ID</th>
		<th>CUSTOMER ID</th>
		<th>STAFF ID</th>
		<th>PLACE NAME</th>
		<th>NOMBER OF MEMBER</th>
		<th>TRIP START DATE</th>
		<th>COMMENT</th>
		<th>Action</th></tr>";
		
	foreach($rows as $row){
		echo "<tr>";
		echo "<td>{$row['tripid']}</td>";
		echo "<td>{$row['cusid']}</td>";
		echo "<td>{$row['staffid']}</td>";
		echo "<td>{$row['pname']}</td>";
		echo "<td>{$row['nom']}</td>";
		echo "<td>{$row['sdate']}</td>";
		echo "<td>{$row['comments']}</td>";
		echo "<td><a href='detaildelete.php?tripid={$row['tripid']}'
		onclick=\"return confirm('Do you want to delet this detail?');\"> Delete </a>
		<a href='detailsupdate.php?tripid={$row['tripid']}'> || Update</a></td></tr>";
	}
	echo"</table>";
	echo "<br><br><a href=details.php>Insert another record</a>";
	echo "<div style='background-color: green; width: 150px; padding: 10px; text-align: center;'>
          <a href='spage.php' style='color: white; text-decoration: none;'>Exit</a>
      </div>";
	
   
} else {
    echo "No records have been found";
}
?>
