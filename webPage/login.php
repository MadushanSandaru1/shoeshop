<?php

    require_once('../connection/connection.php');

    session_start();

?>

<?php
    $_SESSION['error_message'] = "";
    $user = null;

    if(isset($_COOKIE['username'])) {
        $user = $_COOKIE['username'];
    }

    if(isset($_POST['login'])){
        $user = $_POST['username'];
        $pwd = $_POST['password'];
        
        if(empty($user)){
            $_SESSION['error_message']="please enter username";
        }
        else if(empty($pwd)){
            $_SESSION['error_message']="please enter password";
        }
        else if(empty($password) && empty($user)){
            $_SESSION['error_message']="please enter both fields";
        }
        else {
            $password = md5($pwd);
            $sql = "SELECT c.*,u.`role` FROM `customer` c, `user` u WHERE c.`id` = u.`id` AND c.`id` = '{$user}'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                $sql = "SELECT c.* FROM `customer` c, `user` u WHERE c.`id` = u.`id` AND c.`id` = '{$user}' AND u.`password` = '{$password}'";
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $_SESSION['current_user'] = $row['id'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['email'] = $row['email'];
                        
                        if(isset($_POST['remember'])){
                            setcookie("username", $_SESSION['current_user'], time() + (86400 * 30), "/");
                        }
                        
                        header('location:../index.php');
                    }
                }
                else{
                    $_SESSION['error_message'] = "You have provided invalid credentials";
                }
            }
            else{
                $_SESSION['error_message'] = "User not exist";
            }
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

        <title>Login | Oh-la-la</title>

        <!--title icon-->
        <link rel="icon" type="image/ico" href="../image/logo.png"/>

        <!-- Bootstrap core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
        <link href="../css/signup.css" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <style>
            body {
                background-image: url('../image/back.gif');
            }
        </style>

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
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign Up</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
		<div class="d-flex justify-content-center mt-5">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="../image/logo.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="login.php" method="post">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-tag"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" placeholder="username" value="<?php echo $user; ?>">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" placeholder="password">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" value="1" name="remember" class="custom-control-input" id="customControlInline"
                                       <?php
                                        if(isset($_COOKIE['username'])) {
                                            echo 'checked';
                                        }
                                       ?>
                                >
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="login" class="btn login_btn">Login</button>
				   </div>
					</form>
				</div>
                
					<div class="d-flex justify-content-center links">
						<p style="color:white; font-weight:bold;"><?php echo $_SESSION['error_message']; ?></p>
					</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="signup.php" class="ml-2">Sign Up</a>
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
  <footer class="mt-5 py-5 bg-dark" style="bottom:0; width:100%;">
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
