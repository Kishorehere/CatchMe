<?php 

  require('server.php');
  $userName = $_SESSION['userName'];
  $ruser = $_GET['$ruser'];

  if(isset($_GET['lat']) && isset($_GET['lon']) ){
		  $query_1= "SELECT * FROM info WHERE username ='$userName';";
			$result_1 =mysqli_query($conn, $query_1);

			if(mysqli_num_rows($result_1) == 1){
				$lat = $_GET['lat'];
				$lon = $_GET['lon'];
				$query_2= "UPDATE info SET lat = '$lat', lon = '$lon' WHERE username='$userName';";
				$result_2 = mysqli_query($conn, $query_2);
				mysqli_free_result($result_2);
				
			}else{
				$lat = $_GET['lat'];
				$lon = $_GET['lon'];
				$query_3 = "INSERT INTO info(username,ruser,lat,lon) VALUES ('$userName','$ruser','$lat','$lon');";
				$result_3 = mysqli_query($conn, $query_3);
				
			}
		 
  
	}
	// $s = 1;
	// echo $s;
  



	

?>