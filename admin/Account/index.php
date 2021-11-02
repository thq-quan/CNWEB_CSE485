<?php
session_start();
require_once ('../../db/dbhelper.php');
require_once('../check_admin.php');    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Account Management</title>
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
<style>
	td{
	font-weight : bold ; color : white; font-size : 1.3rem	;}
</style>
<body style="background:url(http://khohinhdep.com/wp-content/uploads/2017/10/hinh-nen-dien-thoai-lg-v20-chat-luong-qhd-010.jpg); overflow-y: hidden; ">
	<ul class="nav nav-tabs">
	  
	 
	  <li class="nav-item">
	    <a class="nav-link active" href="#">Account Management</a>
	  </li>
	   <li class="nav-item">
	    <a class="nav-link " style="border-right: 2px solid white;" href="../Post/">Event Management</a>

	  </li>
	  <li class="nav-item">
	    <a class="nav-link  " style="border-right: 2px solid white;" href="../Unit">Unit Management</a>

	</li>
    <li class="nav-item">
	    <a class="nav-link " style="border-right: 2px solid white;" href="../SchoolYear">School year Management</a>
	</li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center text-dark">Account Management</h2>
			</div>
			<div class="panel-body">
				<a href="add.php">
					<button class="btn btn-success" style="margin-left: 10%;margin-bottom: 15px;">Add Account</button>
				</a>
				<a href="../../index.php">
					<button class="btn btn-warning" style="width: 15%;margin-left: 25vh ; margin-bottom: 15px "> Home</button>
				</a>
				<a href="../../logout.php">
					<button class="btn btn-danger" style="width: 15%;margin-left: 25vh ; margin-bottom: 15px "> Log out</button>
				</a>

				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px" class="text-warning">Numbers</th>
							<th class="text-warning"> Account Name</th>
							<th class="text-warning"> Account Tpye</th>
							<th class="text-warning"> Change account type</th>
							<th width="50px"></th>
							<th width="50px"></th>
						</tr>
					</thead>
					<tbody>
<?php
//Lay danh sach tai khoan tu database
$sql          = 'select * from user';
$userList = select_list($sql);

$index = 1;
foreach ($userList as $item) {
		if ($item['type']==0) {
			
			$type_acc = "Guest";
		}
		else{
			$type_acc = "Admin";
		}
	echo '<tr>
				<td class="text-dark">'.($index++).'</td>
				<td class="text-dark" >'.$item['username'].'</td>
				
				<td class="text-dark" >'.$type_acc.'</td>
				<td style = "width: 18%" >
					
					<a href="ChangeTypeAcc.php?id='.$item['id'].'"><button class="btn btn-info">Change</button></a>

				<td>
					<a href="add.php?id='.$item['id'].'"><button class="btn btn-warning">Update</button></a>
				</td>
				<td>
					<button class="btn btn-danger" onclick="deleteAccount('.$item['id'].')">Delete</button>
				</td>
			</tr>';
}
?>
					</tbody>
				</table>
			</div>
		</div>
	</div>



	<script type="text/javascript">
		function deleteAccount(id) {
			var option = confirm('Are you sure you want to delete this account?')
			if(!option) {
				return;
			}

			console.log(id)
			//ajax - lenh post
			$.post('ajax.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}


	</script>

	
</body>
</html>