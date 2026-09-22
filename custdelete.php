<?php
include('dbconnect.php');
 if(isset($_GET['cusid'])){
	 $id=$_GET['cusid'];
	 $sql="delete from customer where cusid='$id'";
	 $stmt=$conn->query($sql);
	 $stmt->execute();
	 echo"<script>alert('record delet successfuly')</script>";
	 require('custview.php');
 }
?>
