<?
    session_start();
    require_once('../db/dbhelper.php');
    require_once('send.php');

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $title = $_POST['title'];
        $content = $_POST['content'];
    }
    sendEmail($email,$title,$content);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Invite</title>
</head>
<body style="    background:url('https://st.quantrimang.com/photos/image/2020/07/30/Hinh-Nen-Trang-9.jpg');">
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                  <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3">
                    <ol class="breadcrumb mb-0">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Invite</li>
                    </ol>
                  </nav>
                </div>
              </div>
        </div>
    </section>

    <div class="container">
        <div class="m-5 border border-info">
            <form action="" method="post">
                <div class="row mt-3">
                    <div class="col-md-3 my-auto text-center">
                        <label class="labels">Email người được mời</label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" name="email" class="form-control" placeholder="@gmail" value="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 my-auto text-center">
                        <label class="labels">Tiêu đề</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="title" class="form-control" placeholder="" value="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 my-auto text-center">
                        <label class="labels">Nội dung</label>
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control"  rows="6" name="content"></textarea>
                    </div>
                </div>
                <div class="row mt-3 justify-content-end mr-3">
                    <button name="submit" type="submit" class="btn btn-success">Send</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>