<?php
include('dbconnect.php');
 if(isset($_GET['tripid'])){
	 $tripid=$_GET['tripid'];
	 $sql="delete from detail where tripid='$tripid'";
	 $stmt=$conn->prepare($sql);
	 $stmt->bindParam(':tripid', $tripid);
	 $stmt->execute();
	 header("Location: detailview.php");
	 exit();
 }
?>


