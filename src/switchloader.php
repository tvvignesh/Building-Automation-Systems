<?php
require("dbconnector.php");
require("functions.php");
$bid=$_GET["bid"];
$did=$_GET["did"];
$rid=$_GET["rid"];
	$query="SELECT * FROM b_device_info WHERE did='$did'";
	$res=dbquery($query);
	$len=count($res);
	for($i=0;$i<$len;$i++)
	{
		$row=$res[$i];
		$status=$row["dsstatus"];
	}
echo '</select>';
if($status=="1")
{
	echo '<br><br>Status: <input type="checkbox" name="switch" value="switch" checked><br>';
}
else
{
	echo '<br><br>Status: <input type="checkbox" name="switch" value="switch"><br>';
}

echo '<script type="text/javascript">
		 $(document).ready(function() {
			$(":checkbox").iphoneStyle({
			  checkedLabel: "ON",
			  uncheckedLabel: "OFF"
			});
		 });
		</script>
';
?>
