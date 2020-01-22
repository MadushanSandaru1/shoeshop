<?php

    $conn = mysqli_connect('localhost', 'root', '123', 'shoeshop');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>