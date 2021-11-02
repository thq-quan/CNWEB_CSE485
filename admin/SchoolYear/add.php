<?php
	require_once ('../../db/dbhelper.php');
    session_start();

$id = $name=$dv=$id_parent  = '';
if (!empty($_POST)) {
	if (isset($_POST['donvi'])) {
		$name = $_POST['donvi'];

	}
    if (isset($_POST['id'])) {
		$id = $_POST['id'];

	}
	
	if (isset($_POST['class'])) {
		$dv = $_POST['class'];
	}


	if (!empty($name)) {
	  if ($id == '') {
		if ($dv == "NULL") {

			$sql = 'insert into class(name ) values("'.$name.'")';
			
		}else{

		$sql = 'insert into class(name,id_class) values("'.$name.'", "'.$dv.'" )';	
		}	}
		 else {
		 	if ($dv == "NULL") {
			$sql = 'update class set name = "'.$name.'",id_class = '.$dv.' where id = '.$id;
		}else{
			$sql = 'update class set name = "'.$name.'", id_class = "'.$dv.'" where id = '.$id;
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
	$sql      = 'select * from class where id = '.$id;
	$login = select_one($sql);
	if ($login != null) {
		$name 	  = $login['name'];
	
		if (isset($login['id_class'])) {
			
		$id_parent = $login['id_class'];
		$nm = "select name_class from school_year where id_class = " .$id_parent;
		$a = select_one($nm);
		if ( $a != null) {
			$dv = $a['name_class'];
		}
		}
		
		
	}
}else{
    $nm = "select name_class from school_year ";
		$a = select_one($nm);
		if ( $a != null) {
			$dv = $a['name_class'];
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
	    <a class="nav-link  " style="border-right: 2px solid white;" href="../Unit">Unit Management</a>

	</li>
    <li class="nav-item">
	    <a class="nav-link active" style="border-right: 2px solid white;" href="#">School year Management</a>

	</li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Thông Tin Niên Khoá</h2>
			</div>
			<div class="panel-body" >
				<form method="post" style = "width: 50% ; margin-left : 20%;margin-top:3%;">
					<div class="form-group">
					  <label  for="taikhoan">Lớp</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">

					  <input style="text-align:center;font-size : 20px;" required="true" type="text" class="form-control" id="taikhoan" name="donvi" 
					  value="<?=$name?>" >

					</div>
					
					<div class="form-group">
					  <label  for="matkhau">Khóa</label>
					  
					  <select style="text-align:center;font-size : 20px;"  type="text" class="form-control" id="matkhau" name="class">
					  	
                      <option value="<?=$id_parent?>"><?=$dv?></option>
							<option value="NULL"<?php if ($id_parent == "") {echo "selected"; } ?>>Không</option>

					<?php
					  		$sql = "select * from school_year " ;
					  		$variable = select_list($sql);
					  		foreach ($variable as  $value) { ?>
					  				
					  		<option value="<?=$value['id_class']?>"><?=$value['name_class']?></option>

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