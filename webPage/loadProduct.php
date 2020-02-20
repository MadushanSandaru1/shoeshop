<?php

    session_start();

    require_once('../connection/connection.php');

    $current_count = $_GET["current_count"];

    if(isset($_GET['cat'])) {
            if($_GET['cat'] == 'all') {
                    $query = "SELECT * FROM `product` LIMIT $current_count,3 ";
            } else {
                $query = "SELECT * FROM `product` WHERE `category_id` = '{$_GET['cat']}' LIMIT $current_count,3 ";
            }
    } else {
        $query = "SELECT * FROM `product` LIMIT $current_count,3 ";
    }

    $result = mysqli_query($conn,$query);

    while ($row = $result->fetch_assoc()) {

?>

<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">
        <a href="webPage/product.php?proId=<?php echo $row['id'] ?>" target="_blank"><img class="card-img-top" src="<?php echo $row['image'] ?>" alt=""></a>
        <div class="card-body">
            <h4 class="card-title">
                <a href="#"><?php echo $row['name']?></a>
            </h4>
            
            <h5>LKR <?php echo number_format($row['price'],2); ?></h5>
            
            <p class="card-text"><?php echo $row['description']?></p>
            <?php
                if(isset($_SESSION['current_user'])){
                    echo "<p class='text-success'>Shipping: LKR ".number_format($row['price'],2)."</p>";
                }
                else {
                    echo "<p class='text-success'>Please <a href='webPage/login.php'>login/Signup</a> to show the shipping cost</p>";
                }
            ?>
        </div>
        
        <div class="card-footer" style="text-align: center;">
            <?php
                if(isset($_SESSION['current_user'])){
                    echo "<a href='index.php?add={$row['id']}' class='btn btn-warning mx-2'><i class='fa fa-cart-plus'></i>Add Cart</a>";
                    echo "<a href='buy.php?buy={$row['id']}' class='btn btn-success mx-3'>Buy</a>";
                }
                else {
                    echo "<a href='login.php' class='btn btn-success'>Buy</a>";
                }
            ?>
        </div>
    </div>
</div>

<?php } ?>
              
