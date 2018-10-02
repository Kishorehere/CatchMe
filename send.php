<?php 
	
	$w=0;
	$f = 0;
	require('server.php');
	$userName = $_SESSION['userName'];
	$query_1= "SELECT * FROM users WHERE username ='$userName';";
	$result_1 =mysqli_query($conn, $query_1);
	$value = mysqli_fetch_assoc($result_1);
	mysqli_free_result($result_1);

	if(isset($_GET['sos'])){
		if($_GET['sos']==1){
			$query_2= "UPDATE info SET sos = '1' WHERE username='$userName';";
			$result_2 = mysqli_query($conn, $query_2);
			$f=1;
		}
		else{
			$query_2= "UPDATE info SET sos = '0' WHERE username='$userName';";
			$result_2 = mysqli_query($conn, $query_2);
			$f=1;
		}
	}

	// if(isset($_POST['check'])){
	// 	// echo $_POST['ruser'];
	// 	$f = 1;
	// }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Send Location</title>
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
		      	<li class="nav-item"><a href="receive.php" class = "nav-link">Receive</a></li>
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
		 

 <div style = "background-image:url('images/image22.jpg'); min-height:100%;position:relative;opacity:1;background-position:center;background-size:cover;background-repeat:no-repeat;background-attachment:fixed;">
 
<?php if($f == 0) : ?>

	<div class = "container" >	
	  <div style="margin-bottom: 2%;padding-top:5%;">
	      <h1 style ="color:black;">Enter the username to share location with :</h1> 
	  </div>

     
	  	  
		     <form method = "POST" action = "send.php" class="card-text" style="margin-bottom: 5%;" >   
				   <div class = "row">
			          <div class = "col-md-6">
			            <div class = "form-group">
			              <label style="color:#000;">Username : </label>
			              <input type="text" name ="ruser" class ="<?php echo $ruserClass;?>" placeholder="username" >
			              <div class = "invalid-feedback"><?php echo $ruserComment;?></div>
			    
			            </div>
			          </div>
			          <div class = "col-md-6">
			            <div class = "form-group">			              
			              <button  style="width:100px;margin-top:7%;" type = "submit" class = "btn btn-primary" name ="check">Okay</button>
			            </div>
			          </div>
			        </div>
				       
				   </div> 	
	    
			 </form>
		  </div>
		</div>
		
<?php endif ; ?>

<?php if($f == 1): ?>
<?php 
	$query_4= "SELECT * FROM info WHERE username ='$userName';";
	$result_4 =mysqli_query($conn, $query_4);
	$information = mysqli_fetch_assoc($result_4);
	mysqli_free_result($result_4);

	$ruser = $information['ruser'];

?>

<div class = "container" style="padding-top:5%;">
	
	<div class="row">
		<div class="col-sm-6">
			<h1 id="demo" style="color:#000;padding-top:3%;padding-left:3%;">Send My Location</h1>
		</div>
		<div class="col-sm-6">
			<button class="btn btn-outline-dark" style = "margin:10px;width:20%;margin-top:4%;" onclick="getSearchLocation()">Send</button>
			<a class="btn btn-outline-danger" style = "margin:10px;width:20%;margin-top:4%;margin-left:3%;" href="send.php?sos=1">SOS</a>
			<a class="btn btn-outline-success" style = "margin:10px;width:20%;margin-top:4%;margin-left:3%;" href="send.php?sos=0">SAFE</a>
		</div>
	</div>
	

	<div id="mapholder" style ="padding-top: 5%;padding-right: 0px;padding-left: 0px;padding-bottom: 5%;border-radius: 10px;border-width: 5px; margin: auto;margin-top: 5%;margin-bottom: 5%; align-self: center; height :500px;"></div>


	
	<div class="container" id = "box">
		<div class="card">
		  <div id="body" class="card-header"></div>
		  <div id = "content" class="card-body"></div>
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
        	var watchId = navigator.geolocation.watchPosition(showSearchPosition, showError);
            // navigator.geolocation.getCurrentPosition(showSearchPosition, showError);
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
 

    function showSearchPosition(position) {
        
        var service;
        var s ="";
        
        var lat = position.coords.latitude;
        var lon = position.coords.longitude;



        //Ajax call for writing in Database


	
	function sendl(){


		console.log("Entered function");

		
		        	var form = new XMLHttpRequest();
						 				  form.onreadystatechange = function() {
						 				    if (this.readyState == 4 && this.status == 200) {
						 				      // document.getElementById("res").innerHTML = this.responseText;
						 				      // var s = this.responseText;
						 				      console.log("success");
						 				    }
						 				  };
						 				  form.open("GET", "map1.php?lat="+lat+"&lon="+lon+"&ruser=<?php echo $ruser; ?>", true);
						 				  form.send();
						 				
						 				
		
	}
	setInterval(sendl,10000);
		console.log(s);

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

      

          var marker = new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
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
               			
            
                         body.innerHTML ="<h5 style='color:#000;'>Info</h5>"
                         content.innerHTML = '<h5 style="color:#000;" class="card-title">Username: <?php echo $value['username']; ?></h5><hr>'
                         content.innerHTML +='<p style="color:#000;" class="card-text">Name: <?php echo $value['name']; ?></p>'
                         content.innerHTML += '<h6 style="color:#000;" class="card-text">E-mail: <?php echo $value['email']; ?></h6><br><br>'
                     });

               });
    


 

           
                
            }
                     
                
    //                     document.getElementById(place.name).addEventListener('click',function comments(){
                        

		  //               	var form = new XMLHttpRequest();
				// 				  form.onreadystatechange = function() {
				// 				    if (this.readyState == 4 && this.status == 200) {
				// 				      document.getElementById("res").innerHTML = this.responseText;
				// 				      console.log("success");
				// 				    }
				// 				  };
				// 				  form.open("GET", "comments.php?resname="+place.name, true);
				// 				  form.send();
						
				

				// 		});

                       
						
						                       
				// });




         // });

     
   

</script>
	

  	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
