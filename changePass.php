<?php
  require('server.php');

?>
<?php if(isset($_SESSION['userName'])) : ?> 

<!DOCTYPE html>
<html>
<head>
  <title>Change Password</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

  <?php if($nomatch == 2) :?>
  
    <div style = "background-image:url('images/image23.jpg'); min-height:100%;position:relative;background-position:center;background-size:cover;background-repeat:no-repeat;background-attachment:fixed;height:100%;">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <a href="#" class="navbar-brand">User-Find</a>
        <button class = "navbar-toggler" data-toggle = "collapse" data-target="#menu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class ="collapse navbar-collapse" id = "menu">
          <ul class="navbar-nav ml-auto" >
            <li class="nav-item"><a href="signUp.php" class = "nav-link">Sign-Up</a></li> 
          </ul>
        </div>
    </nav>

    <div class = "container" style ="border: solid;border-color: red;border-radius: 20px; margin: auto;margin-top: 5%;margin-bottom: 5%; align-self: center;padding-top: 5%;padding-right: 0px;padding-left: 0px;padding-bottom: 5%;">
          <div class ="alert alert-danger alert-dismissable" role = "alert" style="padding:50px;margin:50px;">
           <!-- <button type="button" class = "close" data-dismiss="alert"><span>&times;</span></button>-->
        
            <h2 class="alert-heading">Password Changed !</h2>
            Login with your New password to continue
            <div class = "row" style="margin-top: 5%;">
              <div class = "col-md-6">
                <a href="signIn.php" class="alert-link">Login</a>
              </div>
            </div>
  
          </div>
    <?php endif; ?> 
        
    <?php if($nomatch == 0) :?>
<div style = "background-image:url('images/image23.jpg'); min-height:100%;position:relative;background-position:center;background-size:cover;background-repeat:no-repeat;background-attachment:fixed;height:100%;">  
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <a href="#" class="navbar-brand">User-Find</a>
        <button class = "navbar-toggler" data-toggle = "collapse" data-target="#menu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class ="collapse navbar-collapse" id = "menu">
            <ul class="navbar-nav ml-auto" >
            <li class="nav-item"><a href="send.php" class = "nav-link">Send</a></li>
            <li class="nav-item"><a href="receive.php" class = "nav-link">Receive</a></li>            
            <li class="nav-item"><a href="server.php?exit='1';" class = "nav-link">Logout</a></li>
            </ul>
        </div>
    </nav>
  
 <div class = "container" style ="padding-top: 10%;padding-right: 0px;padding-left: 0px;padding-bottom: 5%; margin: auto;margin-bottom: 5%; align-self: center;">
      <form method = "POST" style = "width: 60%; margin:auto;" action ="changePass.php">
        <div class = "form-group" style = "text-align: center;margin-bottom:10%;">
          <h2 style="color:#fff;">Change Password</h2>
        </div>
        
        <div class = "form-group">
          <label style="color:#fff;">Existing Password: </label>
          <input type="password" name = "password" class = "<?php echo $passClass;?>" placeholder="Current Password">
          <div class = "invalid-feedback"><?php echo $passComment; ?></div>
         
        </div>
        <div class = "form-group">
          <label style="color:#fff;">New Password: </label>
          <input type="password" name = "password_1" class = "<?php echo $pass1Class;?>" placeholder="New Password">
          <div class = "invalid-feedback"><?php echo $pass1Comment; ?></div>
         
        </div>
        <div class = "form-group">
          <label style="color:#fff;">Confirm new Password: </label>
          <input type="password" name = "password_2" class ="<?php echo $pass2Class;?>" placeholder="New Password">
          <div class = "invalid-feedback"><?php echo $pass2Comment; ?></div>
          
        </div>
        <div class="row">
          <div class = "col">
            <div style = "margin-left: 30%;margin-top: 30px;">
              <button type = "submit" class = "btn btn-light" style="width:200px;" name ="changePass" >Save Changes</button>
            </div>
          </div>
        </div>
       
        
      </form>
  
</div>
      <?php endif; ?> 
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
   
</body>
</html>
<?php endif; ?>