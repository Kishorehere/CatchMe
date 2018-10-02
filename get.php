<?php 
	require('server.php');
	$userName = $_SESSION['userName'];
	$query_1= "SELECT * FROM info WHERE ruser ='$userName';";
	$result_1 =mysqli_query($conn, $query_1);
	$position= mysqli_fetch_assoc($result_1);
	mysqli_free_result($result_1);



	$lat = $position['lat'];
	$lon = $position['lon'];
	$sos = $position['sos'];


	$data = array("lat" => $lat, "lon" => $lon, "sos" => $sos);
	echo json_encode($data);

?>