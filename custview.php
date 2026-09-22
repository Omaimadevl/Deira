<?php
session_start();
if(isset($_SESSION['username']))
echo "WELCOME ".$_SESSION['username']."<br><br>";
?>
<a href='logout.php'>LOGOUT</a><br> <br>
<?php

// 1- connect to the database
include('dbconnect.php');

// 2- write the select query in alphabetical order using cusid
$sql = "SELECT cusid, username, telephone, email, password, role FROM customer ORDER BY cusid ASC";

// 3- run the SQL query
$stmt = $conn->query($sql);

// 4- fetch all the records from the table and store it in array
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 5- get the number of rows in the array 
$n = $stmt->rowCount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Records</title>
    <link rel="stylesheet" href="styleview.css"> 
</head>
<body>
<?php
// 6- if the number of rows is more than zero, display the data
if($n > 0) {
    echo "<table border='1'>
        <tr>
            <th>CUSTOMER ID</th>
            <th>USERNAME</th>
            <th>TELEPHONE</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>ROLE</th> <!-- New column for role -->
            <th>Action</th>
        </tr>";
        
    foreach($rows as $row) {
        echo "<tr>";
        echo "<td>{$row['cusid']}</td>";
        echo "<td>{$row['username']}</td>";
        echo "<td>{$row['telephone']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['password']}</td>";
        echo "<td>{$row['role']}</td>"; // Display role data
        echo "<td>
            <a href='custdelete.php?cusid={$row['cusid']}'
            onclick=\"return confirm('Do you want to delete this customer?');\">Delete</a>
            <a href='cusupdate.php?cusid={$row['cusid']}'> || Update</a>
            </td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br><br><a href='signup.php'>Insert another record</a>";
    echo "<div style='background-color: green; width: 150px; padding: 10px; text-align: center;'>
          <a href='spage.php' style='color: white; text-decoration: none;'>Exit</a>
      </div>";
} else {
    // 7- otherwise display message there is no data found
    echo "No records have been found";    
}
?>
</body>
</html