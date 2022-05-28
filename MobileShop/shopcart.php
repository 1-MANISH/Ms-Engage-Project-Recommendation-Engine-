<!doctype html>
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

    <!-- data tables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>



    <title>ShopCart | Royal Mobile Shop</title>
</head>

<body>

    <!-- Connect to databse -->
    <?php include "partials/_dbconnect.php";?>

    <!-- Navbar start here -->
    <?php include "partials/_navbar.php";?>
    <!-- Navbar end here -->

    <!-- cart table  -->
    <?php

        $user_id = $_GET['userid'];
        $prod_id = $_GET['prodid'];


        $sql2 = "SELECT * FROM `Products` WHERE product_id = '$prod_id' ";
        $rejult2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($rejult2);

        $prod_cat_id = $row2['product_category_id'];

        // insert data into cart table
        $sql_insert = "INSERT INTO `Cart` ( `user_id`, `product_id`, `product_category_id`, `order_timestamp`) VALUES ( '$user_id', '$prod_id', '$prod_cat_id', current_timestamp())";
        $rejult3 = mysqli_query($conn,$sql_insert);

    ?>

    <!-- Shop page Heading shown -->
    <div class="alert alert-secondary my-2" role="alert">
        <h3>
            <p class="text-dark text-center">SHOPING CART </p>
        </h3>
    </div>

    <!-- Cart table start-->

    <div class="container my-4">
        <!-- table  -->
        <table class=" table  table-condensed table-striped" id="myTable">
            <thead>
                <tr class="table-dark" >
                    <th scope="col">S.NO</th>
                    <th scope="col">PRODUCT CATEGORY</th>
                    <th scope="col">PRODUCT</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">TOTAL</th>
                   
                </tr>
            </thead>
            <tbody>

                <!-- Fetching corresponding user cart from cart table  -->
                

                <?php

                    $sql_fetch = "SELECT * FROM `Cart` WHERE `user_id` = '$user_id'";
                    $rejult_fetch = mysqli_query($conn,$sql_fetch);

                    $sno = 1;
                    $TotalPrice = 0 ;
                    while($row_fetch = mysqli_fetch_assoc($rejult_fetch)){

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
                        <tr class="py-4">
                            <th scope="row">'.$sno++.'</th>
                            <td> '.$prod_cat_name .'</td>
                            <td>'.$prod_name .'</td>
                            <td>'.$prod_name.' ('.$prod_specs.')</td>
                            <td>'.$prod_price.' RS</td>
                        </tr>
                        ';

                        $_SESSION['cartTotal'] = $TotalPrice;
                    }


                ?>
                <tr>
                    <td>---------</td>
                    <td>---------</td>
                    <td>---------</td>
                    <td>---------</td>
                    <td>---------</td>
                </tr>
                <tr >
                    <?php 
                        if($TotalPrice == 0){
                            echo ' 
                            <td colspan="2"></td>
                            <td colspan="1">
                                <div class="alert alert-info" role="alert">
                                    No Items Added to cart.
                                </div>
                            </td>
                            <td colspan="2"></td>
                            ';
                        }else{
                            echo '
                                <td colspan="4" class="text-center"><a href="shopingCart.php"><button type="button" class="btn btn-info">PROCEED TO BUY</button></a></td>
                                <td colspan="1">Grand Total  = '. $TotalPrice.' RS   </td>
                                ';
                        }
                    ?>
                    <!-- <td colspan="4" class="text-center"><a href="shopingCart.php"><button type="button" class="btn btn-info">PROCEED TO BUY</button></a></td>
                    <td colspan="1">Grand Total  = <?php echo $TotalPrice.' RS' ?>   </td> -->
                </tr>
                
            </tbody>
        </table>
        <hr>
    </div>

    <!-- Cart table end -->
    
    



    <!-- Contact section  start here-->
    <footer class="contact bg-dark " id="Contact">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#273036" fill-opacity="1" d="M0,96L720,160L1440,96L1440,320L720,320L0,320Z">
            </path>
        </svg>
    </footer>
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
    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->

    <!-- j Query and other things -->
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