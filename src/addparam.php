<?php
if(isset($_POST["pname"])&&isset($_POST["ptype"]))
{
	require("dbconnector.php");
	require("functions.php");
	if(!isset($_POST["pfactor"]))
	{
		$pfactor=1;
	}
	else
	{
		$pfactor=$_POST["pfactor"];
	}
	$pname=$_POST["pname"];
	$ptype=$_POST["ptype"];
	$pdesc=$_POST["pdesc"];
	$pid=randomstring();

		$query="INSERT INTO b_params_info (paramid,paramname,paramtype,paramfactor,paramdesc) VALUES ('$pid','$pname','$ptype','$pfactor','$pdesc')";
		if (!$db->query($query))
		{
			$errmsg=$db->error;
			$errno=$db->errno;
			die("OOPS! Error!".$errmsg.$errno);
		}
		else
		{
			echo "<script type='text/javascript'>alert(\"PARAMETER SUCCESSFULLY ADDED\");window.location.assign(\"http://localhost/bas\")</script>";
		}
}
?>

<html>
	<title>Building Automation Systems</title>
	<head>
		<link rel="stylesheet" href="style.css" />
		<script type="text/javascript" src="jquery.js" /></script>
		<script type="text/javascript" src="functions.js" /></script>
		<u><h1>Add a New Parameter</h1></u>
	</head>
	
	<body>
		<div class="encloser">
			
			<div class="lpanel">
				<form action="addparam.php" method="post" name="addparam" id="addparam">
				Parameter Name: <input type="text" name="pname" placeholder="Name of the Parameter"><br>
				Parameter Type: 
				<select name="ptype" onchange="paramfactor();" id="paramtype">
					<option value="1">Standard Quantity</option>
					<option value="2">Non-Standard Quantity</option>
				</select>
				<br>
				Parameter Description: <br>
				<textarea name="pdesc" rows="6" cols="50" placeholder="Please Enter a Description for this Parameter (Optional)"></textarea><br>
				<div id="paramfactor"></div>
				
				<br>
				<input type="submit" value="Add Parameter" class="btns">
				<br>
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