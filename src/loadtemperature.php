<?php
require("dbconnector.php");
require("functions.php");
$bid=$_GET["bid"];
echo '
	<p>
			  <label for="amount">Temperature:</label>
			  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
			</p>
	 <br>
	 <div id="slider-vertical" style="height:200px;margin-left:5px;"></div>
';
$query="SELECT * FROM b_building_info WHERE bid='$bid'";
$res=dbquery($query);
$temp=$res[0]["btemperature"];
echo
'
<script type="text/javascript">
  $(function() {
    $( "#slider-vertical" ).slider({
      orientation: "vertical",
      range: "min",
      min: 0,
      max: 100,
      value:'.$temp.',
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.value );
		//temperature=$( "#slider-vertical" ).slider( "value" );
		temperature=$("#amount").val();
		$("#emptempcont").load("updatetemperature.php?temp="+temperature+"&bid='.$bid.'");
      }
    });
	var temperature=$( "#slider-vertical" ).slider( "value" );
    $( "#amount" ).val(temperature);
  });
  </script>
';
?>