<?php
if(isset($_POST["dname"])&&isset($_POST["ddesc"])&&isset($_POST["bid"])&&isset($_POST["rid"]))
{
require("dbconnector.php");
require("functions.php");
$dname=$_POST["dname"];
$ddesc=$_POST["ddesc"];
$did=randomstring();
$bid=$_POST["bid"];
$rid=$_POST["rid"];

	$query="INSERT INTO b_device_info (did,dname,ddesc) VALUES ('$did','$dname','$ddesc')";
	$query1="INSERT INTO b_device_room (did,bid,rid) VALUES ('$did','$bid','$rid')";
	if ((!$db->query($query))||(!$db->query($query1)))
	{
		$errmsg=$db->error;
		$errno=$db->errno;
		die("OOPS! Error!".$errmsg.$errno);
	}
	else
	{
		echo "<script type='text/javascript'>alert(\"DEVICE SUCCESSFULLY ADDED\");window.location.assign(\"http://localhost/bas\")</script>";
	}
}
?>

<html>
	<title>Building Automation Systems</title>
	<head>
		<link rel="stylesheet" href="style.css" />
		<script type="text/javascript" src="jquery.js" /></script>
		<script type="text/javascript" src="functions.js" /></script>
		<u><h1>Add a New Device</h1></u>
	</head>
	
	<body>
		<div class="encloser">
			
			<div class="lpanel">
				<form action="adddevice.php" method="post" name="adddevice" id="adddevice">
				Device Name: <input type="text" name="dname" placeholder="The Device Name" required="required"><br>
				Device Description: <br>
				<textarea name="ddesc" rows="6" cols="50" placeholder="Please Enter a description of your Device(Optional)"></textarea><br>
				Select the Building to which you want to add the Device: 
				<select name="bid" onchange="loadrooms1();" id="buildingid">
				<?php
				require("dbconnector.php");
				require("functions.php");
					$query="SELECT * FROM b_building_info";
					$res=dbquery($query);
					$len=count($res);
					for($i=0;$i<$len;$i++)
					{
						$row=$res[$i];
						$bid1=$row["bid"];
						$bname1=$row["bname"];
						echo '<option value="'.$bid1.'">'.$bname1.'</option>';
					}
					
				?>
				</select>
				
				<br><br>
				Select the Room in the Building to which you want to add the Device: 
				<div id="roomloader"></div>
				
				
				<input type="submit" value="Add Device" class="btns">
				
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