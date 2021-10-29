<?php
    require_once('config/config.php');
    session_start();
    if(isset($_POST['submit'])){
        $tk = $_POST['tk'];
        $mk = $_POST['mk'];
        $sql = "SELECT * FROM taikhoan WHERE taikhoan='$tk' AND matkhau='$mk'";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){
            $row=mysqli_fetch_array($result);
            $id_tk=$row['id_tk'];

            if ($row['chucvu']==1){
                $_SESSION['id_tk']=$row['id_tk'];
                header("Location:admin/index.html");
            }
            else{
                $_SESSION['id_tk']=$row['id_tk'];
                ?>
                    <script>
                        window.alert('--Đăng nhập thành công--');
                        window.location.href='user/profile.php?id_tk=<?php echo $id_tk; ?>';
                    </script>
                <?php
            }
        }
        else{
            header("Location:login.php");
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
    <title>Login</title>
</head>
<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-info text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>
                                <form method="POST">
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label">Name account</label>
                                        <input type="text" name="tk" class="form-control form-control-lg">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="mk" class="form-control form-control-lg">
                                    </div>
                                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot
                                            password?</a></p>
                                    <button class="btn btn-outline-light btn-lg px-5" name="submit"
                                        type="submit">Login</button>    
                                    </div>                               
                                </form>
                            <div>
                                <p class="mb-0">Don't have an account? <a href="register.php" class="text-white-50 fw-bold">Sign Up</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>