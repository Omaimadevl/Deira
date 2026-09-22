<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trip Details</title>
<style>
textarea:required:invalid,input:required:invalid{background-color:#F0F8FF}
form{background-color:#40E0D0;margin:10px;padding:10px}
fieldset{background-color:#40E0D0}
input[type=submit]{background-color:green; color:white}
input[type=reset]{background-color:red;color:white}
</style>
</head>
<body>
<h1 style=" font-style: italic; color:#40E0D0;">Trip Details</h1>
<form action="detailinsert.php" method="POST">
<p>
<i>please complete the form:</i><em>*</em>
</p>
<form>

<fieldset>
<legend>Trip Information</legend>
<label for="trip id">Trip ID:<em>*Like: 12*</em></label>
<input  type="number" placeholder="trip id" name="tripid" autofocus required><br>
<br>
<label for="customer id">Customer ID:<em>*Like: cus123*</em></label>
<input type="text" placeholder="customer id" name="cusid" autofocus required><br>
<br>
<label for="staff id">Staff ID:<em>*Like: staff123*</em></label>
<input  type="text" placeholder="staff id" name="staffid" autofocus required><br>
<br>
<label for="name">Name of place :<em>*</em></label>
<input  placeholder="name of place" name="pname" autofocus required><br>
<br>
<label for="num">Number of Members:<em>*</em></label>
<input  type="number" min="0" max="120" name="nom" required><br>
<br>
<div>
<label for="date">Trip Start Date: </label>
<input  type="date" name="sdate">
</div>
<br>
<label for="comments"> More details<em>*</em></label><br>
<textarea  oninput="validateComments(this)" name="comments" required rows="10" cols="30" >
</textarea>
</fieldset>
<br><br>

<p>
<input type="submit" name="submit" value="Submit Details">
<input type="reset" name="reset" value="Reset">
</p>
</form>


</body>
</html>