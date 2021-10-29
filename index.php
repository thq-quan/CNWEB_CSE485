<?php
require_once ('db/dbhelper.php');
    session_start();
     
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home-TLU</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body style=" background-color :#F7F7F7">
    <?php require_once('header.php') ?>
    <div class="view" style=" animation :  trenxuong 1s ease-out;">
        <img class="d-block w-100" src="http://www.tlu.edu.vn/Portals/0/images/2021/bia.jpg">

    </div>
        <?php require_once('main.php') ?>
        <?php require_once('footer.php') ?>

    

        


        
</body>

</html>