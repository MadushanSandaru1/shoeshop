<?php

    require_once('../connection/connection.php');

    session_start();

    $errStatus = "none";
    $successStatus = "none";

    if(isset($_POST['msgSend'])){
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        
        $sql = "INSERT INTO `contactus_submissions`(`subject`, `message`, `email`) VALUES ('$subject', '$message', '$email')";
        
        if (mysqli_query($conn, $sql)) {
            $errStatus = "none";
            $successStatus = "block";
            
        } else {
            $errStatus = "block";
            $successStatus = "none";
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

        <title>Contact Us | Oh-la-la</title>

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
                    <li class="nav-item active">
                        <a class="nav-link" href="contactUs.php">Contact Us</a>
                    </li>
                        <li class="nav-item">
                            <?php
                                if(!isset($_SESSION['current_user'])){
                                    echo "<a class='nav-link' href='signup.php'>Sign Up</a>";
                                }
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php
                                if(isset($_SESSION['current_user'])){
                                    echo "<a class='nav-link' href='logout.php'>Logout</a>";
                                }
                                else {
                                        echo "<a class='nav-link' href='login.php'>Login</a>";
                                }
                            ?>
                        </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    
    <div class="container mb-4">
      <div class="alert alert-success" style="display:<?php echo $successStatus; ?>">
        <strong>Thank you!</strong> Your message has been sent successfully.
      </div>
      <div class="alert alert-danger" style="display:<?php echo $errStatus; ?>">
        <strong>Oops!</strong> Your message not sent.
      </div>
    </div>
    
    <div class="container">
		<div class="d-flex justify-content-center">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="../image/logo.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="post" action="contactUs.php">
                        <div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-envelope"></i></span>
							</div>
							<input type="email" name="email" class="form-control input_user" value="<?php
                                if(isset($_SESSION['current_user'])){
                                    echo $_SESSION['email'];
                                }
                            ?>" placeholder="E-mail" required>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-tag"></i></span>
							</div>
							<input type="text" name="subject" class="form-control input_user" value="" placeholder="Subject" required>
						</div>
                        <div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-commenting"></i></span>
							</div>
                            <textarea rows="5" cols="5" name="message" class="form-control input_user" placeholder="Message"></textarea>
						</div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="msgSend" class="btn login_btn">Send</button>
                        </div>
					</form>
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
