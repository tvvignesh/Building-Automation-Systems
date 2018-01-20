<?php
require("dbconnector.php");
require("functions.php");
$bid=$_GET["bid"];
$temp=$_GET["temp"];
	$query="UPDATE b_building_info SET btemperature='$temp' WHERE bid='$bid'";
	dbupdate($query);
?>