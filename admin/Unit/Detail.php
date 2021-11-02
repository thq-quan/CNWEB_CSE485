<?php
require_once ('../../db/dbhelper.php');	

   session_start();
 

if (isset($_GET['id'])) {
	$id      = $_GET['id'];
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CHi TIết</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	         <link rel="stylesheet" type="text/css" href="Detail.css">
	<link rel="shortcut icon" type="image/ico" href="../icon/logo.ico">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<!-- summernote -->
	<!-- include summernote css/js -->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body  >
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

	

				
			<table class="table table-bordered table-hover">
					
				<tbody>
<?php
$sql          = 'select * from unit where id =' .$id;
$loginList = select_list($sql);

$index = 1;
foreach ($loginList as $item) {

	echo '<tr>
                <td class="text-warning">STT</td>
                <td >'.$index.'</td>
				<td class="text-warning">Địa chỉ</td>
				<td >'.$item['address'].'</td>
				<td class="text-warning">Email</td>
				<td >'.$item['email'].'</td>
				<td class="text-warning">Website</td>
				<td >'.$item['website'].'</td>
				<td ></td>

			</tr>';
}
?>

<h2 class="text-center">Thông tin liên hệ : <?=$item['name']?></h2>


					</tbody>
			</table>







<?php 

$sqlid        = 'select * from unit where id_parent = ' .$id;
$listitem 		= select_list($sqlid);
$index = 1;


foreach ($listitem as $list) { 
	?>
<h2 class="">  <?=$list['name']?> : <?=$list['address']?></h2>
<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px" class="text-success">STT</th>
							<th class="text-success">Tên </th>
							
							<th class="text-success"> Địa Chỉ</th>
							<th class="text-success"> Email</th>
							<th class="text-success"> Website</th>	
						</tr>
					</thead>
					<tbody>
<?php
$sqlid        = 'select * from unit where id_parent = ' .$id;
$listitem 		= select_list($sqlid);

$index = 1;
foreach ($listitem as $item) {

	echo '<tr>
				<td class="text-primary">'.($index++).'</td>
				<td >'.$item['name'].'</td>
				
				<td >'.$item['address'].'</td>
				<td >'.$item['email'].'</td>
				<td >'.$item['website'].'</td>

				
			</tr>';
}
?>
					</tbody>
				</table>
<?php }  ?>

</body>
</html>