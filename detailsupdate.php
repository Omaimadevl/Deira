<?php
if(isset($_GET['tripid']) && !isset($_POST['update']))

 {
	 include('dbconnect.php');
	 $tripid=$_GET['tripid'];
	 $sql="select cusid,staffid,pname,nom,sdate,comments from detail where tripid='$tripid'";
	 $stmt=$conn->query($sql);
	 $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
	 
	 foreach($rows as $row)
    {
        $cusid = $row['cusid'];
        $staffid = $row['staffid'];
        $pname = $row['pname'];
        $nom = $row['nom'];
		$sdate = $row['sdate'];
		$comments = $row['comments'];
    }
	
?>


<html>
<head>
<meta charset="utf-8">
<title>Trip Details</title>

</head>
<body>
<h1 style=" font-style: italic; color:#40E0D0;">Trip Details</h1>
<form action="" method="POST">
<p>
<i>please complete the form:</i><em>*</em>
</p>
<form>

<fieldset>
<legend>Trip Information</legend>
<label for="trip id">Trip ID:<em>*Like: 12*</em></label>
<input  type="number" placeholder="trip id" name="tripid" readonly value="<?PHP if(!empty($tripid)) echo $tripid;?>" autofocus required><br>
<br>
<label for="customer id">Customer ID:<em>*Like: cus123*</em></label>
<input type="text" placeholder="customer id" name="cusid" value="<?PHP if(!empty($cusid)) echo $cusid;?>" autofocus required><br>
<br>
<label for="staff id">Staff ID:<em>*Like: staff123*</em></label>
<input  type="text" placeholder="staff id" name="staffid" value="<?PHP if(!empty($staffid)) echo $staffid;?>" autofocus required><br>
<br>
<label for="name">Name of place :<em>*</em></label>
<input  placeholder="name of place" name="pname" value="<?PHP if(!empty($pname)) echo $pname;?>" autofocus required><br>
<br>
<label for="num">Number of Members:<em>*</em></label>
<input  type="number" min="0" max="120" name="nom" value="<?PHP if(!empty($nom)) echo $nom;?>" required><br>
<br>
<div>
<label for="date">Trip Start Date: </label>
<input  type="date" name="sdate" value="<?PHP if(!empty($sdate)) echo $sdate;?>">
</div>
<br>
<label for="comments"> More details<em>*</em></label><br>
<textarea  oninput="validateComments(this)" name="comments" value="<?PHP if(!empty($comments)) echo $comments;?>" required rows="10" cols="30" >
</textarea>
</fieldset>
<br><br>
<p>
<input type="submit" name="update" value="UPDATE DATA">
</p>
</form>
</body>
</html>


<?php
}
elseif(isset($_POST['update'])&& !empty($_POST['tripid'] && $_POST['cusid'] && $_POST['staffid'] && $_POST['pname'] && $_POST['nom'] && $_POST['sdate'] && $_POST['comments']))
{
		// 1- connect to the database
		include('dbconnect.php');  
		//2- get the data from the form and save it in array
		$data = [
			':cusid' => $_POST['cusid'],
			':staid' => $_POST['staffid'],
			':name' => $_POST['pname'],
			':nom' => $_POST['nom'],
			':sdate' => $_POST['sdate'],
			':comment' => $_POST['comments'],

		];
		// 3- write the insert query statement and save it in a vriable
		$tripid= $_POST['tripid'];
		$sql ="update detail set cusid= :cusid,staffid= :staid,pname= :name,nom= :nom,sdate= :sdate,comments= :comment where tripid='$tripid'";
		// 4- prepare the query for excution 
		
		$stmt = $conn ->prepare($sql);
		
		// 5- excute the the query with the data saved in the array
		
		$stmt->execute($data);
				
		echo "<br><br>Record has been updated successfully...<br><br>"; 
		require('detailview.php');
		
}
else
{
		if(empty($_POST['tripid'])){
		echo "<br>fill the trip id ...<br>";}
		if(empty($_POST['cusid'])){
		echo "fill the customer id ...<br>";}
		if(empty($_POST['staffid'])){
		echo "<br>fill the staff id ...<br>";}
		if(empty($_POST['pname'])){
		echo "<br>fill the place name ...<br>";}
		if(empty($_POST['nom'])){
		echo "<br>fill the number of members ...<br>";}
		if(empty($_POST['sdate'])){
		echo "<br>fill the trip start date ...<br>";}
		if(empty($_POST['comments'])){
		echo "<br>write your comments ...<br>";}
		require('detailview.php');

}
?>