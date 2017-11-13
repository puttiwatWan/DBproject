<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
  <title>BG Store - Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: #E0E0E0;
      padding: 1.5%;
      left:0;
      right:0;
      bottom:0;
    }

    .form label{
      text-align: right;
      width:125px;
    }

    div#div_content{
    	background-color:white;
    	min-height: 400px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
	   body{
	      font-family: sans-serif;
     }
      .sidenav{
      	background-color:white;
      }
  </style>
</head>
<body>


<!-- ================================= navbar ================================== -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">BG Store</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="main.php">Home</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><span><input type="text" style="height:30px;margin-top:5%;" class="form-control" placeholder="Search" ></span></li>
        <li><a><button class="glyphicon glyphicon-search" type="submit" name="submit"></button></a></li>
        <li class="active"><a href="login.php"><span class="glyphicon glyphicon-off"></span>Log In</a></li>
        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- /////////////////////////////////////////////////////////////////////////// -->

<!-- ===================== Log in panel ============================= -->
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <!-- left space -->
    </div>
    <div class="col-sm-2 sidenav">
      <!-- left space -->
    </div>
	<br><br><br><br>


  <div class="col-sm-4 text-center center">
      <div class="panel panel-primary center-block">
        <div id="div_content" class="panel-body form">
      		<form action="checkregister.php" method="POST">
      		  <h2 style="height:13px;">Register Your Account</h2><br>
            <?php
              if(isset($_SESSION['pcunmatch']) && $_SESSION['pcunmatch'])
              {echo '<h5 style="height:2px;color:red;font-weight:bold;">Password Unmatched</h5>';}
            ?>
          <br>
          <label>Firstname</label> <input required type="textbox" name="fname"
            <?php
              if(isset($_SESSION['pcunmatch']) && $_SESSION['pcunmatch']==true)
              {echo ' value='.$_SESSION['f'];}
            ?>
          ><br><br>
          <label>Lastname</label> <input required type="textbox" name="lname"
            <?php
              if(isset($_SESSION['pcunmatch']) && $_SESSION['pcunmatch'])
              {echo ' value='.$_SESSION['l'];}
            ?>
          ><br><br>
          <label>Email</label> <input required type="email" name="email"
            <?php
              if(isset($_SESSION['pcunmatch']) && $_SESSION['pcunmatch'])
              {echo ' value='.$_SESSION['e'];}
            ?>
          ><br><br>
      		<label>Username</label> <input required type="textbox" name="username"
            <?php
              if(isset($_SESSION['pcunmatch']) && $_SESSION['pcunmatch'])
              {echo ' value='.$_SESSION['u'];}
            ?>
          ><br><br>
      		<label
            <?php
              if(isset($_SESSION['pcunmatch']) && $_SESSION['pcunmatch']){
                echo ' style="color:red;"';
              }
            ?>
          >Password</label> <input required type="password" name="password"
            <?php
              if(isset($_SESSION['pcunmatch']) && $_SESSION['pcunmatch'])
              {echo ' style="border-color:red;"';}
            ?>><br><br>
          <label
            <?php
              if(isset($_SESSION['pcunmatch']) && $_SESSION['pcunmatch']){
                echo ' style="color:red;"';
              }
            ?>
          >Confirm Password</label> <input required type="password" name="confirm"
            <?php
              if(isset($_SESSION['pcunmatch']) && $_SESSION['pcunmatch']){
                echo ' style="border-color:red;"';
                $_SESSION['pcunmatch']=false;
              }
            ?>><br><br>
      		<input type="submit" style="margin-right:20px;" name="submit" value="Register">
          <a href="<?=$_SESSION['lastpage']?>"><button type="button"><span style="color:black;">Cancel</span></button></a>
          <!-- <input type="submit" style="margin-right:20px;" name="submit" value="Cancel"> -->
      		</form>
		     </div>
         <div class="panel-footer"></div>
      </div>
  </div>
</div>
</div>
<!-- ///////////////////////////////////////////////////////////////// -->


</body>
</html>
