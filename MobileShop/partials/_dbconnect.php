<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "MobileShop";

    $conn = mysqli_connect($servername,$username,$password,$database);

    if(!$conn){
        echo "Unable to connect with database . Error -".mysqli_connect_error();
    }


?>