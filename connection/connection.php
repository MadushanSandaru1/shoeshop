<?php

    $conn = mysqli_connect('localhost', 'root', '', 'shoeshop');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>