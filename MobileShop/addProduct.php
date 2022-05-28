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

    <title>ADD-PRODUCT | Royal Mobile Shop</title>
</head>

<body>

    <!-- Connect to databse -->
    <?php include "partials/_dbconnect.php";?>

    <!-- Navbar start here -->
    <?php include "partials/_navbarAdmin.php";?>
    <!-- Navbar end here -->


    <!-- Add Products start here -->

    <?php

        $addProd = false;
        if($_SERVER["REQUEST_METHOD"]  == "POST"){

            // getting data from form and add to DB

            $prod_name = $_POST['productName'];
            $prod_desc = $_POST['productDesc'];
            $prod_specs = $_POST['productSpecs'];
            $prod_cat_id = $_POST['prodCatId'];
            $prod_price = $_POST['productPrice'];
            $prod_mod_number = $_POST['productModalNumber'];

            echo  $prod_cat_id;



            // now add to DB (PRODUCT CATEGORY SECRION)

            $sql = "INSERT INTO `Products` ( `product_name`, `product_desc`, `product_spec`, `product_category_id`, `product_price`, `product_modal_number`, `product_added_time`) VALUES ( '$prod_name', '$prod_desc', '$prod_specs', '$prod_cat_id', '$prod_price', '$prod_mod_number', current_timestamp())";

            $rejult = mysqli_query($conn,$sql);

            if($rejult){
                $addProd = true;
            }

        }

    ?>   

    <div class="container my-4 ">
        <div class="bg-light text-secondary px-4 py-5  my-4">

                <h4 class="display-7 fw-bold text-dark my-4 text-center"> ADD PRODUCTS </h4>

                <form action="<?php echo  $_SERVER["REQUEST_URI"] ?>" method="post">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productName" aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3">
                        <label for="productDesc" class="form-label">Product  Description</label>
                        <textarea class="form-control" id="productDesc" name="productDesc" rows="5" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="productSpecs" class="form-label">Product Specs</label>
                        <input type="text" class="form-control" id="productSpecs" name="productSpecs" aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3">
                        <label for="prodCatId" class="form-label">Select Product Category</label>
                        <select id="prodCatId" class="form-select" name="prodCatId" aria-label="Default select example">
                            <option selected> Select Category -  </option>
                            <option value="1">1-Mobiles</option>
                            <option value="2">2-Laptops</option>
                            <option value="3">3-HeadPhones</option>
                            <option value="4">4-Others</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Product Price</label>
                        <input type="text" class="form-control" id="productPrice" name="productPrice" aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3">
                        <label for="productModalNumber" class="form-label">Product Modal Number</label>
                        <input type="text" class="form-control" id="productModalNumber" name="productModalNumber" aria-describedby="emailHelp" required>
                    </div>

                    
                    <button type="submit" class="btn btn-primary" > SUBMIT </button>
                </form>
        </div>
    </div>
    <!-- Add Products end  here -->
    <?php
        if($addProd){
            echo ' 
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Product  addedd succesfully ...
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    
    ?>


    <!-- Contact section  start here-->
    <footer class="contact bg-dark" id="Contact">
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