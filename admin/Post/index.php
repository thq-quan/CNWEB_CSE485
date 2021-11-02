<?php
session_start();
require_once ('../../db/dbhelper.php');
require_once('../check_admin.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Post Management</title>
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
	 font-weight: 600;
}
	.pagination{
    font-size: 35px;
    position:relative;
    margin-bottom: 2%;
    margin-left: 43%;
}
.pagination .page-item{
    text-align: center;
    margin-right: 15px;
    font-weight: bold;
    color: #962629;
}
.pagination .page-item:hover{
    color: #2e5288;
}
</style>
<body style="    background:url('http://khohinhdep.com/wp-content/uploads/2017/10/hinh-nen-dien-thoai-lg-v20-chat-luong-qhd-010.jpg');">
	<ul class="nav nav-tabs">
	  <li class="nav-item">
	    <a class="nav-link" href="../account/">Account Management</a>
	  </li>
	   <li class="nav-item">
	    <a class="nav-link active" href="#">Event Management</a>
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
				<h2 class="text-center">Post Management</h2>
			</div>
			<div class="panel-body">
				<a href="add.php">
					<button class="btn btn-success" style="margin-bottom: 70px;">New Post</button>
				</a>
				<a href="../../invite.php">
					<button class="btn btn-success" style="margin-bottom: 70px;">Invite</button>
				</a>
				<form action="" method="GET">
					<div class="select" style=" margin-top : -50px; margin-left:150px;">

				</div>
			</form>

				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">Numbers</th>
							<th>Name </th>
							<th>anhsk</th>
							<th >Posted by</th>
							<th width="200px">Category</th>
						</tr>
					</thead>
					<tbody>
<?php



  
$sql = "select * from event ";
$postList = select_list($sql);
$index =1;
foreach ($postList as $item) {
	$poster 	= "select username from user where id = " .$item['id_user'];
	$get_name   = select_one($poster);
	if ($get_name != null) {
		$get_name = $get_name['username'];
	}
	
$a='../../';
$b=" ".$item["anhsk"];
if(strpos($b,$a)){
          		 $item["anhsk"] = str_replace('image', '../../image',$item["anhsk"]);
          }
else{$item["anhsk"] = $item["anhsk"] ;
		
}

 ?>

	<tr>
				<td><?=($index++)?></td>
				<td width="350px"><?=$item['ten_sukien']?></td>
				<td><img src="<?=$item['anhsk']?>" style="width: 100px;height :80px"/>
				</td>
				<td width="130px"><?=$get_name?></td>
				<td width="350px"><?=$item['date_sukien']?></td>
				<td>
				<a href="add.php?id=<?=$item['id_sukien']?>">
				<button class="btn btn-warning">Update</button></a>
				</td>
				<td>
				<button class="btn btn-danger" onclick="deleteProduct(<?=$item['id_sukien']?>)">Delete</button>
				</td>
			</tr>
<?php } ?>

</tbody>
				</table>

			</div>
		</div>
	</div>

	<script type="text/javascript">
		function deleteProduct(id) {
			var option = confirm('Are you sure you want to delete this post ?')
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