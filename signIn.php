<?php
    require('server.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>User Registeration</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
  
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <a href="#" class="navbar-brand">User-Find</a>
        <button class = "navbar-toggler" data-toggle = "collapse" data-target="#menu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class ="collapse navbar-collapse" id = "menu">
          <ul class="navbar-nav ml-auto" >
            <li class="nav-item"><a href="signUp.php" class = "nav-link">Sign-Up</a></li>
          <!--   <li class="nav-item"><a href="signUp.php" class = "nav-link">Sign-Up</a></li>  -->
          </ul>
        </div>
    </nav>

<div style = "background-image:url('images/image9.jpeg'); min-height:100%;position:relative;background-position:center;background-size:cover;background-repeat:no-repeat;background-attachment:fixed;height:100%;">

<div class = "container" style="padding-top:13%;height:758px;">

        <?php if($nomatch == 1) :?>
          <div class ="alert alert-danger alert-dismissable" role = "alert" style="padding:50px;margin:50px;">
           <!-- <button type="button" class = "close" data-dismiss="alert"><span>&times;</span></button>-->
        
            <h2 class="alert-heading">Wrong Credentials !</h2>
            Wrong Username & Password combination
            <div class = "row" style="margin-top: 5%;">
              <div class = "col-md-6">
                <a href="signIn.php" class="alert-link">Try Again</a>
              </div>
              <div class = "col-md-6">
                <a href="signUp.php">Create an account</a>
              </div>
            </div>
  
          </div>
        <?php endif; ?> 
        
        <?php if($nomatch == 0) :?>
        
         

        <form method = "POST" style = "width: 60%; margin:auto;" action= "signIn.php" >
          <div class = "form-group" style = "color: #338BFF;text-align: center;margin-bottom:10%;">
            <h1 style = "color:#000;padding:3%;"><strong>Sign In to Resto-Find</strong></h1>
          </div>
     
        <div class = "form-group">
          <label style = "color:#fff;">Username : </label>
          <input type="text" name = "userName" value="<?php echo isset($_POST['userName']) ? $userName : "" ; ?>" class ="<?php echo $userClass;?>" placeholder="User Name">
          <div  class = "invalid-feedback"><?php echo $userComment; ?></div>
          <div class = "valid-feedback">Looks Good!</div>
          
        </div>
        <div class = "form-group">
          <label style = "color:#fff;" >Password: </label>
          <input type="password" name = "password" class = "<?php echo $pass1Class;?>" placeholder="Password">
          <div class = "invalid-feedback"><?php echo $pass1Comment; ?></div>
         
        </div>
          
          <div class="row">
            <div class = "col">
              <div style = "margin-left: 34%;margin-top: 30px;">
                <button type = "submit" class = "btn btn-light" style="width:200px;" name ="signIn" data-toggle="modal" data-target ="#demo">Sign In</button>
              </div>
            </div>
          </div>
          <p style = "margin-top: 10px;">
            <a href="signUp.php"style = "color:#fff;" >New to User-Find ?</a>
          </p>
          
        </form>
         <?php endif; ?> 

         </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>
</html>