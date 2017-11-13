<!DOCTYPE html>
<?php session_start(); ?>
<?php
    session_destroy();
    $_SESSION['currentpage']='contact';
    require_once("navbar.php");
  ?>
<html lang="en">
<head>
  <title>BG Store - Contact</title>
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
      position: absolute;
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
  </style>
</head>
<body>

  <!-- =============================== jumbotron ==================================== -->
  <?php show_jumbotron(); ?>
  <!-- ////////////////////////////////////////////////////////////////////////////// -->

<!-- =============================== navbar ======================================= -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <?php show_navbar(); ?>
</nav>
  <!-- /////////////////////////////////////////////////////////////////////////// -->

<div style="margin-left:4%;margin-top:3%;">
  <h3>BG Store</h3>
  <p><b>Tel:</b> 081-2345678<br><b>Facebook Page:</b> BG Store<br><b>Line ID:</b> BGStore</p>
</div>
<!-- <div class="container-fluid text-center col-sm-3">
  <div class="row content">
    <table style="border-style:hidden;">
      <tr id="first" class="fig">
        <td><img src="https://images-na.ssl-images-amazon.com/images/I/81D7UY73TIL._SY355_.jpg" class="img-responsive"  alt="Game of Thrones"></td>
      </tr> -->
      <!-- =========================== For Row 2 <text> ================================ -->
      <!-- <tr class="txt">
        <td>Game of Thrones: The Board Game<br><span style="font-size:12px">2,400 THB</span></td>
      </tr>
    </table>
  </div>
</div> -->




<footer class="container-fluid text-center">
  <p>BG Store</p>
</footer>

</body>
</html>
