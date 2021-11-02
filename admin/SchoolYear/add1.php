<?php
	require_once ('../../db/dbhelper.php');
    session_start();

    $khoa = '';

    if(!empty($_POST)){
        if(isset($_POST['khoa'])){
            $khoa = $_POST['khoa'];
        }
        if(!empty($khoa)){
            $sql = 'insert into school_year(name_class) values("'.$khoa.'")';
            select($sql);
            header("location:index.php");
        }
    }

?>





<!DOCTYPE html>
<html>
<head>
	<title>Thêm niên khóa</title>
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
				<h2 class="text-center">Thêm Niên Khoá</h2>
			</div>
			<div class="panel-body" >
				<form method="post" style = "width: 50% ; margin-left : 20%;margin-top:3%;">
					<div class="form-group">
					  <label  for="taikhoan">Khóa</label>
					  <input style="text-align:center;font-size : 20px;" required="true" type="text" class="form-control" id="taikhoan" name="khoa" 
					  value="">
					</div>
					<button style="width: 50%; margin-left : 20%" class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>