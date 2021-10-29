<?php
    require_once('config/config.php');

    if(isset($_SESSION['id_tk'])){
        
        $chek = "SELECT * FROM taikhoan WHERE id_tk '".$_SESSION['id_tk']."'";

        $check = mysqli_query($conn,$check);

        if(mysqli_num_rows($check) > 0){
            $row=mysqli_fetch_array($check);
            $id_check = $row['id_tk'];
            $taikhoan = $row['taikhoan'];
        }

      }

    $sql = "SELECT * FROM sukien LIMIT 4";
    $result = mysqli_query($conn,$sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Event</title>
</head>

<body>

    <header>
        <section class="bg-info border-bottom">
            <div class="container">
                <nav class="navbar navbar-expand-lg" style="height: 200px;">
                    <div class="container-fluid">
                        <img src="img/logodhtl.png" alt="dttl" style="height: 100px;">
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-1">
                                <li class="nav-item mx-3">
                                    <a href=""><button class="btn btn-primary"><i class="fas fa-home"></i> Home</button></a>
                                </li>
                                <li class="nav-item mx-3">
                                    <a href=""><button class="btn btn-warning"><i class="fas fa-calendar-alt"></i> Event</button></a>
                                </li>
                                <li class="nav-item mx-3">
                                    <a href=""><button class="btn btn-danger"><i class="fas fa-comments"></i> Chat</button></a>
                                </li>
                                <li class="nav-item">

                                <?php
                                    if(!isset($_SESSION['id_tk'])){ ?>

                                            <a href="login.php"><button class="btn btn-secondary"><i class="fas fa-sign-in-alt"></i> Login</button></a>

                                        <?php
                                    }else{
                                        ?>
                                            <a href="user/profile.php?id_tk=<?php echo $id_check; ?>"><button class="btn btn-secondary"><i class="fas fa-sign-in-alt"></i>
                                        <?php echo $taikhoan;  ?> </button></a>
                                        <?php
                                    }

                                ?>
                                    

                                
                                </li>
                            </ul>
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-success mx-2" type="submit"><i
                                        class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </section>
    </header>


    <section>
        <div class="container bg-light">
            <div class="row">

<?php
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
        ?>

                <div class="col-md-6 mt-5 mb-2">
                    <div class="card mb-md-0 mx-4 h-100">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <img class="img-fluid" src="img/dhtl.jpg" alt="event"
                                    style="width: 350px; height: 100%;">
                            </div>
                            <div class="row justify-content-center">
                                <h4 class="mt-2 text-center"><?php echo $row['ten_sukien'] ?></h4>
                                <p class="text-center font-weight-light mx-3"><?php echo $row['tieude'] ?></p>
                                <button class="btn btn-outline-success">Chi tiết</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
?>

            </div>
        </div>
    </section>
    <footer class="bg-info" style="height: 110px;">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <p class="text-center">All rights reserved. Designed By <a class="text-warning" style="font-size: 1.25rem;" href="https://github.com/thq-quan/">thq-quan</a></p>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>