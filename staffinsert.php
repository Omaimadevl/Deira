<?php
if(isset($_POST['submit']))
{
	if(!empty($_POST['staffid'] && $_POST['username'] && $_POST['password'] && $_POST['gender'] && $_POST['phonenum'] &&  $_POST['role']))
		// validate the values in the form
	{
		// 1- connect to the database
		include('dbconnect.php');  
		//2- get the data from the form and save it in array
		$data = [
			':staffid' => $_POST['staffid'],
			':name' => $_POST['username'],
			':pass' => $_POST['password'],
			':gender' => $_POST['gender'],
			':phone' => $_POST['phonenum'],
			':role' => $_POST['role'], // Add role to the data array
			

		];
		// 3- write the insert query statement and save it in a vriable
		
		$sql ="insert into staff(staffid,username,password,gender,phonenum,role)values(:staffid,:name,:pass,:gender,:phone,:role)";
		// 4- prepare the query for excution 
		
		$stmt = $conn ->prepare($sql);
		
		// 5- excute the the query with the data saved in the array
		
		$stmt->execute($data);
				
		echo "<br><br>Record inserted successfully...<br> <br>"; 
		require('staffview.php');
	}
	else
	{
		if(empty($_POST['staffid']))
			echo "<br>fill the staff id ...<br>";
		if(empty($_POST['username']))
			echo "fill the staff username ...<br>";
		if(empty($_POST['password']))
			echo "<br>fill the staff password ...<br>";
		if(empty($_POST['gender']))
			echo "<br>fill the staff gender ...<br>";
		if(empty($_POST['phonenum']))
			echo "<br>fill the staff phone number ...<br>";
		if(empty($_POST['role']))
            echo "<br>Fill your role ...<br>";
		echo "<br><br><a href=staff.php>Go back to entry form</a>";
	}
}
?>