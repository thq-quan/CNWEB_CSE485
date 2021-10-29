<?php
    require_once('../config/config.php');
    session_start();

    $id_tk = $_GET['id_tk'];
    $sql = "SELECT * FROM taikhoan WHERE id_tk = $id_tk";
    $result = mysqli_query($conn, $sql);
    
    if($result == TRUE){
        $count = mysqli_num_rows($result);
        if($count == 1){
            $row = mysqli_fetch_assoc($result);
            $id_tk = $row['id_tk'];
            $taikhoan = $row['taikhoan'];
            $ten = $row['ten'];
            $ngaysinh = $row['ngaysinh'];
            $gioitinh = $row['gioitinh'];
            $diachi = $row['diachi'];
            $email = $row['email'];
            $sdt = $row['sdt'];
            $lop = $row['lop'];
            $website = $row['website'];
            $github = $row['github'];
            $tw = $row['tw'];
            $ig = $row['ig'];
            $fb = $row['fb'];
            $img = $row['img'];
        }
        else{
            ?>
            <script>
                window.location.href = 'profile.php?id_tk=<?php echo $id_tk; ?>';
            </script>
        <?php
        }
    }

    if (isset($_POST['submit'])){

        $ten = $_POST['ten'];
        $ngaysinh = $_POST['ngaysinh'];
        $gioitinh = $_POST['gioitinh'];
        $diachi = $_POST['diachi'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $lop = $_POST['lop'];
        $website = $_POST['website'];
        $github = $_POST['github'];
        $tw = $_POST['tw'];
        $ig = $_POST['ig'];
        $fb = $_POST['fb'];
        $img = $_POST['img'];

        $sql = "UPDATE taikhoan SET
        ten='$ten',
        ngaysinh='$ngaysinh',
        gioitinh='$gioitinh',
        diachi='$diachi',
        email='$email',
        sdt= '$sdt',
        lop='$lop',
        img='$img',
        website = '$website',
        github = '$github',
        tw = '$tw',
        ig = '$ig',
        fb = '$fb'
        
        WHERE id_tk='$id_tk'
        ";
        $result = mysqli_query($conn, $sql);

        if($result == TRUE){
            ?>
            <script>
                window.location.href = 'profile.php?id_tk=<?php echo $id_tk; ?>';
            </script>
        <?php
        }
        else{
            ?>
            <script>
                window.location.href = 'edit-profile.php?id_tk=<?php echo $id_tk; ?>';
            </script>
        <?php
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
    <title></title>
</head>

<body>

    <div class="container" style="background-color: #eee;">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <?php
                       if($img == null){?>
                            <img class="rounded-circle mt-5" width="150px" src="../img/avata.png">
                        <?php   
                       }else{
                           ?>
                            <img class="rounded-circle mt-5" width="150px" src="../img/<?php echo $img; ?>">
                        <?php
                       }
                    ?>
                    <span class="font-weight-bold mt-2">
                        <?php echo $taikhoan; ?>
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
                                    <input type="text" name="ten" class="form-control" placeholder="<?php echo $ten; ?>" value="<?php echo $ten; ?>">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label class="labels">Ngày sinh</label>
                                    <input type="date" name="ngaysinh" class="form-control" placeholder="<?php echo $ngaysinh; ?>"
                                        value="<?php echo $ngaysinh; ?>">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label class="labels">Giới tính</label>
                                    <input type="text" name="gioitinh" class="form-control" placeholder="<?php echo $gioitinh; ?>"
                                        value="<?php echo $gioitinh; ?>">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label class="labels">Địa chỉ</label>
                                    <input type="text" name="diachi" class="form-control" placeholder="<?php echo $diachi; ?>"
                                        value="<?php echo $diachi; ?>">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label class="labels">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="<?php echo $email; ?>"
                                        value="<?php echo $email; ?>">
                                </div>
                                <div class="col-md-12 mt-3  ">
                                    <label class="labels">Số điện thoại</label>
                                    <input type="text" name="sdt" class="form-control" placeholder="<?php echo $sdt; ?>" value="<?php echo $sdt; ?>">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label class="labels">Lớp</label>
                                    <input type="text" name="lop" class="form-control" placeholder="<?php echo $lop; ?>" value="<?php echo $lop; ?>">
                                </div>
                                <div class="col-md-12 mt-3  ">
                                    <label class="labels">Ảnh đại diện</label>
                                    <input type="file" name="img" class="form-control" placeholder="<?php echo $img; ?>" value="<?php echo $img; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">  
                                    <div class="col-md-12 mt-3">
                                        <label class="labels">Website</label>
                                        <input type="text" name="website" class="form-control" placeholder="<?php echo $website; ?>" value="<?php echo $website; ?>">
                                    </div>
                                    
                                    <div class="col-md-12 mt-3  ">
                                    <label class="labels">Github</label>
                                    <input type="text" name="github" class="form-control" placeholder="<?php echo $github; ?>" value="<?php echo $github; ?>">
                                </div>
                                <div class="col-md-12 mt-3  ">
                                    <label class="labels">Twitter</label>
                                    <input type="text" name="tw" class="form-control" placeholder="<?php echo $tw; ?>" value="<?php echo $tw; ?>">
                                </div>
                                <div class="col-md-12 mt-3  ">
                                    <label class="labels">Instagram</label>
                                    <input type="text" name="ig" class="form-control" placeholder="<?php echo $ig; ?>" value="<?php echo $ig; ?>">
                                </div>
                                    
                                <div class="col-md-12 mt-3  ">
                                    <label class="labels">Facebook</label>
                                    <input type="text" name="fb" class="form-control" placeholder="<?php echo $fb; ?>" value="<?php echo $fb; ?>">
                                </div>       
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary  profile-button" name="submit" type="submit">Save Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>