<?php

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
        <a href="#"><img class="card-img-top" src="<?php echo $row['image'] ?>" alt=""></a>
        <div class="card-body">
            <h4 class="card-title">
                <a href="#"><?php echo $row['name']?></a>
            </h4>
            
            <h5><?php echo 'LKR '.$row['price']?></h5>
            
            <p class="card-text"><?php echo $row['description']?></p>
        </div>
        
        <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        </div>
    </div>
</div>

<?php } ?>
              
