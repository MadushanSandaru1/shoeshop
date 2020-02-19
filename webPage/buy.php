<?php

    require_once('../connection/connection.php');

    session_start();

    if(isset($_GET['remove'])) {
	    
        $sql = "DELETE FROM `cart` WHERE `id` = {$_GET['remove']}";
        
        mysqli_query($conn, $sql);
    
    }

    $sql = "SELECT count(`id`) AS 'cartCount' FROM `cart` WHERE `customer_id` = '{$_SESSION['current_user']}'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $cartCount = $row['cartCount'];
        }
    } else {
        $cartCount = 0;
    }

    if(isset($_GET['buy'])){
        $buyId = $_GET['buy'];
    }

?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Cart | Oh-la-la</title>

        <!--title icon-->
        <link rel="icon" type="image/ico" href="../image/logo.png"/>

        <!-- Bootstrap core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <script src="../vendor/jquery/jquery.min.js"></script>
        
        <style>
            body {
                /*background-image: url('image/back.gif');*/
                background-image: url('../image/back.png');
            }
        </style>

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="../index.php"><img src="../image/logo.png" style="height:50px;"> Oh-la-la</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto lead">
                        <li class="nav-item active">
                            <?php
                                if(isset($_SESSION['current_user'])){
                            ?>
                            <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" style="font-size:30px;">
                                <?php 
                                    if($cartCount!=0){
                                        echo "<sup><span class='badge badge-pill badge-danger'>{$cartCount}</span></sup>";
                                    }
                                ?>
                                </i>
                            </a>
                            <?php } ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
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
        <div class="container">
            <div class="row">

                <div class="col-lg-3">
                    <h1 class="my-4">Shopping Cart</h1>
                    <div class="list-group">

                        <a href='../index.php?cat=all' class='list-group-item category'>All Category</a>

                        <?php
                            $sql = "SELECT * FROM `category`";

                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<a href='../index.php?cat=" . $row['id']. "' class='list-group-item category'>" . $row['type']. "</a>";
                                }
                            } else {
                                echo "<a href='#' class='list-group-item'>No Category</a>";
                            }
                        ?>

                    </div>

                </div>
                <!-- /.col-lg-3 -->

                <div class="col-lg-9 mt-3">

                    <div class="row" id="product-container">

                        <?php 

                            $query2 = "SELECT * FROM `product` WHERE `id` = '{$buyId}'";

                            $result = $conn->query($query2);

                            while ($row = $result->fetch_assoc()) { 

                        ?>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="../<?php echo $row['image'] ?>" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#"><?php echo $row['name']?></a>
                                    </h4>
                                    <h5>LKR <?php echo $row['price']?></h5>
                                    <p class="card-text"><?php echo $row['description']?></p>
                                    <?php
                                        if(isset($_SESSION['current_user'])){
                                            echo "<p class='text-success'>Shipping: LKR {$row['price']}</p>";
                                        }
                                        else {
                                            echo "<p class='text-success'>Please <a href='login.php'>login/Signup</a> to show the shipping cost</p>";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <?php } ?>

                    </div>
                    <!-- /.row -->

                    <?php

                        //get the total products count
                        $query3 = "SELECT COUNT(`id`) AS `count` FROM `product`";

                        $result3 = $conn->query($query3);

                        $prod_count_object = $result3->fetch_object();

                        $count = $prod_count_object->count;

                    ?>

                    <span id="current_displayed_items" style="display:none;" >3</span>
                    <span id="total_items" style="display:none;" ><?php echo $count; ?></span>


                </div>

            </div>

            <br>

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
