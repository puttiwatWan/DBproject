<!DOCTYPE html>
<?php
session_start();
$_SESSION['lastpage']="product.php";
$_SESSION['currentpage']='product';
require_once('connect.php');
require_once('navbar.php');

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
     $rowNo = 'a';
      $q = "SELECT * FROM product";
      $result = $mysqli->query($q);

      echo '<div class="container-fluid text-center" id="'.$rowNo.'">';
      echo '<div class="row">';
      while($row=$result->fetch_array()){
        if($loopNo%4==0 && $loopNo!=0){
          $rowNo = $rowNo.'a';
        }
        if($loopNo%4==0 && $loopNo!=0){
          echo '</div></div><br>';
          echo '<div class="container-fluid text-center" id="'.$rowNo.'">';
          echo '<div class="row">';
        }

          echo '<div class="col-sm-3">';
            echo '<div class="panel panel-primary text-center">';
              echo '<div class="panel-body" style="height:200px;"><img src="img/'.$row['product_pic'].'" class="img-responsive center-block" style="height:150px;" alt="'.$row['product_name'].'"></div>';
              echo '<div class="panel-footer">'.$row['product_name'].'<br>'.$row['product_price(show)'].' THB<br>'.
              '</div>';
              // echo '<div class="panel-footer">'.$row['product_price(show)'].'</div>';
              echo '
                <form action="cart.php" method="POST">
                <input type="hidden" name="checkcart" value="'.$rowNo.'">';
                //------- send check variable to show items in cart -------//
              echo '<div class="panel-footer" style="border-width:0px;margin-top:-13px;"><button class="glyphicon glyphicon-shopping-cart" type="submit"
                    name="add" value="'.$row['product_name'].'">
                    <span style="font-family:sans-serif">Add</span></button></div></form>';
                    //------- Add Cart button -------//
              echo '</div>';
            echo '</div>';
        $loopNo+=1;
      }
      echo '</div></div>';


    ?>


 </div>

<!-- ////////////////////////////////////////////////////////////////////// -->

</body>
<!-- ===============================footer============================ -->
<footer class="container-fluid text-center">
    <p style="color:white;">BG Store</p>
</footer>
<!-- ///////////////////////////////////////////////////////////////// -->
</html>
