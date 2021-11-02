<?php
	require_once ('../../db/dbhelper.php');
    session_start();

$id = $name=$dv  = $address = $email = $website = $id_parent = '';
if (!empty($_POST)) {
	if (isset($_POST['donvi'])) {
		$name = $_POST['donvi'];

	}
	if (isset($_POST['id'])) {
		$id = $_POST['id'];

	}
	if (isset($_POST['sophong'])) {
		$address = $_POST['sophong'];
	}

	if (isset($_POST['email'])) {
		$email = $_POST['email'];
	}

	
	if (isset($_POST['donvicha'])) {
		$dv = $_POST['donvicha'];
	}
	if (isset($_POST['website'])) {
		$website = $_POST['website'];
	}
		

	if (!empty($name)) {
	  if ($id == '') {
		if ($dv == "NULL") {

			$sql = 'insert into unit(name, address,  email, website ) values("'.$name.'","'.$address.'","'.$email.'", "'.$website.'")';
			
		}else{

		$sql = 'insert into unit(name, address, email, website ,id_parent) values("'.$name.'","'.$address.'", "'.$email.'", "'.$website.'", "'.$dv.'" )';	
		}	}
		 else {
		 	if ($dv == "NULL") {
			$sql = 'update unit set name = "'.$name.'", address = "'.$address.'", email = "'.$email.'", website = "'.$website.'", id_parent = '.$dv.' where id = '.$id;
		}else{
			$sql = 'update unit set name = "'.$name.'", address = "'.$address.'", email = "'.$email.'", website = "'.$website.'", id_parent = "'.$dv.'" where id = '.$id;
		}
		}
		select($sql);
		// print($sql);
		// exit();
			header('Location: index.php');
			die();
		

		
	}
}

if (isset($_GET['id'])) {
	$id       = $_GET['id']; 
	$sql      = 'select * from unit where id = '.$id;
	$login = select_one($sql);
	if ($login != null) {
		$name 	  = $login['name'];
		$address 	  = $login['address'];

		$email 	  = $login['email'];

		$website  = $login['website'];
		if (isset($login['id_parent'])) {
			
		$id_parent = $login['id_parent'];
		$nm = "select name from unit where id = " .$id_parent;
		$a = select_one($nm);
		if ( $a != null) {
			$dv = $a['name'];
		}
		}
		
		
	}
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Thông Tin Đơn Vị</title>
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
<body >
	<ul class="nav nav-tabs">
	  
    <li class="nav-item">
	    <a class="nav-link " href="../Account">Account Management</a>
	</li>
	<li class="nav-item">
	    <a class="nav-link " style="border-right: 2px solid white;" href="../Post/">Event Management</a>

	</li>
    <li class="nav-item">
	    <a class="nav-link active " style="border-right: 2px solid white;" href="#">Unit Management</a>

	</li>
    <li class="nav-item">
	    <a class="nav-link " style="border-right: 2px solid white;" href="../SchoolYear">School year Management</a>

	</li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Thông Tin Đơn Vị</h2>
			</div>
			<div class="panel-body" >
				<form method="post" style = "width: 50% ; margin-left : 20%;margin-top:3%;">
					<div class="form-group">
					  <label  for="taikhoan">Tên Đơn Vị :</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">

					  <input style="text-align:center;font-size : 20px;" required="true" type="text" class="form-control" id="taikhoan" name="donvi" 
					  value="<?=$name?>" >

					</div>

					<div class="form-group">
					  <label  for="matkhau">Địa Chỉ:</label>
					  
					  <input style="text-align:center;font-size : 20px;" required="true" type="text" class="form-control" id="matkhau" name="sophong" value="<?=$address?>" >
					</div>
					
					<div class="form-group">
					  <label  for="matkhau">Email:</label>
					  
					  <input style="text-align:center;font-size : 20px;" required="true" type="text" class="form-control" id="matkhau" name="email" value="<?=$email?>" >
					</div>

					<div class="form-group">
					  <label  for="matkhau">Website:</label>
					  
					  <input style="text-align:center;font-size : 20px;" required="true" type="text" class="form-control" id="matkhau" name="website" value="<?=$website?>" >
					</div>

					
					<div class="form-group">
					  <label  for="matkhau">Trực Thuộc </label>
					  
					  <select style="text-align:center;font-size : 20px;"  type="text" class="form-control" id="matkhau" name="donvicha">
					  	
							<option value="<?=$id_parent?>"><?=$dv?></option>
							<option value="NULL"<?php if ($id_parent == "") {echo "selected"; } ?>>Không</option>

					<?php
					  		$sql = "select * from unit " ;
					  		$variable = select_list($sql);
					  		foreach ($variable as  $value) { ?>
					  				
					  		<option value="<?=$value['id']?>"><?=$value['name']?></option>

					  	<?php } ?>

					  </select>
					</div>

					<button style="width: 50%; margin-left : 20%" class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>