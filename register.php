<?php
    require_once('config/config.php');

    if(isset($_POST['submit'])){
        $tk = $_POST['tk'];
        $mk = $_POST['mk'];
        $mk1 = $_POST['mk1'];

        if($mk != $mk1){
            echo "Mật khẩu không trùng khớp!";
            header("Location:register.php");
        }


        $sql = "SELECT * FROM taikhoan WHERE taikhoan = '$tk'";
        $result = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($result)>0){
            echo "Tài khoản đã được sử dụng!";
            header("Location:register.php");
        }
        else{
            $sql_re = "INSERT INTO taikhoan (taikhoan, matkhau) VALUES ('$tk','$mk')";
            $result_re = mysqli_query($conn,$sql_re);
            if($result_re==TRUE){
                ?>
                    <script>
                        window.alert('--Đăng ký thành công--');
                        window.location.href='login.php';
                    </script>
                <?php
            }
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
    <title>Sign Up</title>
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8">
                    <div class="card bg-info text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Sign Up</h2>
                                <p class="text-white-50 mb-5">Please enter your information!</p>
                                <form method="POST">
                                    <div class="row mb-3">
                                        <div class="col-3 form-outline form-white my-auto">
                                            <label class="form-label">User Name</label>
                                        </div>
                                        <div class="col-9 form-outline form-white my-auto">
                                            <input type="text" name="tk" class="form-control form-control-lg">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-3 form-outline form-white my-auto">
                                            <label class="form-label">Password</label>
                                        </div>
                                        <div class="col-9 form-outline form-white my-auto">
                                            <input type="password" name="mk" class="form-control form-control-lg">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-3 form-outline form-white my-auto">
                                            <label class="form-label">Re-Password</label>
                                        </div>
                                        <div class="col-9 form-outline form-white my-auto">
                                            <input type="password" name="mk1" class="form-control form-control-lg">
                                        </div>
                                    </div>
                                    <div class="mb-5 mt-5">
                                        <button class="btn btn-outline-light btn-lg px-5" name="submit" type="submit">Register</button> 
                                    </div>
                                </form>
                            </div>
                            <div>
                                <p class="mb-0">You have an account? <a href="login.php" class="text-white-50 fw-bold">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>