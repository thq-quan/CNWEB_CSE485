<?php
    session_start();
    require_once('../db/dbhelper.php');

    
    $id = $_GET['id'];

    $sql = "select * from info_user b where id = $id";
    $name = $address = $email = $phone = $website = $github = $tw = $ig = $fb = $avatar = $id_sukien = '';
    $profile = select_one($sql);

    if($profile != null){
      $name = $profile['name'];
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

    $list = "SELECT * FROM user_chat WHERE id = $id";
    $datas = select_list($list);
    // print_r($datas);
    // exit();
    $list_sk = "SELECT * FROM user_event WHERE id = $id";
    $datas_sk = select_list($list_sk);


  
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Profile | <?=$name?></title>
</head>
<body>
    <section style="background-color: #eee;">
        <div class="container py-5">
          <div class="row">
            <div class="col">
              <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row justify-content-start mb-3">
            <div class="col-lg-3">
              <a href="edit-profile.php?id=<?=$id?>"><button class="btn btn-success">Edit Profile</button></a>
              <a href="../logout.php"><button class="btn btn-danger">Logout</button></a>
            </div>
          </div>
      
          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                  <?php
                       if($avatar == null){?>
                            <img class="rounded-circle img-fluid" style="width: 150px;" src="../img/avata.png">
                        <?php   
                       }else{
                           ?>
                            <img class="rounded-circle img-fluid" style="width: 150px;" src="<?=$avatar?>">
                        <?php
                       }
                    ?>
                  <h5 class="my-3"><?=$name?></h5>
                </div>
              </div>
              <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fas fa-globe fa-lg text-warning"></i>
                      <p class="mb-0"><?=$website?></p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                      <p class="mb-0"><?=$github?></p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                      <p class="mb-0"><?=$tw?></p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                      <p class="mb-0"><?=$ig?></p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                      <p class="mb-0"><?=$fb?></p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?=$name?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?=$email?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?=$phone?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?=$address?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card mb-4 mb-md-0">
                    <h4 class="text-center border border-dark m-2 p-2">Nhóm chat đã tham gia</h4>
                    <div class="card-body">
                       <?php     
                       foreach($datas as $r){
                          $user_event = "SELECT * FROM gr_chat WHERE id_gr = ".$r['id_gr']."";
                          $data_event = select_one($user_event);
                        ?>
                      <div class="row border-bottom border-primary mt-2 mb-2">
                        <div class="col-9">
                            <h5>Group: <a href="" class="text-decoration-none"><?php echo $data_event['name_gr']; ?></a></h5>
                            <p>Ngày tạo: <?php echo $data_event['date_gr']; ?></p>
                        </div>
                      
                        <div class="col-3 my-auto">
                            <a href=""><button class="btn btn-success">Vào</button></a>
                        </div>                       
                      </div>
                      <?php
                       } 
                      ?>

                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card mb-4 mb-md-0">
                      <div class="row">
                        <div class="col-5">
                        <h4 class="text-start m-2 p-2">Sự kiện</h4>
                        </div>
                        <div class="col-7 my-auto">
                        <a href="../invite.php"><button class="btn btn-primary ">Mời tham gia sự kiện</button></a>
                        </div>
                      </div>
                    <div class="card-body border">
                    <?php     
                       foreach($datas_sk as $r){
                          $user_event = "SELECT * FROM event WHERE id_sukien = ".$r['id_sukien']."";
                          $data_event = select_one($user_event);
                        ?>
                      <div class="row border-bottom border-primary mt-2 mb-2">
                        <div class="col-9">
                            <h5><a href="../detail.php?id=<?=$data_event['id_sukien']?>" class="text-decoration-none"><?php echo $data_event['ten_sukien']; ?></a></h5>
                            <p>Thời gian: <?php echo $data_event['date_sukien']; ?></p>
                        </div>
                      
                        <div class="col-3 my-auto">
                            <a href="../detail.php?id=<?=$data_event['id_sukien']?>"><button class="btn btn-success">Xem</button></a>
                        </div>                       
                      </div>
                      <?php
                       } 
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


</body>

</html>