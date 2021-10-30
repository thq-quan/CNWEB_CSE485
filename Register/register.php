<?php
    require_once ('../db/dbhelper.php');
    session_start();
    if (isset($_POST['submit']) && $_POST["tk"] != '' && $_POST["mk"] != '' && $_POST["mk1"] != '') 
    {   
        $username   = $_POST["tk"];
        $password   =($_POST["mk"]);
        $repassword = ($_POST["mk1"]);

            if( $password!=$repassword ){           
                echo "<script>
                          alert('Password does not match');
                            window.location='http://localhost/CNWEB_CSE485/Register/register.php';
                          </script>";
            }


            $sql      = "select * from user where username = '$username'";
            $old      = select($sql);



            if( mysqli_num_rows($old) > 0){
                echo "<script>
                      alert('Account is already in use');
                      window.location='http://localhost/CNWEB_CSE485/Register/register.php';
                      </script>";
            }

            else if($password==$repassword){
                $password = password_hash($password, PASSWORD_DEFAULT);
                $sql="insert into user(username,password) values('$username','$password')";
                 // print($sql);
                 // exit();
                select($sql);

                echo "<script>
                      alert('Successful account registration !!!!!');
                      window.location='http://localhost/CNWEB_CSE485/Login/login.php';
                      </script>";

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
                                <p class="mb-0">You have an account? <a href="../login/login.php" class="text-white-50 fw-bold">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>