<?php 
	
	require('server.php');
	$userName = $_SESSION['userName'];

	$query_1= "SELECT * FROM users WHERE username ='$userName';";
	$result_1 =mysqli_query($conn, $query_1);
	$value = mysqli_fetch_assoc($result_1);
	mysqli_free_result($result_1);

	


	$query_2= "SELECT * FROM info WHERE ruser ='$userName';";
	$result_2=mysqli_query($conn, $query_2);
	$second = mysqli_fetch_assoc($result_2);
	
	

	if(mysqli_num_rows($result_2) == 0){
	
		$r = 0;
		
	}else{
		$r = 1;
		
		$reference = $second['username'];
		$query_3= "SELECT * FROM users WHERE username ='$reference';";
		$result_3=mysqli_query($conn, $query_3);
		$ref = mysqli_fetch_assoc($result_3);
		mysqli_free_result($result_3);

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Receive Location</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">


</head>
<body>
		<nav class="navbar navbar-expand-md navbar-dark bg-dark ">
		    <a href="#" class="navbar-brand">User-Find</a>
		    <a href="#" class="navbar-brand" style ="padding-left: 2%;"><small>Hello <?php echo $value['firstName']; ?> !</small></a>
		    <button class = "navbar-toggler" data-toggle = "collapse" data-target="#menu">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class ="collapse navbar-collapse" id = "menu">
		      	<ul class="navbar-nav ml-auto" >
		      <!-- 	<li class="nav-item"><a href="activity.php" class = "nav-link">Activity</a></li> -->
		      <li class="nav-item"><a href="send.php" class = "nav-link">Send</a></li>
		        <li class="nav-item"><a href="#" data-toggle="modal" data-target ="#demo" class = "nav-link">Profile</a></li>
		        <li class="nav-item"><a href="server.php?exit='1';" class = "nav-link">Logout</a></li>
		        </ul>
		    </div>
		</nav>
		

		<div class="modal fade" id = "demo">
	      <div class ="modal-dialog">
	        <div class = "modal-content">
	          
	          <div class = "modal-header">
	            <h2 class = "modal-title">Profile</h2>
	            <span type ='button' class = "close" data-dismiss = "modal">&times;</span>
	          </div>
	          <div class = "modal-body">
	          	
	          	<table class="table table-dark">
				  <tbody>
				    <tr >
				      <th scope="row">Name: </th>
				      <td ><?php echo $value['name']; ?></td>
				      
				    </tr>
				    <tr class="bg-primary">
				      <th scope="row">E-mail: </th>
				      <td><?php echo $value['email']; ?></td>
				     
				    </tr>
				    <tr class="bg-danger">
				      <th scope="row">Username: </th>
				      <td><?php echo $userName; ?></td>
				      
				    </tr>
				  </tbody>
				</table>
	          </div>
	          <div class = "row" style ="padding-top: 0;padding-bottom: 1.5rem;padding-left: 1rem;">
		        <div class = "col-md-6 col-sm-6 col-xs-6">
		           <a href="editProfile.php"><button type = "button" class = "btn btn-success" >Edit Profile</button></a>
		        </div>
		        <div class = "col-md-6 col-sm-6 col-xs-6">
	            	 <a href="changePass.php"><button type = "button" class = "btn btn-success" >Change Password</button></a>
	          	</div>
	          </div>

	        </div>
	      </div>
	    </div>


	   
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
		 

<div style = "background-image:url('images/image5.jpeg'); min-height:100%;position:relative;opacity:1;background-position:center;background-size:cover;background-repeat:no-repeat;background-attachment:fixed;">

<?php if($r == 0): ?>

	<div class = "container" style="padding-top:5%;">
	
	<div class="row">
		<div class="col-sm-6">
			<h1 id="demo" style="color:#fff;padding-top:3%;padding-left:3%;">No Track request Found</h1>
		</div>
		
	</div>
<?php endif ; ?>
<?php if ($r == 1) : ?>
<div class = "container" style="padding-top:5%;">

	<div id ="content"></div>
	
	<div class="row" >
		<div class="col-sm-6">
			<h1 id="demo" style="color:#fff;padding-top:3%;padding-left:3%;">Receive Location</h1>
		</div>
		<div class="col-sm-6">
			<button class="btn btn-outline-light" style = "margin:10px;width:20%;margin-top:4%;" onclick="getSearchLocation()">Track</button>
		</div>
	</div>
	

	<div id="mapholder" style ="padding-top: 5%;padding-right: 0px;padding-left: 0px;padding-bottom: 5%;border-radius: 10px;border-width: 5px; margin: auto;margin-top: 5%;margin-bottom: 5%; align-self: center; height :500px;"></div>


	
	<div class="container" id = "box">
		<div class="card">
		  <div id="body" class="card-header"></div>
		  <div id = "cont" class="card-body"></div>
		</div>
	</div>
	

</div>
<?php endif; ?>
</div>




<script src="https://maps.google.com/maps/api/js?key=AIzaSyDSZgBUR2iVElAJ7uYHwHkb_BVPQODdmUk"></script>


<script>
    var x = document.getElementById("demo");
    var map;
    var infowindow;
    


    function getSearchLocation() {
        if (navigator.geolocation) {
        	var watchId = navigator.geolocation.getCurrentPosition(showSearchPosition, showError);
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }
       
    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                x.innerHTML = "User denied the request for Geolocation."
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML = "Location information is unavailable."
                break;
            case error.TIMEOUT:
                x.innerHTML = "The request to get user location timed out."
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML = "An unknown error occurred."
                break;
        }
    }
 	

 	var data;
 	var lat1;
 	var lon1;

 	function receive(){

 	

 	var form = new XMLHttpRequest();
	  form.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      // document.getElementById("res").innerHTML = this.responseText;
	      var data = JSON.parse(this.responseText);
	      // var data = this.responseText;
	      console.log(data);
	      var sos = data.sos;
	      if(sos == 1){
	
		      	var con =document.getElementById("content");
		       	con.innerHTML = ' <div class ="alert alert-danger alert-dismissable" role = "alert"><button type="button" class = "close" data-dismiss="alert"><span>&times;</span></button><h2 class="alert-heading">Alert!</h2>The user is in Danger!</div>';
		       


		       }
		   else{
		       	var con =document.getElementById("content");
		       	con.innerHTML = "";
		       }
	       var lat1 = data.lat;
	  		var lon1 = data.lon;
	  		var latlon1 = new google.maps.LatLng(lat1, lon1);
	  		var marker1 = new google.maps.Marker({position:latlon1,label:'B',map:map,title:"User is Here!"});
          	 google.maps.event.addListener(marker1, 'click', function() {
             

	               infowindow.setContent('<h4><u>User:</u></h4><h6><?php echo $reference;?></h6><br><br><button class="btn btn-primary" id = "rest1">View Details</button>');
	               infowindow.open(map, this);
	               
	              
	               $('#rest1').on('click',function(){
						const box=$('#box').position().top;

						$('html,body').animate({
							scrollTop:box
						},
						900
						);
					});


	               document.getElementById("rest1").addEventListener('click', function reserve1(){
	               			
	            			body.innerHTML ="<h5 style='color:#000;'>Information</h5>"
	                         cont.innerHTML = '<h5 style="color:#000;" class="card-title">Username: <?php echo $reference; ?></h5><hr>'
	                         cont.innerHTML +='<p style="color:#000;" class="card-text">Name: <?php echo $ref["name"]; ?></p>'
	                         cont.innerHTML += '<h6 style="color:#000;" class="card-text">E-mail: <?php echo $ref['email']; ?></h6><br><br>'
	                     });
		    });
		}
	  };

	  form.open("GET", "get.php", true);
	  form.send();


	 
	  

	}

	  setInterval(receive,10000);

    function showSearchPosition(position) {
        
        var service;    
        var lat = position.coords.latitude;
        var lon = position.coords.longitude;

        console.log("lat:"+lat);
        console.log("lng:"+lon);

        var latlon = new google.maps.LatLng(lat, lon)
        var mapholder = document.getElementById('mapholder')
        mapholder.style.height = '500px';
        mapholder.style.width = '100%';

        infowindow = new google.maps.InfoWindow();
        map = new google.maps.Map(document.getElementById('mapholder'), {
          center: latlon,
          zoom: 16
        });

      

          var marker = new google.maps.Marker({position:latlon,map:map,label:'A',animation: google.maps.Animation.DROP,title:"You are here!"});
           google.maps.event.addListener(marker, 'click', function() {
             

               infowindow.setContent('<h4><u>User:</u></h4><h6><?php echo $userName;?></h6><br><br><button class="btn btn-primary" id = "rest">View Details</button>');
               infowindow.open(map, this);
               
               var res = "rest";
               $('#'+res).on('click',function(){
					const box=$('#box').position().top;

					$('html,body').animate({
						scrollTop:box
					},
					900
					);
				});


               document.getElementById("rest").addEventListener('click', function reserve(){
               			
            
                         body.innerHTML ="<h5 style='color:#000;'>Information</h5>"
                         cont.innerHTML = '<h5 style="color:#000;" class="card-title">Username: <?php echo $value['username']; ?></h5><hr>'
                         cont.innerHTML +='<p style="color:#000;" class="card-text">Name: <?php echo $value['name']; ?></p>'
                         cont.innerHTML += '<h6 style="color:#000;" class="card-text">E-mail: <?php echo $value['email']; ?></h6><br><br>'
                     });
           });


    
    }


 


     
   

</script>
	

  	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>