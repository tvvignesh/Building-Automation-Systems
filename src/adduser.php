<?php
if(isset($_POST["ufname"])&&isset($_POST["ulname"])&&isset($_POST["udob"])&&isset($_POST["ugender"])&&isset($_POST["uemail"])&&isset($_POST["uaddress"]))
{
require("dbconnector.php");
require("functions.php");
$fname=$_POST["ufname"];
$mname=$_POST["umname"];
$lname=$_POST["ulname"];
$dob=$_POST["udob"];
$gender=$_POST["ugender"];
$email=$_POST["uemail"];
$address=$_POST["uaddress"];
$uid=randomstring();

	$query="INSERT INTO b_user_info (ufname,umname,ulname,udob,ugender,uemail,uaddress,uid) VALUES ('$fname','$mname','$lname','$dob','$gender','$email','$address','$uid')";
	if (!$db->query($query))
	{
		$errmsg=$db->error;
		$errno=$db->errno;
		die("OOPS! Error!".$errmsg.$errno);
	}
	else
	{
		echo "<script type='text/javascript'>alert(\"USER SUCCESSFULLY ADDED\");window.location.assign(\"http://localhost/bas\")</script>";
	}
}
?>

<html>
	<title>Building Automation Systems</title>
	<head>
		<link rel="stylesheet" href="style.css" />
		<u><h1>Add a New User</h1></u>
	</head>
	
	<body>
		<div class="encloser">
			
			<div class="lpanel">
				<form action="adduser.php" method="post" name="adduser" id="adduser">
				First Name: <input type="text" name="ufname" placeholder="Your First Name" required="required"><br>
				Middle Name: <input type="text" name="umname" placeholder="Your Middle Name"><br>
				Last Name: <input type="text" name="ulname" placeholder="Your Last Name" required="required"><br><br>
				Date of Birth: <input type="date" name="udob" placeholder="Your Date of Birth" required="required"><br><br>
				Gender: <input type="radio" name="ugender" required="required" value="m"> Male <input type="radio" name="ugender" required="required" value="f"> Female
				<br>
				Email Address: <input type="text" name="uemail" placeholder="Your Email Address" required="required"><br>
				Address: <br>
				<textarea name="uaddress" rows="6" cols="50" placeholder="Please Enter Your Address (Optional as of now but may be required later for security reasons)"></textarea><br>
				<input type="submit" value="Add User" class="btns">
				
				</form>
			</div>
			
			<div class="rpanel">
				BAS MAP
			</div>
			
			<div class="eline">
			</div>
		</div>
	</body>
</html>