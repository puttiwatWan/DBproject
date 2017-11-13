<!DOCTYPE html>
<?php
session_start();
$_SESSION['lastpage']="product.php";
$_SESSION['currentpage']='product';
require_once('connect.php');
require_once('navbar.php');
if(isset($_SESSION['id'])){
   $findcartid='SELECT cart.cart_id FROM cart
   WHERE cart.user_id='.$_SESSION['id'];
   $res = $mysqli->query($findcartid);
   while ($row = $res->fetch_array())
   {
     $cartid=$row['cart_id'];
   }
}
// ======================== ADD to Cart ==================================
if(isset($_POST['addToCart'])){
  $pid=$_POST['addToCart'];
  $q='SELECT cartdetail.product_id FROM cartdetail WHERE cartdetail.product_id='.$pid;
  $res = $mysqli->query($q);
  while ($row = $res->fetch_array())
  {
    $check=$row['product_id'];
  }
  if($check==null){
    $q='INSERT INTO cartdetail (`cart_id`, `product_id`, `quantity`, `total_price`)
    values ('.$cartid.','.$pid.',1,
    (SELECT product.product_price FROM product WHERE product.product_id='.$pid.'))';
    $res = $mysqli->query($q);
    $q='UPDATE cart SET cart.total_amount=cart.total_amount+(SELECT product.product_price FROM product WHERE product.product_id='.$pid.')
    WHERE cart.cart_id='.$cartid;
    $res = $mysqli->query($q);
  }
  else{
    $update="SET @op=''; CALL increase_quantity($cartid,$pid,@op); SELECT @op AS 'output';";
    $result = $mysqli->multi_query($update);
  }

}
if(isset($_POST['checkcart'])){
     header("Location:product.php#".$_POST['checkcart']);
}
// //////////////////////////////////////////////////////////////////////////
?>

<html lang="en">
<head>
  <title>BG Store - Products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="sidebarcss.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="sidebar style.css">
<!-- ====== Style ======= -->
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    .jumbotron {
     margin-bottom: 0;
     padding-top: 100px;
     margin-bottom: 20px;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 100%}

    .table{

      border-style:solid;
      width:30%;
      height:40%;


    }

    body{
      /*padding-bottom:30px;*/
      font-family: 'Poppins', sans-serif;
      background: #fafafa;
    }

    /* Set black background color, white text and some padding */

    footer {
      background-color: #2A2A2A;
      color: #E0E0E0;
      padding: 1.5%;
      margin-top:25px;
      /*position: absolute;*/
      left:0;
      right:0;
      bottom:0;
    }


    /*.panel{
      min-height: 350px;
      padding-left: 40px;
      border: 0px;
      box-shadow:0 0px 0px rgba(0,0,0,0)
    }*/

    .panel{
      border-color:inherit ;
      border-width:0px;
      background-color: inherit;
      border-bottom-left-radius: 13px;
      border-bottom-right-radius: 13px;
    }



    .panel-footer{
      background-color: white;
      border-bottom: 0px;
      border-bottom-left-radius: 13px;
      border-bottom-right-radius: 13px;
      border-top-left-radius: 13px;
      border-top-right-radius: 13px;
      /*font-size: 14px ;*/
    }

    tr.fig td{
      width:25%;
      padding:25%;
      padding-bottom:2%;
    }

    tr.txt td{
      padding-bottom:0%

    }

    tr.txt2 td{
      padding-top:1%
    }

    .fontsize{
      font-size: 10px ;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {

      .row.content {height:auto;}

      #sidebar {
        margin-left: -250px;
        position:fixed;
      }
      #sidebar.active {
          margin-left: 0;
      }
      #content {
          width: 100%;
      }
      #content.active {
          width: calc(100% - 250px);
      }
      #sidebarCollapse span {
          display: none;
      }
    }
  </style>
<!-- ///////////////////// -->
</head>

<body>



  <!-- =============================== navbar ======================================= -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <?php show_navbar(); ?>
  </nav>
    <!-- /////////////////////////////////////////////////////////////////////////// -->

