<?php session_start();
$_SESSION['lastpage']="cart.php";
$_SESSION['currentpage']='cart';
require_once("navbar.php");
 ?>


 <?php
     $fname="cart.txt";

     //write to file
     $fp = fopen($fname, 'a');

     if(isset($_POST['name'])&& strlen($_POST['name'])>0){
     fwrite($fp,$_POST['name']."\r\n");
     }

     if(isset($_POST['add'])&& strlen($_POST['add'])>0){
     fwrite($fp,$_POST['add']."\r\n");
     }

     fclose($fp);

     //read from file
     $text = file_get_contents($fname);
     $text = trim($text,"\n");
     $text = trim($text,"\r");

     $bg_arr = explode("\r\n",$text);
     $_SESSION['cart'] = 0;
     $blank_arr = array();
     foreach($bg_arr as $bg_name){
      if (isset($blank_arr[$bg_name])){
         $blank_arr[$bg_name]++;}
      else{
         $blank_arr[$bg_name]=1;}
      if(strlen($bg_arr[0])>0)
          $_SESSION['cart']+=1;
     }
     if(isset($_POST['clear'])){
       $_SESSION['cart']=0;
     }

 ?>

 <?php
   if(isset($_POST['checkcart'])){
     header("Location:product.php#".$_POST['checkcart']);
   }
 ?>



<?php
  // if($_SESSION['logstat']=="Log In"){
  //   $_SESSION['logcart'] = true;
  //   header("Location: login.php");
  // }
  //
  // if($_SESSION['checkcartfromlogin'] == '1'){
  //   $_SESSION['checkcartfromlogin'] = '0';
  //   header("Location: main.php");
  // }

?>

<html lang="en">
<head>
  <title>BG Store - Cart</title>
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



  <!-- =============================== navbar ======================================= -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <?php show_navbar(); ?>
  </nav>
    <!-- /////////////////////////////////////////////////////////////////////////// -->

<div class="container-fluid text-center">
  <div class="row content">
    <!-- <div class="col-sm-2 sidenav">

    </div> -->
      <h1 ><br>Your cart</h1>
      <div>
		      <div id="content">
		          <?php
		if(isset($_POST['clear'])||(filesize('cart.txt') == 0)){
			$fname="cart.txt";

			//write to file
			$fp = fopen($fname, 'w');

			fclose($fp);
		?>
		<p>You don't have anything in your cart.</p>
		<a href="product.php">Go shopping!</a>
		<?php
		}
		else{
		?>
		<form action="cart.php" method="POST">
<!--		<table id="movietable" border="1">	-->
			<table class="table tablecolor table-hover" style="width:60%;margin-left:20%;">
			<tr>
				<th class="text-left">Name</th>
				<th class="text-center">Quantity</th>

			</tr>
			<?php
				foreach ($blank_arr as $key => $value){
			?>
			<tr>
				<td style="width:80%;"><?php echo $key;?><!--Movie name--></td>
				<td class="text-center" style="width:20%;">
          <button class="btn-default" type="submit" name="add2" value="<?php echo $key;?>"> - <!--Movie Name --></button>
          <?php echo $value; ?>
          <button class="btn-default" type="submit" name="add" value="<?php echo $key;?>">+<!--Movie Name --></button><!--Score--></td>

			</tr>

			<?php
				}
			?>
		</table>

		<input class="btn-default" type="submit" name="clear" value="Clear the cart">
		</form>
		<hr>
		<form action="checkout.php" method="POST">
		<input class="btn-default" type="submit" name="checkout" value="Proceed to checkout">
		</form>
		<?php
		}
		?>

	</div>
    </div>

  </div>
</div>

<!-- <footer class="container-fluid text-center">
  <p>BG Store</p>
</footer> -->

</body>
</html>
