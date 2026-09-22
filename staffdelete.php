<?php

include('dbconnect.php');
 if(isset($_GET['staffid'])){
	 $id=$_GET['staffid'];
	 $sql="delete from staff where staffid='$id'";
	 $stmt=$conn->prepare($sql);
	 $stmt->bindParam(':staffid', $staffid);
	 $stmt->execute();
	 header("Location: staffview.php");
	 exit();
 }
?>
