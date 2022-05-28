<!DOCTYPE HTML>

<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- link of cdn font-icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- css link -->
        <link rel="stylesheet" href="style.css">

        <style>
                @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

                body {
                    background-color: #ffe8d2;
                    font-family: 'Montserrat', sans-serif;
                }

                .card {
                    border: none;
                }

                .logo {
                    background-color: #eeeeeea8;
                }

                .totals tr td {
                    font-size: 13px;
                }

                .footer {
                    background-color: #eeeeeea8;
                }

                .footer span {
                    font-size: 12px;
                }

                .product-qty span {
                    font-size: 12px;
                    color: #dedbdb;
                }
        </style>

        <title>Order | Royal Mobile Shop</title>
    </head>

    <body>

        <!-- Connect to databse -->
        <?php include "partials/_dbconnect.php" ; ?>

        <!-- Navbar start here -->

        <!-- Navbar end here -->


        <?php

                session_start();

                $cartTotal = $_SESSION['cartTotal'];
                $shipngcharge = 900;

                $user_id = $_SESSION['user_sno'];
                $sql = "SELECT * FROM `Users` WHERE `sno` = '$user_id'";
                $rejult = mysqli_query($conn,$sql);                           
                $row = mysqli_fetch_assoc($rejult);
                $user_name = $row['user_name'];



        ?>

        <!-- receipt start here -->
        <div class="container">
            <div class="container mt-5 mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="text-left logo p-2 px-5 "> <i class="fa-solid fa-cart-arrow-down "></i></div>
                            <div class="invoice p-5">
                                <h5>Your order Confirmed!</h5> 
                                    <span class="font-weight-bold d-block mt-4">Hello,<?php echo $user_name ; ?></span> 
                                    <span>You order has been confirmed and will be shipped in next two days!</span>
                                <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="py-2"> <span class="d-block text-muted">Order Date</span>
                                                        <span><?php  echo $_SESSION['orderDay']; ?></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="py-2"> <span class="d-block text-muted">Order No</span>
                                                        <span><?php  echo "RMS-".$_SESSION['orderNum']; ?></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="py-2"> <span class="d-block text-muted">Payment</span>
                                                        <span><img
                                                                src="https://img.icons8.com/color/48/000000/mastercard.png"
                                                                width="20" /></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="py-2"> <span class="d-block text-muted">Shiping
                                                            Address</span> <span><?php  echo $_SESSION['orderAddress']; ?></span> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="product border-bottom table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <!-- Fetching details from order / cart table  -->

                                            <?php
                                                    session_start();

                                                    $user_id = $_SESSION['user_sno'];
                                                    

                                                    $sql_fetch = "SELECT * FROM `Cart` WHERE `user_id` = '$user_id'";
                                                    $rejult_fetch = mysqli_query($conn,$sql_fetch);
                                
                                                
                                                    $TotalPrice = 0 ;
                                                    while($row_fetch = mysqli_fetch_assoc($rejult_fetch)){
                                
                                                        // $sql = "SELECT * FROM `Users` WHERE sno = '$user_id' ";
                                                        // $rejult = mysqli_query($conn,$sql);
                                                        // $row = mysqli_fetch_assoc($rejult);
                                
                                                        // $delevery_person_name = $row['user_name'];
                                                        // $delevery_person_address = $row['user_address'];
                                                        // $delevery_person_email = $row['user_email'];
                                                        // $delevery_person_mobile_number = $row['user_mobile_number'];
                                
                                
                                                        $prod_id = $row_fetch ['product_id'];
                                
                                                        $sql2 = "SELECT * FROM `Products` WHERE product_id = '$prod_id' ";
                                                        $rejult2 = mysqli_query($conn,$sql2);
                                                        $row2 = mysqli_fetch_assoc($rejult2);
                                                        
                                
                                                        $prod_cat_id = $row2['product_category_id'];
                                
                                                        $prod_name = $row2['product_name'];
                                                        $prod_specs = $row2['product_spec'];
                                                        $prod_price = intval($row2['product_price']);
                                
                                                        // total price of all
                                                        $TotalPrice += intval($prod_price);
                                
                                                        $sql3 = "SELECT * FROM `ProductCategory` WHERE product_category_id = '$prod_cat_id' ";
                                                        $rejult3 = mysqli_query($conn,$sql3);
                                                        $row3= mysqli_fetch_assoc($rejult3);
                                
                                                        $prod_cat_name = $row3['product_category_name'];

                                                        echo '
                                                        <tr>
                                                            <td width="20%"> <img src="https://i.imgur.com/u11K1qd.jpg" width="90">
                                                            </td>
                                                            <td width="60%"> <span class="font-weight-bold">'.$prod_cat_name.'</span>
                                                                <div class="product-qty"> <span class="d-block">'.$prod_name.'</span>
                                                                    <span>'.$prod_specs.'</span>
                                                                </div>
                                                            </td>
                                                            <td width="20%">
                                                                <div class="text-right"> <span class="font-weight-bold">'.$prod_price.' RS </span>
                                                                </div>
                                                            </td>
                                                        </tr>';
                                                    }
                                                ?>


                                            <!-- <tr>
                                                    <td width="20%"> <img src="https://i.imgur.com/SmBOua9.jpg" width="70">
                                                    </td>
                                                    <td width="60%"> <span class="font-weight-bold">Men's Collar T-shirt</span>
                                                        <div class="product-qty"> <span class="d-block">Quantity:1</span>
                                                            <span>Color:Orange</span> </div>
                                                    </td>
                                                    <td width="20%">
                                                        <div class="text-right"> <span class="font-weight-bold">$77.50</span>
                                                        </div>
                                                    </td>
                                                </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row d-flex justify-content-end">
                                    <div class="col-md-5">
                                        <table class="table table-borderless">
                                            <tbody class="totals">
                                                <tr>
                                                    <td>
                                                        <div class="text-left"> <span class="text-muted">Subtotal</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-right">
                                                            <span><?php echo $cartTotal.' RS' ;?> </span> </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="text-left"> <span class="text-muted">Shipping Fee</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-right">
                                                            <span><?php echo $shipngcharge.' RS'; ?> </span> </div>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                                        <td>
                                                            <div class="text-left"> <span class="text-muted">Tax Fee</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="text-right"> <span>$7.65</span> </div>
                                                        </td>
                                                    </tr> -->
                                                <!-- <tr>
                                                        <td>
                                                            <div class="text-left"> <span class="text-muted">Discount</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="text-right"> <span class="text-success">$168.50</span>
                                                            </div>
                                                        </td>
                                                    </tr> -->
                                                <tr class="border-top border-bottom">
                                                    <td>
                                                        <div class="text-left"> <span
                                                                class="font-weight-bold">Subtotal</span> </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-right"> <span
                                                                class="font-weight-bold"><?php echo $cartTotal+$shipngcharge.' RS ' ;?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <p>We will be sending shipping confirmation email when the item shipped successfully!</p>
                                <p class="font-weight-bold mb-0">Thanks for shopping with us!</p> <span>Nike Team</span>
                            </div>
                            <div class="d-flex justify-content-between footer p-3">
                                <span><button class="btn btn-primary btn-sm" onclick="window.print()">PRINT</button></span> <span><?php echo $_SESSION['orderDay']; ?></span>
                                <!-- <span><a href="shopingCart.php"> <button class="btn btn-primary btn-sm" >GO BACK</button></a></span>  -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--   receipt end here -->



        <!-- Contact section  start here-->

        <!-- <footer class="contact bg-dark " id="Contact">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#273036" fill-opacity="1" d="M0,96L720,160L1440,96L1440,320L720,320L0,320Z">
                    </path>
                </svg>
                
            <!-- Contact section  end here-->


        <!-- Last footer -->
        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#273036" fill-opacity="1" d="M0,96L720,160L1440,96L1440,320L720,320L0,320Z">
                </path>
            </svg> -->

        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>                                              
    </body>
</html>