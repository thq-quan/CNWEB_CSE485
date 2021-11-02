<?php
require_once ('../../db/dbhelper.php');
    session_start();
     
  

?>
<!DOCTYPE html>
<html>
<head>
	<title>School year Management</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/ico" href="../icon/logo.ico">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<style>
	td{
	font-weight : 400 ;font-size : 1.3rem	;}
	.search button{
    background-color: white;
    border: none;
}

.search button img{
    width: 50px;
    height: 45px;
   margin-top: 3px;
  
}
</style>
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
	    <a class="nav-link active" style="border-right: 2px solid white;" href="">School year Management</a>

	</li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Danh Sách Niên Khoá</h2>
			
			</div>
			<a href="add.php">
					<button class="btn btn-success" style="margin-left: 0px  ;margin-bottom: 15px;width: 200px;">Thêm Lớp</button>
				</a>
                <a href="add1.php">
					<button class="btn btn-success" style="margin-left: 0px  ;margin-bottom: 15px;width: 200px;">Thêm Khóa</button>
				</a>
				<form class="form-inline" action="" method="get" style="margin-left: 50px  ; ">
              <div class="input-group w-100">
         
                
              </div>
            </form>
			<div class="panel-body">
				
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th>Lớp</th>
							<th>Khóa</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
<?php


 $sql     = 'select * from class ';

$postList =  select_list($sql);
$index = 1 ;
foreach ($postList as $item) {
	if (isset($item['id_class'])) {
		$father  = "select name_class from school_year where id_class = " .$item['id_class'];
		 $fa      =  select_one($father);
		 if ($fa !=null) {
		 	$fath = $fa['name_class'];
		 }
	}

 ?>
 
	<tr>
				<td><?=($index++)?></td>
	
						
				<?php 	

				if  ($item['id_class'] == null) {?>
						
				<td class="text text-danger" style="font-size : 20px"><i><?=$item['name']?></i></td>
				<td class="text text-danger" style="font-size : 20px" >Không</td>
				<?php }
				else{?>
						
				<td ><?=$item['name']?></td>
				<td ><?=$fath?></td>
				<?php }?>
				
				<!-- <td>
				<a href="Detail.php?id=<?=$item['id']?>">
				<button class="btn btn-success">Xem chi tiết</button></a>
				</td> -->
				<td>
				<a href="add.php?id=<?=$item['id']?>">
				<button class="btn btn-warning">Sửa TT</button></a>
				</td>
				<td>
					<button class="btn btn-danger" onclick="deleteCategory(<?=$item['id']?>)">Xoá</button>
				</td>
				
			</tr>

<?php }?>

</tbody>
				</table>

			</div>
		</div>
	</div>
<script type="text/javascript">
		function deleteCategory(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá danh mục này không?')
			if(!option) {
				return;
			}

			console.log(id)
			//ajax - lenh post
			$.post('delete.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}


	</script>
</body>

</html>