<?php

    require_once('../connection/connection.php');

    session_start();

    if(isset($_GET['proId'])) {
	    
        $sql = "SELECT p.`id`, p.`name` AS 'pname', p.`description`, b.`name` AS 'bname', p.`image`, p.`price`, c.`type`, p.`weight`, p.`location` FROM `product` p, `brand` b, `category` c WHERE p.`brand_id` = b.`id` AND p.`category_id` = c.`id` AND p.`id` = '{$_GET['proId']}' LIMIT 1";

        $result = mysqli_query($conn, $sql);

        $rowProId = mysqli_fetch_assoc($result);
    
    }

    if(isset($_SESSION['current_user'])){
        $sql = "SELECT count(`id`) AS 'cartCount' FROM `cart` WHERE `customer_id` = '{$_SESSION['current_user']}'";
        
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $cartCount = $row['cartCount'];
            }
        } else {
            $cartCount = 0;
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

        <title>Product | Oh-la-la</title>

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
            <div class="row mt-3">

                <div class="col-lg-8">
                    <div class="shadow-sm p-3 mb-5 bg-white rounded-lg "><h2><?php echo $rowProId['pname']; ?></h2></div>
                    
                    

                </div>
                
                
                <!-- /.col-lg-3 -->

            </div>
            
            <div class="row">

                <div class="col-lg-4">
                    <div class="shadow-sm p-3 mb-5 bg-white rounded-lg border border-danger"><img src="../<?php echo $rowProId['image']; ?>" width="100%"></div>
                    
                    

                </div>
                
                <div class="col-lg-8">
                    <div class="shadow-sm p-3 mb-5 bg-white rounded-lg ">
                        
                        <table class="table">
                            <tr>
                                <th class="p-4 table-danger">Description</th>
                                <td colspan="3" class="text-justify">
                                    <?php echo $rowProId['description']; ?>
                                    <div class="row mt-3 pl-4">
                                        <?php
                                            $rate = 3.4;
                                            $j = round($rate);
                                            for($i=1;$i<=5;$i++){
                                                if($j>0){
                                                    echo "<span><i class='fa fa-star text-danger' aria-hidden='true'></i>&nbsp;&nbsp;</span>";
                                                } else{
                                                    echo "<span><i class='fa fa-star-o  text-danger' aria-hidden='true'></i>&nbsp;&nbsp;</span>";
                                                }
                                                //echo "<span><i class='fa fa-star-half-o' aria-hidden='true'></i>&nbsp;&nbsp;</span>";
                                                
                                                $j--;
                                            }
                                        
                                            echo "<p>$rate</p>";
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="p-4 table-danger">Price</th>
                                <td colspan="3" ><h4>LKR <?php echo $rowProId['price']; ?></h4></td>
                            </tr>
                            <tr>
                                <th class="p-4 table-danger">Size</th>
                                <td colspan="3">
                                    <form method="POST">
                                        <button name="data" type="button" onclick="getData()" class="btn btn-outline-danger mb-2">25</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <th class="p-4 table-danger">Quantity</th>
                                <td colspan="3">
                                    <input type="number" value="1" min="1" max="10" step="1"/>
                                    <?php echo $rowProId['id']; ?> pair available
                                </td>
                            </tr>
                            <tr>
                                <th class="p-4 table-danger">Product Code</th>
                                <td colspan="3"><?php echo $rowProId['id']; ?></td>
                            </tr>
                            <tr>
                                <th class="p-4 table-danger">Brand</th>
                                <td><?php echo $rowProId['bname']; ?></td>
                                <th class="p-4 table-danger">Category</th>
                                <td><?php echo $rowProId['type']; ?></td>
                            </tr>
                        </table>
                        
                    </div>
                </div>
                
                
                <!-- /.col-lg-3 -->

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
