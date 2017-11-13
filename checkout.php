<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
  <title>BG Store - Checkout</title>
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
      /*position: absolute;*/
      left:0;
      right:0;
      bottom:0;
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

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href=
      <?php
      if(isset($_SESSION['admin']) && $_SESSION['admin']){
        echo "restock.php";}
      ?>
      >BG Store</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="main.php">Home</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><span><input type="text" style="height:30px;margin-top:5%;" class="form-control" placeholder="Search" ></span></li>
        <!-- <li><a href="#" style="height:20px; width:20px" ><button type="submit" style="height:20px; width:20px" class="btn btn-default">Go</button></a></li> -->
        <li><a><button class="glyphicon glyphicon-search" type="submit" name="submit"></button></a></li>
        <?php
          if($_SESSION['logstat']=="Log Out"){
            echo "<li><a href=\"account.php\"><span class=\"glyphicon glyphicon-user\"></span> Account</a></li>";
          }
        ?>
        <li><a href="login.php"><span class="glyphicon glyphicon-off"></span> <?php echo $_SESSION['logstat'];?></a></li>
        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span><?php echo $_SESSION['cart'] ?> Cart</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">

    </div>

    <div class="col-sm-8 text-center">
      <h1>Checkout</h1>
		<?php
		$fname="cart.txt";
		//read from file
		$text = file_get_contents($fname);
		$text = trim($text,"\n");
		$text = trim($text,"\r");

		$bg_arr = explode("\r\n",$text);

		$blank_arr = array();
		foreach($bg_arr as $bg_name){
			if (isset($blank_arr[$bg_name])){
				$blank_arr[$bg_name]++;}
			else{
				$blank_arr[$bg_name]=1;}
		}
		?>
      <table class="table tablecolor table-hover">
			<tr class="info">
				<th class="text-center">Name</th>
				<th class="text-center">Number</th>
				<th class="text-center"></th>
				<th class="text-center"></th>
				<th class="text-center"></th>

			</tr>
			<?php
				foreach ($blank_arr as $key => $value){
			?>
			<tr>
				<td><?php echo $key;?><!--Game name--></td>
				<td><?php echo $value; ?><!--Number--></td>
				<td><!--Game name--></td>
				<td><!--Game name--></td>
				<td><!--Game name--></td>
			</tr>
			<?php
				}
			?>
		</table>
		<form action="purchasecomplete.php" method="POST">
		<input type="textbox" size=27 name="accno" value="Please insert your address">
		<input type="submit" name="confirm" value="Confirm purchase">
		</form>
    </div>

  </div>
</div>
<!--
<footer class="container-fluid text-center">
  <p>BG Store</p>
</footer>
-->
</body>
</html>
