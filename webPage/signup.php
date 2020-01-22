<?php

    require_once('../connection/connection.php');

    session_start();

    $errStatus = "none";

    if(isset($_POST['signUp'])){
        $username = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $pwd = $_POST['pwd'];
        $hpwd = md5($pwd);
        $repwd = $_POST['repwd'];
        
        $sql = "INSERT INTO `customer`(`id`, `name`, `address`, `email`, `phone`) VALUES ('$username', '$name', '$address', '$email', '$phone')";
        
        if (mysqli_query($conn, $sql)) {
            $sql = "INSERT INTO `user`(`id`, `password`, `role`) VALUES ('$username','$hpwd','customer')";
            
            if (mysqli_query($conn, $sql)) {
                $_SESSION['current_user'] = $username;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;

                header('location:../index.php');
            }
        } else {
            $errStatus = "block";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Sign Up | Oh-la-la</title>

        <!--title icon-->
        <link rel="icon" type="image/ico" href="../image/logo.png"/>

        <!-- Bootstrap core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/signup.css" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

<body>
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <div class="container">
            <a class="navbar-brand" href="../index.php"><img src="../image/logo.png" style="height:50px;"> Oh-la-la</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto lead">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactUs.php">Contact Us</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="signup.php">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mb-4">
      <div class="alert alert-danger" style="display:<?php echo $errStatus; ?>">
        <strong>Failed!</strong> Try again.
      </div>
    </div>
    
    <!-- Page Content -->
    <div class="container">
		<div class="d-flex justify-content-center">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="../image/logo.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="post" action="signup.php">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-tag"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" value="" placeholder="username">
						</div>
                        <div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-user"></i></span>
							</div>
							<input type="text" name="name" class="form-control input_user" value="" placeholder="Name">
						</div>
                        <div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-envelope"></i></span>
							</div>
							<input type="email" name="email" class="form-control input_user" value="" placeholder="Email">
						</div>
                        <div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-address-card-o"></i></span>
							</div>
							<input type="text" name="address" class="form-control input_user" value="" placeholder="Address">
						</div>
                        <div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-phone-square"></i></span>
							</div>
							<input type="text" name="phone" class="form-control input_user" value="" placeholder="Phone Number">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="password" name="pwd" class="form-control input_pass" value="" placeholder="password">
						</div>
                        <div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="password" name="repwd" class="form-control input_pass" value="" placeholder="Re-enter password">
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="signUp" class="btn login_btn">Sign Up</button>
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Do you already have an account? <a href="login.php" class="ml-2">Login</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark" style="bottom:0; width:100%;">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Oh-la-la 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
