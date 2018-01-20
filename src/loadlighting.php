<?php
require("dbconnector.php");
require("functions.php");
$bid=$_GET["bid"];
$rid=$_GET["rid"];
echo '
	<p>
			  <label for="amount">Light Level:</label>
			  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
			</p>
	 <br>
	 <div id="slider-vertical" style="height:200px;margin-left:5px;"></div>
';
$query="SELECT * FROM b_building_rooms WHERE bid='$bid' AND rid='$rid'";
$res=dbquery($query);
$light=$res[0]["lightlevel"];
echo
'
<script type="text/javascript">
  $(function() {
    $( "#slider-vertical" ).slider({
      orientation: "vertical",
      range: "min",
      min: 0,
      max: 100,
      value:'.$light.',
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.value );
		light=$("#amount").val();
		$("#emplightcont").load("updatelight.php?light="+light+"&bid='.$bid.'&rid='.$rid.'");
      }
    });
	var light=$( "#slider-vertical" ).slider( "value" );
    $( "#amount" ).val(light);
  });
  </script>
';
echo "<div id='msgbar'>Please wait..</div>";
?>