<!-- ========================== SIDEBAR ============================= -->
    <!-- jQuery CDN --><script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN --><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Nice Scroll Js CDN --><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>
  <div class="wrapper">

        <nav id="sidebar" class ="active" style="box-shadow:2px 2px 7px #CECECE;">
            <!-- Sidebar Header -->
            <div class="sidebar-header" style="height:20%;">
                <p style="font-size:21px;font-family:sans-serif;line-height:27px;">Choose Your Genres</p>
            </div>

            <!-- Sidebar Links -->
            <ul class="list-unstyled components">
                <li class="active"><a href="#">All</a></li>
                <li><a href="#">Party</a></li>
                <li><a href="#">Strategy</a></li>

                <!-- <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                    </ul></li> -->
                <li><a href="#">Deck Building</a></li>
                <li><a href="#">Thematic</a></li>
                <li><a href="#">Abstract</a></li>
                <li><a href="#">Family</a></li>
            </ul>
        </nav>

        <div id="content">
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn"
                    style="position:fixed;
                            left:-2.5%;top:12%;
                            background-color:#6E6E6E;
                            border-color:#6E6E6E;
                            transform:rotate(90deg);">
                <p style="margin-bottom:3px;"><i class="glyphicon glyphicon-align-left" id="dismiss"></i>
                   Genres</p>
            </button>
        </div>
        <div class="overlay"></div>

    <script type="text/javascript">
      $(document).ready(function () {

        $('#sidebar').niceScroll({
            cursorcolor: '#6E6E6E', // Changing the scrollbar color
            cursorwidth: 4, // Changing the scrollbar width
            cursorborder: 'none', // Rempving the scrollbar border
        });

        $('#sidebarCollapse').on('click', function () {
            // open or close navbar
            $('#sidebar').removeClass('active');
            // close dropdowns
            $('.collapse.in').toggleClass('in');
            $('.overlay').fadeIn();
            // and also adjust aria-expanded attributes we use for the open/closed arrows
            // in our CSS
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });

        $('.overlay').on('click', function () {
           $('#sidebar').addClass('active');
           $('.overlay').fadeOut();
        });
      });
    </script>
  </div>
<!-- ///////////////////////////////////////////////////////////////// -->

<!-- =============================== jumbotron ==================================== -->
<?php show_jumbotron(); ?>
<!-- ////////////////////////////////////////////////////////////////////////////// -->



<!-- ===============================TABLE START============================ -->
<div class="container-fluid text-center">
  <!-- <div class="row content" style="padding-left:30px;"> -->

    <?php
     $loopNo = 0;
      $qrs = "SELECT * FROM product";
      $resulto = $mysqli->query($qrs);

      echo '<div class="container-fluid text-center">';
        echo '<div class="row">';
      while($row=$resulto->fetch_array()){
        if($loopNo%4==0 && $loopNo!=0){
          echo '</div></div><br>';
          echo '<div class="container-fluid text-center">';
          echo '<div class="row">';
        }
          echo '<div class="col-sm-3">';
            echo '<div class="panel panel-primary text-center">';
              echo '<div class="panel-body" style="height:200px;"><img src="img/'.$row['product_pic'].'" class="img-responsive center-block" style="height:150px;" alt="'.$row['product_name'].'"></div>';
              echo '<div class="panel-footer">'.$row['product_name'].'<br>'.$row['show_price'].' THB<br>'.
              '</div>';
              // echo '<div class="panel-footer">'.$row['show_price'].'</div>';
              echo '<div>
                <form action="product.php" method="POST">
                <input type="hidden" name="checkcart" value="first">
                </div>';
                //------- send check variable to show items in cart -------//
              echo '<div class="panel-footer" style="border-width:0px;margin-top:-13px;">
              <button class="glyphicon glyphicon-shopping-cart" type="submit"
                    name="addToCart" value="'.$row['product_id'].'">
                    <span style="font-family:sans-serif">Add to cart</span></button></div>';
                    //------- Add Cart button -------//
              echo '</div>';
            echo '</div>';
        $loopNo+=1;
      }
      echo '</div></div>';


    ?>
    <!-- <div class="container">
        <div class="row">

          <div class="col-sm-3">
            <div class="panel panel-primary text-center">
              <div class="panel-heading" style="background-color:#404040;">Imploding Kittens</div>
              <div class="panel-body"><img src="https://images-na.ssl-images-amazon.com/images/I/81D7UY73TIL._SY355_.jpg" class="img-responsive center-block" style="width:55%" alt="Image"></div>
              <div class="panel-footer">Buy 2 games for 30% discount!</div>
              <div class="panel-footer">Buy 2 games for 30% discount!</div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="panel panel-primary text-center">
              <div class="panel-heading" style="background-color:#404040;">Imploding Kittens</div>
              <div class="panel-body"><img src="https://www.explodingkittens.com/img/store/games/first_edition_alt3.png" class="img-responsive center-block" style="width:55%" alt="Image"></div>
              <div class="panel-footer">Buy 2 games for 30% discount!</div>
              <div class="panel-footer">Buy 2 games for 30% discount!</div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="panel panel-primary text-center">
              <div class="panel-heading" style="background-color:#404040;">Imploding Kittens</div>
              <div class="panel-body"><img src="http://cdn.shopify.com/s/files/1/0921/7330/products/KITTEN_ORIGIN_1024x1024.jpg?v=1500627695" class="img-responsive center-block" style="width:55%" alt="Image"></div>
              <div class="panel-footer">Buy 2 games for 30% discount!</div>
              <div class="panel-footer">Buy 2 games for 30% discount!</div>
            </div>
          </div>

        </div>
      </div><br> -->



  <!-- </div> -->



 </div>

<!-- ////////////////////////////////////////////////////////////////////// -->

</body>
<!-- ===============================footer============================ -->
<footer class="container-fluid text-center">
    <p style="color:white;">BG Store</p>
</footer>
<!-- ///////////////////////////////////////////////////////////////// -->
</html>
