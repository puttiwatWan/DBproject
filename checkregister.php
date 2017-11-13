<html>
<body>
<?php
  session_start();
  require_once('connect.php');

    $f = $_POST['fname'];
    $l = $_POST['lname'];
    $e = $_POST['email'];
    $u = $_POST['username'];
    $p = $_POST['password'];
    $c = $_POST['confirm'];

    if($p!=$c){
      $_SESSION['pcunmatch']=true;
      $_SESSION['f']=$f;
      $_SESSION['l']=$l;
      $_SESSION['e']=$e;
      $_SESSION['u']=$u;
      //echo "failed";
      header("Location:register.php");
    }
    else{
      //echo "success";
      $q = "INSERT INTO `user` (`USER_NAME`, `USER_PASSWORD`,`USER_TYPE`,`USER_FNAME`, `USER_LNAME`, `USER_EMAIL`)
      VALUES ('$u','$p','2','$f','$l','$e');";
      $result=$mysqli->query($q);
      if(!$result){
				echo "INSERT failed. Error: ".$mysqli->error ;
			}
      echo '<form action="checklogin.php" method="POST" id="submitForm">';
      echo '<input type="hidden" name="username" value='.$u.'>';
      echo '<input type="hidden" name="password" value='.$p.'>';
      echo '<input type="submit hidden">';
      echo '</form>';
      echo "<script type=\"text/javascript\">
            document.getElementById('submitForm').submit();
            </script>";
    }
?>
</body>
</html>
