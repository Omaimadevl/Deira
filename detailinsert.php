<?php
if(isset($_POST['submit']))
{
	if(!empty($_POST['tripid'] && $_POST['cusid'] && $_POST['staffid'] && $_POST['pname'] && $_POST['nom'] && $_POST['sdate'] && $_POST['comments']))
		// validate the values in the form
	{
		// 1- connect to the database
		include('dbconnect.php');  
		//2- get the data from the form and save it in array
		$data = [
			':tripid' => $_POST['tripid'],
			':cusid' => $_POST['cusid'],
			':staid' => $_POST['staffid'],
			':name' => $_POST['pname'],
			':nom' => $_POST['nom'],
			':sdate' => $_POST['sdate'],
			':comment' => $_POST['comments'],

		];
		// 3- write the insert query statement and save it in a vriable
		
		$sql ="insert into detail(tripid,cusid,staffid,pname,nom,sdate,comments)values(:tripid,:cusid,:staid,:name,:nom,:sdate,:comment)";
		// 4- prepare the query for excution 
		
		$stmt = $conn ->prepare($sql);
		
		// 5- excute the the query with the data saved in the array
		
		$stmt->execute($data);
				
		echo "<br><br>Record inserted successfully...<br> <br>"; 
		require('detailview.php');
	}
	else
	{
		if(empty($_POST['tripid']))
			echo "<br>fill the trip id ...<br>";
		if(empty($_POST['cusid']))
			echo "fill the customer id ...<br>";
		if(empty($_POST['staffid']))
			echo "<br>fill the staff id ...<br>";
		if(empty($_POST['pname']))
			echo "<br>fill the place name ...<br>";
		if(empty($_POST['nom']))
			echo "<br>fill the number of members ...<br>";
		if(empty($_POST['sdate']))
			echo "<br>fill the trip start date ...<br>";
		if(empty($_POST['comments']))
			echo "<br>write your comments ...<br>";
		echo "<br><br><a href=details.php>Go back to entry form</a>";
	}
}
?>