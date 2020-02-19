<?php

    $conn = mysqli_connect('localhost', 'root', '', 'shoeshop');

    if (!$conn) {
        header('location:webPage/disconnected.php');
        die("Connection failed: " . mysqli_connect_error());
    }

?>