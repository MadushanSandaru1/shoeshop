<?php

    require_once('connection/connection.php');

    session_start();

?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Home Page | Oh-la-la</title>

        <!--title icon-->
        <link rel="icon" type="image/ico" href="image/logo.png"/>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
        <script src="vendor/jquery/jquery.min.js"></script>
        
        
        
        <script>
            
            function loadMoreProducts(){
                var current_count,total_count;
                //get the values to be sent to the server.
                current_count = document.getElementById("current_displayed_items").innerHTML;

                total_count   = document.getElementById("total_items").innerHTML;

                if (window.XMLHttpRequest) {
                    //modern browsers
                    var xhttp = new XMLHttpRequest();
                }

                /*
                * Sets the callback function when the request status.
                */
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        $("#product-container").append(this.responseText);
                        new_count = parseInt(current_count)+3;
                        document.getElementById("current_displayed_items").innerHTML = new_count;

                        //check if all products are displayed
                        if(new_count >= total_count){
                            //then hide load more button
                            $('#load-more').hide();
                        }
                    }
                };
                //sends the request to the server
                xhttp.open("GET", "webPage/loadProduct.php?&current_count="+current_count, true);
                xhttp.send();
            }
        
        </script>

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="image/logo.png" style="height:50px;"> Oh-la-la</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto lead">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item"><?php
                                if(!isset($_SESSION['current_user'])){
                                    echo "<a class='nav-link' href='webPage/signup.php'>Sign Up</a>";
                                }
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php
                                if(isset($_SESSION['current_user'])){
                                    echo "<a class='nav-link' href='webPage/logout.php'>Logout</a>";
                                }
                                else {
                                        echo "<a class='nav-link' href='webPage/login.php'>Login</a>";
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
                    <h1 class="my-4">Oh-la-la</h1>
                    <div class="list-group">

                        <a href='index.php?cat=all' class='list-group-item category'>All Category</a>

                        <?php
                            $sql = "SELECT * FROM `category`";

                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<a href='index.php?cat=" . $row['id']. "' class='list-group-item category'>" . $row['type']. "</a>";
                                }
                            } else {
                                echo "<a href='#' class='list-group-item'>No Category</a>";
                            }
                        ?>

                    </div>

                </div>
                <!-- /.col-lg-3 -->

                <div class="col-lg-9">

                    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">

                            <?php
                                $sql = "SELECT * FROM `carousel`";

                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<div class='carousel-item active'>
                                        <img class='d-block img-fluid' src='". $row['image']."' alt='". $row['id']." slide'></a>
                                        </div>";
                                    }
                                }
                            ?>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>


                    <div class="row" id="product-container">

                        <?php 

                            if(isset($_GET['cat'])) {
                                if($_GET['cat'] == 'all') {
                                    $query2 = "SELECT * FROM `product` LIMIT 3";
                                } else {
                                    $query2 = "SELECT * FROM `product` WHERE `category_id` = '{$_GET['cat']}' LIMIT 3";
                                }
                            } else {
                                $query2 = "SELECT * FROM `product` LIMIT 3";
                            }

                            $result = $conn->query($query2);

                            while ($row = $result->fetch_assoc()) { 

                        ?>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="<?php echo $row['image'] ?>" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#"><?php echo $row['name']?></a>
                                    </h4>
                                    <h5>LKR <?php echo $row['price']?></h5>
                                    <p class="card-text"><?php echo $row['description']?></p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
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

            <!-- Add the load more button after the products container. -->
            <div class="row" >  
                <div class="col-lg-3" ></div>
                <div class="col-lg-9" style="text-align: center;">
                    <button class="btn btn-danger" id="load-more" onclick="loadMoreProducts()">Load More</button>
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
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    </body>

</html>
