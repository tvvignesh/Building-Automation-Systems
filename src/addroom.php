<?php
if(isset($_POST["rname"])&&isset($_POST["rfloor"])&&isset($_POST["bid"]))
{
require("dbconnector.php");
require("functions.php");
$rname=$_POST["rname"];
$rfloor=$_POST["rfloor"];
$bid=$_POST["bid"];
$rdesc=$_POST["rdesc"];
$rid=randomstring();

	$query="INSERT INTO b_building_rooms (bid,rid,floorno,rname,rdesc) VALUES ('$bid','$rid','$rfloor','$rname','$rdesc')";
	if (!$db->query($query))
	{
		$errmsg=$db->error;
		$errno=$db->errno;
		die("OOPS! Error!".$errmsg.$errno);
	}
	else
	{
		echo "<script type='text/javascript'>alert(\"ROOM SUCCESSFULLY ADDED\");window.location.assign(\"http://localhost/bas\")</script>";
	}
}
?>

<html>
	<title>Building Automation Systems</title>
	<head>
		<link rel="stylesheet" href="style.css" />
		<u><h1>Add a New Room</h1></u>
	</head>
	
	<body>
		<div class="encloser">
			
			<div class="lpanel">
				<form action="addroom.php" method="post" name="addroom" id="addroom">
				Room Name: <input type="text" name="rname" placeholder="Name of the Room"><br>
				Floor No: <input type="text" name="rfloor" placeholder="Floor Number" required="required"><br>
				Room Description: <br>
				<textarea name="rdesc" rows="6" cols="50" placeholder="Please Enter a Description for this room (Optional)"></textarea><br>
				Select the Building to which the Room Belongs: 
				<select name="bid">
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
					print_r($res);
					
				?>
				</select>
				<br>
				<input type="submit" value="Add Room" class="btns">
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