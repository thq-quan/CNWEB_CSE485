<?php
    require_once('../db/dbhelper.php');
    session_start();

    $id = $_GET['id'];
    $sql = "select * from info_user where id = $id";
    $name = $dateofbirth = $sex = $address = $email = $phone = $website = $github = $tw = $ig = $fb = $avatar = '';
    $profile = select_one($sql);
    
    if($profile != null){
        $name = $profile['name'];
        $dateofbirth = $profile['dateofbirth'];
        $sex = $profile['sex'];
        $address = $profile['address'];
        $email = $profile['email'];
        $phone = $profile['phone'];
        $website = $profile['website'];
        $github = $profile['github'];
        $tw = $profile['tw'];
        $ig = $profile['ig'];
        $fb = $profile['fb'];
  
        $a='../../';
        $b=" ".$profile["avatar"];
        if(strpos($b,$a)){ //  kiểm tra a có trong b không
          $profile["avatar"] = str_replace('../../images','images' ,$profile["avatar"]);
         }
        else{
             $profile["avatar"] = $profile["avatar"] ;
       
        }
        $avatar = $profile['avatar'];
      }

      if (!empty($_POST)){
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
        }
        if (isset($_POST['dateofbirth'])) {
            $dateofbirth = $_POST['dateofbirth'];
        }
        if (isset($_POST['sex'])) {
            $sex = $_POST['sex'];
        }
        if (isset($_POST['address'])) {
            $address = $_POST['address'];
        }
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }
        if (isset($_POST['phone'])) {
            $phone = $_POST['phone'];
        }
        if (isset($_POST['avatar'])) {
            $avatar = $_POST['avatar'];
        }
        if (isset($_POST['website'])) {
            $website = $_POST['website'];
        }
        if (isset($_POST['github'])) {
            $github = $_POST['github'];
        }
        if (isset($_POST['tw'])) {
            $tw = $_POST['tw'];
        }
        if (isset($_POST['ig'])) {
            $ig = $_POST['ig'];
        }
        if (isset($_POST['fb'])) {
            $fb = $_POST['fb'];
        }

        
	if (!empty($name)) {
		$id = $_GET['id'];
		$sql = 'update info_user set name = "'.$name.'", dateofbirth = "'.$dateofbirth.'", sex = "'.$sex.'", address = "'.$address.'", email = "'.$email.'",
        phone = "'.$phone.'", website = "'.$website.'", github = "'.$github.'", tw = "'.$tw.'", ig = "'.$ig.'", fb = "'.$fb.'" where id = '.$id;
		select($sql);
        echo "<script>
        alert('Username is already in use');
        window.location='http://localhost/CNWEB_CSE485/user/profile.php?id=$id';
        </script>" ;	
        die();
	}

      }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title></title>
</head>

<body>

    <div class="container" style="background-color: #eee;">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <?php
                       if($avatar == null){?>
                            <img class="rounded-circle mt-5" width="150px" src="../img/avata.png">
                        <?php   
                       }else{
                           ?>
                            <img class="rounded-circle mt-5" width="150px" src="<?=$avatar?>">
                        <?php
                       }
                    ?>
                    <span class="font-weight-bold mt-2">
                        <?=$name?>
                    </span>
                    <span></span>
                </div>
            </div>
            <div class="col-md-9 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"></div>
                    </div>
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6 border-right">
                                <div class="col-md-12 mt-3">
                                    <label class="labels">Họ và Tên</label>
                                    <input type="text" name="name" class="form-control" placeholder="<?=$name?>" value="<?=$name?>">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label class="labels">Ngày sinh</label>
                                    <input type="date" name="dateofbirth" class="form-control" placeholder="<?=$dateofbirth?>"
                                        value="<?=$dateofbirth?>">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label class="labels">Giới tính</label>
                                    <input type="text" name="sex" class="form-control" placeholder="<?=$sex?>"
                                        value="<?=$sex?>">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label class="labels">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" placeholder="<?=$address?>"
                                        value="<?=$address?>">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label class="labels">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="<?=$email?>"
                                        value="<?=$email?>">
                                </div>
                                <div class="col-md-12 mt-3  ">
                                    <label class="labels">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" placeholder="<?=$phone?>" value="<?=$phone?>">
                                </div>
                                <div class="col-md-12 mt-3  ">
                                    <label class="labels">Ảnh đại diện</label>
                                    <input type="text" name="avatar" class="form-control" placeholder="<?=$avatar?>" value="<?=$avatar?>">
                                </div>
                            </div>
                            <div class="col-md-6">  
                                    <div class="col-md-12 mt-3">
                                        <label class="labels">Website</label>
                                        <input type="text" name="website" class="form-control" placeholder="<?=$website?>" value="<?=$website?>">
                                    </div>
                                    
                                    <div class="col-md-12 mt-3  ">
                                    <label class="labels">Github</label>
                                    <input type="text" name="github" class="form-control" placeholder="<?=$github?>" value="<?=$github?>">
                                </div>
                                <div class="col-md-12 mt-3  ">
                                    <label class="labels">Twitter</label>
                                    <input type="text" name="tw" class="form-control" placeholder="<?=$tw?>" value="<?=$tw?>">
                                </div>
                                <div class="col-md-12 mt-3  ">
                                    <label class="labels">Instagram</label>
                                    <input type="text" name="ig" class="form-control" placeholder="<?=$ig?>" value="<?=$ig?>">
                                </div>
                                    
                                <div class="col-md-12 mt-3  ">
                                    <label class="labels">Facebook</label>
                                    <input type="text" name="fb" class="form-control" placeholder="<?=$fb?>" value="<?=$fb?>">
                                </div>       
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary  profile-button">Save Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>