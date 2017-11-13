<?php
	session_start();
	require_once('connect.php');

// *************************************************************************************************
//------------------------Log in process-------------------------------//
  if(isset($_POST['username'])){
      $_SESSION['logstat']="Log Out";
    	$u = $_POST['username'];
    	$p = $_POST['password'];

    	$q = "SELECT * FROM user WHERE USER_NAME = '$u' AND USER_PASSWORD = '$p'";
    	$result = $mysqli->query($q);
    	$row = $result->fetch_array();

    	if($row){
    		echo "Login success";
    		$_SESSION['id'] = $row['USER_ID'];
    		$_SESSION['name'] = $row['USER_FNAME'].' '.$row['USER_LNAME'];
    		$_SESSION['usertype'] = $row['USER_TYPE'];
				$_SESSION['username'] = $row['USER_NAME'];

        if($_SESSION['usertype']==1){ header("Location:restock.php"); }
        else {
          if($_SESSION['lastpage']=="cart.php" || $_SESSION['lastpage']=="account.php"){
            $_SESSION['lastpage']="main.php";
          }
          header("Location:".$_SESSION['lastpage']);
        }
    	}
    	else{
    		echo "Incorrect username or password";
    		echo "<br><a href='login.php'>Retry login</a>";
    	}
  }
  else if($_SESSION['logout']==1){
    $_SESSION['id'] = NULL;
    $_SESSION['name'] = NULL;
    $_SESSION['usertype'] = NULL;
    $_SESSION['logstat']= "Log In";
    if($_SESSION['lastpage']=="cart.php" || $_SESSION['lastpage']=="account.php"){
      $_SESSION['lastpage']="main.php";
    }
    header("Location:".$_SESSION['lastpage']);
  }
  else{
    $_SESSION['id'] = NULL;
    $_SESSION['name'] = NULL;
    $_SESSION['usertype'] = NULL;
    $_SESSION['logstat']= "Log In";
  }
?>
