<?php
  require_once('../config/config.php');

  session_start();

  // if(isset($_SESSION['id_tk'])){
  //   echo $_SESSION['id_tk'];
  //   unset($_SESSION['id_tk']);
  // }
  
  if(isset($_GET['id_tk'])){
    $id_tk = $_GET['id_tk'];
    $sql = "SELECT * FROM taikhoan WHERE id_tk = $id_tk";

    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {

      $row = mysqli_fetch_assoc($result);
      $id_tk = $row['id_tk'];
      $tk = $row['taikhoan'];
      $ten = $row['ten'];
      $email = $row['email'];
      $sdt = $row['sdt'];
      $diachi = $row['diachi'];
      $website = $row['website'];
      $github = $row['github'];
      $tw = $row['tw'];
      $ig = $row['ig'];
      $fb = $row['fb'];
  }else {
    echo "lỗi";
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my-sytle.css" rel="stylesheet">
    <title>Profile</title>
</head>
<body>
    <section style="background-color: #eee;">
        <div class="container py-5">
          <div class="row">
            <div class="col">
              <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row justify-content-start mb-3">
            <div class="col-lg-3">
              <a href="edit-profile.html"><button class="btn btn-success">Edit Profile</button></a>
            </div>
          </div>
      
          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                  <img src="../img/avata.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                  <h5 class="my-3"><?php echo $tk; ?></h5>
                </div>
              </div>
              <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fas fa-globe fa-lg text-warning"></i>
                      <p class="mb-0"><?php echo $website; ?></p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                      <p class="mb-0"><?php echo $github; ?></p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                      <p class="mb-0"><?php echo $tw; ?></p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                      <p class="mb-0"><?php echo $ig; ?></p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                      <p class="mb-0"><?php echo $fb; ?></p>
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
                      <p class="text-muted mb-0"><?php echo $ten; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $email; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $sdt; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $diachi; ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card mb-4 mb-md-0">
                    <div class="card-body">

                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card mb-4 mb-md-0">
                    <div class="card-body">

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


<script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>