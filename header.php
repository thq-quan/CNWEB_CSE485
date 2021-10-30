<?php
require_once ('db/dbhelper.php');
// session_start();

if (isset($_SESSION['username'])) {
	 $check = "select type,id from user where username = '".$_SESSION['username']."'" ;

 	$check = select_one($check);
 	if ($check != null) {
 		$status = $check['type'];
		$id = $check['id'];
 	}
}
    
?>	


	<link rel="stylesheet" type="text/css" href="css/header.css">
	<header>
	<div class="head">
		<div class="head_top" id="head_top" >
			<div class="head_top_left">
				<ul>
					<li>
						<a href="index.php">Trang Chủ</a>
					</li>
					<li>
						<a href="">Báo Cáo</a>
					</li>
					<li style="border: 0px;"> 
						<a  href="">Liên Hệ</a>
					</li>
				</ul>
			</div>
			<div class="head_top_right">
				<div class="head_top_right_search">
				  <form id="search" method="GET" action="directory.php">
					<input  type="text" name="searchText">
					<button type="submit" >
					<span class="search-button">
						<img src="https://vinuni.edu.vn/wp-content/themes/vinuni/assets/images/search.png" alt="icon search">
					</span>
					</button>
				 </form>
				</div>
			</div>
		</div>
		<div class="head_bottom"id="head_bottom">
			<div class="head_bottom_left">
				<a class="logo" href="index.php">
					<img src="http://www.tlu.edu.vn/Portals/_default/skins/tluvie/images/logo.png" alt="Logo VinUni" ></a>
			</div>


			<div class="head_bottom_right">
				<ul class="parent">
					<li class="boder">
						<a href="index.php"><button class="btn btn-primary"><i class="fas fa-home"></i> Home</button></a>
	
					</li>
					<li class="boder">
						<a href="event.php"><button class="btn btn-warning"><i class="fas fa-calendar-alt"></i> Event</button></a>
				
					</li>
					<li class="boder">
						<a href=""><button class="btn btn-danger"><i class="fas fa-comments"></i> Chat</button></a>
						
					</li>

					<li class="boder">
				<?php 
					if (!isset($_SESSION['username'])) { ?>			
					<a href="register/register.php"><button class="btn btn-secondary"><i class="fas fa-sign-in-alt"></i> Sign-In</button></a>
                     <a href="login/login.php"><button class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Log-In</button></a>
				
				<?php } else{ ?>

					
						<a href="<?php 
						if($status == 1){
							echo "admin/account/index.php";
							}else{
								echo "user/profile.php?id=$id";
							}
						 ?>">
						<button class="btn btn-success"><i class="">Hello</i> <?=$_SESSION['username']?></button></a>
						<a href="logout.php"><button class="btn btn-danger"><i class="fas fa-sign-out-alt"></i>Log-Out</button></a>

						

						<?php  } ?>
						
					</li>
				</ul>
			</div>
		</div>
	</div>
	</header>
	



  <script type="text/javascript">
    window.onscroll = function ()
    {
        
      if (document.body.scrollTop > 10 || document.documentElement.scrollTop >10)
      {
        console.log(document.documentElement.scrollTop);  

        document.getElementById("head_top").style.display = "none";
        document.getElementById("head_bottom").style["boxShadow"] = " 0px 12px 9px -8px black";
        document.getElementById("head_bottom").style["animation"] = " none ";

        
        
      } 
      else
      {
        
        document.getElementById("head_top").style.display = "block";
        document.getElementById("head_bottom").style["boxShadow"] = "none";
        
      }
    };
  </script> 
