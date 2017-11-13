<!DOCTYPE html>
<?php
  session_start();
  $_SESSION['lastpage']="main.php";
  $_SESSION['currentpage']='main';
  require_once("connect.php");
  require_once("navbar.php");
  
  $_SESSION['logout']=0;
  if(!isset($_SESSION['logstat'])){
    require_once('checklogin.php');
  }

?>

<html lang="en">
<head>
  <title>BG Store - Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }

    /* Remove the jumbotron's default bottom margin */
     .jumbotron {
      margin-bottom: 0;
      padding-top: 100px;
      margin-bottom: 20px;
    }

    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #2A2A2A;
      color: #E0E0E0;
      padding: 1.5%;
      /*position: absolute;*/
      left:0;
      right:0;
      bottom:0;
    }

    .panel{
      border-color:#6B6A6A ;
      border-width:1.5px;
    }

    .panel-footer{
      background-color: #D7D7D7;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: #fafafa;
    }


  </style>
</head>
<body>

<!-- =================== Initiate SESSION values ======================= -->
  <?php
    // if($_SESSION['logstat']==null){
    //   $_SESSION['checkloginfrommain'] = '1';
    //   header("Location: checklogin.php");
    // }
    ?>
<!-- /////////////////////////////////////////////////////////////////// -->

<!-- =============================== jumbotron ==================================== -->
<?php show_jumbotron(); ?>
<!-- ////////////////////////////////////////////////////////////////////////////// -->

<!-- =============================== navbar ======================================= -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <?php show_navbar(); ?>
</nav>
  <!-- /////////////////////////////////////////////////////////////////////////// -->

<!-- =============================== Promotion  =================================== -->
<!-- .....................Row 1...................... -->
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <!-- <div class="panel-heading" style="background-color:#404040;">Game of Thrones</div> -->
        <div class="panel-body"><img src="https://images-na.ssl-images-amazon.com/images/I/81D7UY73TIL._SY355_.jpg" class="img-responsive center-block" style="width:55%" alt="Image"></div>
        <div class="panel-footer">Buy 2 games for 30% discount!</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <!-- <div class="panel-heading" style="background-color:#404040;">Mission of Madness</div> -->
        <div class="panel-body"><img src="https://i.pinimg.com/736x/9f/1d/ea/9f1dea0732324f5a0819744f3f6e8876--cthulhu-game-card-games.jpg" class="img-responsive center-block" style="width:58.5%" alt="Image"></div>
        <div class="panel-footer">Buy 2 games for 30% discount!</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <!-- <div class="panel-heading" style="background-color:#404040;">Exploding Kittens 1st Edition</div> -->
        <div class="panel-body"><img src="https://www.explodingkittens.com/img/store/games/first_edition_alt3.png" class="img-responsive" style="width:200;height:250;" alt="Image"></div>
        <div class="panel-footer">Buy 2 games for 30% discount!</div>
      </div>
    </div>
  </div>
</div><br>
<!-- ................................................ -->
<!-- .....................Row 2...................... -->
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#404040;">Avalon</div>
        <div class="panel-body"><img src="https://images-na.ssl-images-amazon.com/images/I/71ooTJfPLPL._SY450_.jpg" class="img-responsive center-block" style="width:37%" alt="Image"></div>
        <div class="panel-footer">Buy 2 games for 30% discount!</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#404040;">Exploding Kittens Red Box</div>
        <div class="panel-body"><img src="http://cdn.shopify.com/s/files/1/0921/7330/products/KITTEN_ORIGIN_1024x1024.jpg?v=1500627695" class="img-responsive center-block" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 2 games for 30% discount!</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#404040;">Imploding Kittens</div>
        <div class="panel-body"><img src="https://images-na.ssl-images-amazon.com/images/I/91%2BUFc-N6RL._SY355_.jpg" class="img-responsive center-block" style="width:50%" alt="Image"></div>
        <div class="panel-footer">Buy 2 games for 30% discount!</div>
      </div>
    </div>
  </div>
</div>
<!-- ................................................ -->
<!-- ////////////////////////////////////////////////////////////////////////////// -->

<!-- =============================== footer ======================================= -->
<footer class="container-fluid text-center">
  <p>BG Store</p>
</footer>
<!-- ////////////////////////////////////////////////////////////////////////////// -->

</body>
</html>
