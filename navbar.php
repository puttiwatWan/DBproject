<?php
if(!isset($_SESSION['currentpage']))
  session_start();
function show_navbar(){
?>
  <div class="container-fluid">
    <!-- <div class="navbar-header "> -->
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
    <!-- </div> -->
    <div class="collapse navbar-collapse " id="myNavbar">
      <ul class="nav navbar-nav">
        <li <?php  if($_SESSION['currentpage']=='main') {echo "class='active'";} ?>
          ><a href="main.php">Home</a></li>
        <li <?php if($_SESSION['currentpage']=='product') {echo "class='active'";} ?>
          ><a href="product.php">Products</a></li>
        <li <?php if($_SESSION['currentpage']=='contact') {echo "class='active'";} ?>
          ><a href="contact.php">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><span><input type="text" style="height:30px;margin-top:5%;" class="form-control" placeholder="Search" ></span></li>
        <!-- <li><a href="#" style="height:30px;margin-top:5%;; width:20px" ><button type="submit" style="height:30px;margin-top:5%;; width:20px" class="btn btn-default">Go</button></a></li> -->
        <li><a><button class="glyphicon glyphicon-search" type="submit" name="submit"></button></a></li>
        <?php
          if($_SESSION['logstat']=="Log Out"){
            echo "<li><a href=\"account.php\"><span class=\"glyphicon glyphicon-user\"></span>".$_SESSION['username']."</a></li>";
          }
        ?>
        <li <?php if($_SESSION['currentpage']=='login') {echo "class='active'";} ?>
          ><a href="login.php"><span class="glyphicon glyphicon-off"></span> <?php echo $_SESSION['logstat'];?></a></li>
        <li <?php if($_SESSION['currentpage']=='cart') {echo "class='active'";} ?>
          ><a href="cart.php"

          ><span class="glyphicon glyphicon-shopping-cart"></span>
          <?php //if($_SESSION['logstat']=="Log Out")
          //echo $_SESSION['cart']; ?> Cart</a></li>
      </ul>
    </div>
  </div>
<?php } ?>

<?php
function show_jumbotron(){
?>
  <div class="jumbotron" style="box-shadow:8px 0px 15px #9B9B9B">
    <div class="container text-center">
      <h1>BG Store</h1>
      <p>Board Games for You</p>
    </div>
  </div>
<?php } ?>
