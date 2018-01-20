<?php
if(isset($_POST["bname"])&&isset($_POST["bfloors"])&&isset($_POST["bpucost"]))
{
require("dbconnector.php");
require("functions.php");
$bname=$_POST["bname"];
$bfloors=$_POST["bfloors"];
$bpucost=$_POST["bpucost"];
$baddress=$_POST["baddress"];
$bid=randomstring();
	$query="INSERT INTO b_building_info (bname,baddress,bstatus,bfloors,bpucost,bid) VALUES ('$bname','$baddress','1','$bfloors','$bpucost','$bid')";
	if (!$db->query($query))
	{
		$errmsg=$db->error;
		$errno=$db->errno;
		die("OOPS! Error!".$errmsg.$errno);
	}
	else
	{
		echo "<script type='text/javascript'>alert(\"BUILDING SUCCESSFULLY ADDED\");window.location.assign(\"http://localhost/bas\")</script>";
	}
}
?>

<html>
	<title>Building Automation Systems</title>
	<head>
		<link rel="stylesheet" href="style.css" />
		<u><h1>Add a New Building</h1></u>
	</head>
	
	<body>
		<div class="encloser">
			
			<div class="lpanel">
				<form action="addbuilding.php" method="post" name="addbuilding" id="addbuilding">
				Building Name: <input type="text" name="bname" placeholder="Enter a Name for the Building" required="required"><br>
				Building Address:<br>
				<textarea name="baddress" rows="6" cols="50" placeholder="Please Enter Your Address (Optional as of now but may be required later for security reasons)"></textarea><br>
				Number of floors in your building: <input type="text" name="bfloors" placeholder="Enter the number of floors" required="required"><br>
				Per Unit Cost: <input type="text" name="bpucost" placeholder="Enter the Per Unit Cost" required="required"><br>
				<input type="submit" value="Add Building" class="btns">
				
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