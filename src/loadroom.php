<?php
require("dbconnector.php");
require("functions.php");
$bid=$_GET["bid"];
echo 'Select the Room in which the Device belongs:  <select name="rid">';
	$query="SELECT * FROM b_building_rooms WHERE bid='$bid'";
	$res=dbquery($query);
	$len=count($res);
	for($i=0;$i<$len;$i++)
	{
		$row=$res[$i];
		$rid1=$row["rid"];
		$rname1=$row["rname"];
		echo '<option value="'.$rid1.'">'.$rname1.'</option>';
	}
echo '</select>';
?>