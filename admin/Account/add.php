<?php
session_start();
require_once ('../../db/dbhelper.php');
require_once('../check_admin.php');
$id =$displayname= $name  = $password =  $type_acc = '';
if (!empty($_POST)) {
	if (isset($_POST['displayname'])) {
		$displayname = $_POST['displayname'];

	}
	if (isset($_POST['user_name'])) {
		$name = $_POST['user_name'];

	}
	if (isset($_POST['id'])) {
		$id = $_POST['id'];

	}

	if (isset($_POST['password'])) {
		$password = password_hash(($_POST['password']), PASSWORD_DEFAULT);
	}

	if (isset($_POST['type'])) {
		$type_acc = $_POST['type'];
	}

	$exist = "select * from user where username = '".$name."' ";
	// print(mysqli_num_rows(select($exist)));
	// 	exit();


	if (!empty($name)) {
		//Luu vao database
		if ($id == '') {
			if( mysqli_num_rows(select($exist)) < 1) {
			
				$sql = 'insert into user(displayname,username, password, type) values("'.$displayname.'","'.$name.'", "'.$password.'" , '.$type_acc.')';
				select($sql);
				header('Location: index.php');
				die();
			}
			else{
				echo "<script>
			      alert('Username is already in use');
			      window.location='http://localhost/THQ/admin/Account/add.php';
			      </script>" ;	
			      die();
					
				
			}
		}
		 else {
		 	if( mysqli_num_rows(select($exist)) < 1) {
			$sql = 'update user set displayname = "'.$displayname.'", username = "'.$name.'", password = "'.$password.'", type = '.$type_acc.' where id = '.$id;
			select($sql);
			header('Location: index.php');
			die();
			}
			else{
				echo "<script>
			      alert('Username is already in use');
			      window.location='http://localhost/THQ/admin/Account/add.php';
			      </script>" ;	
			      die();
					
				
			}
		}

		
	}
}

if (isset($_GET['id'])) {
	$id       = $_GET['id']; 
	$sql      = 'select * from user where id = '.$id;
	$user = select_one($sql);
	if ($user != null) {
		$displayname 	  = $user['displayname'];
		$name 	  = $user['username'];
		$type_acc = $user['type'];
	}
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Add/Update Account</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/ico" href="../icon/logo.ico">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(https://vinuni.edu.vn/wp-content/uploads/2020/05/QuangTruong3-scaled.jpg) ; overflow-y: hidden;">
	<ul class="nav nav-tabs">
	  
	  
	  <li class="nav-item">
	    <a class="nav-link active" href="#">Account Management</a>
	  </li>
	   <li class="nav-item">
	    <a class="nav-link " style="font-weight:bold" href="../Post/">Event Management</a>

	  </li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center" style=" margin-left : -10%;margin-top:3%;color: #FFFFFF;">Add/Update Account</h2>
			</div>
			<div class="panel-body" >
				<form method="post" style = "width: 50% ; margin-left : 20%;margin-top:3%;">

					<div class="form-group">
					  <label style="margin-left:30% ;color:#F0F811;font-weight: 600; font-size : 30px" for="display_name">Display Name </label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">

					  <input style="text-align:center;font-size : 20px;" required="true" type="text" class="form-control" id="display_name" name="displayname" 
					  value="<?=$displayname?>" >

					</div>

					<div class="form-group">
					  <label style="margin-left:30% ;color:#F0F811;font-weight: 600; font-size : 30px" for="user_name">Account Name </label>

					  <input style="text-align:center;font-size : 20px;" required="true" type="text" class="form-control" id="user_name" name="user_name" 
					  value="<?=$name?>" >

					</div>
					<div class="form-group">
					  <label style="margin-left:30% ;color:#F0F811;font-weight: 600; font-size : 30px" for="password">Password</label>
					  
					  <input style="text-align:center;font-size : 20px;" required="true" type="text" class="form-control" id="password" name="password" value="<?=$password?>" >
					</div>
					<div class="form-group">
					  <label style="margin-left:30% ;color:#F0F811;font-weight: 600; font-size : 30px" for="password">Account Type</label>
					  
					  <select style="padding-left: 42% ;font-size : 20px;" required="true" type="text" class="form-control" id="type" name="type" value="<?=$type_acc?>" >
					  	<option  value="1" <?php if( $type_acc!="" && $type_acc==1) echo "selected"?> >Admin</option>
					  	<option   value="0" <?php if( $type_acc!="" && $type_acc==0) echo "selected"?>>Guest</option>	 
					  </select>
					</div>

					<button style="width: 50%; margin-left : 20%" class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>