<?php 
	$sql = "select type from user where username = '".$_SESSION['username']."'" ;

 	$check = select_one($sql);

 	if ($check != null) {
 		$status = $check['type'];
 	}
    if (!isset($_SESSION["username"]) || $status == 0 )
        {     header("Location:../../index.php");
            // header("Location:index.php");
        }
?>