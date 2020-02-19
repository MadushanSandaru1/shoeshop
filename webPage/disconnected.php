<?php

    $conn = mysqli_connect('localhost', 'root', '', 'shoeshop');

    if ($conn) {
        header('location:../index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Error | Oh-la-la</title>

        <!--title icon-->
        <link rel="icon" type="image/ico" href="../image/logo.png"/>

        <!-- Bootstrap core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/signup.css" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <style>
            body {
                /*background-image: url('../image/back.gif');
                background-image: url('../image/disconnected.gif');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;*/
            }
        </style>

    </head>

<body>
    
    <!-- Page Content -->
    
    <div class="container">
		<div class="d-flex justify-content-center">
            <div class="row">
                <img src="../image/disconnected.gif">            
            </div>
		</div>
        
        <div class="d-flex justify-content-center">        
            <div class="row">
                <input type="button" value="Refresh" onclick="window.location.reload();" class="btn-lg btn-primary">
            </div>
        </div>
    </div>
  <!-- /.container -->

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
