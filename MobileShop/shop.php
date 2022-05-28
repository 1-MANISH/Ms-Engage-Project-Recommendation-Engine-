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

    <title>Shop | Royal Mobile Shop</title>
</head>

<body>

    <!-- Connect to databse -->
    <?php include "partials/_dbconnect.php";?>

    <!-- Navbar start here -->
    <?php include "partials/_navbar.php";?>
    <!-- Navbar end here -->

    <!-- Shop page Heading shown -->
    <div class="alert alert-secondary my-2" role="alert">
        <h3>
            <p class="text-dark text-center">SHOP </p>
        </h3>
    </div>

    <!-- about that product start-->

    <!-- fetch from DB -->
    <?php

        $prod_id = $_GET['prod_id'];
        $user_id = $_SESSION['user_sno'];

        $sql = "SELECT * FROM `Products` WHERE product_id = '$prod_id'";

        $rejult = mysqli_query($conn,$sql);

        $numRows = mysqli_num_rows($rejult);

        while($row = mysqli_fetch_assoc($rejult)){
                $prod_id = $row['product_id'];
                $prod_name = $row['product_name'];
                $prod_desc = $row['product_desc'];
                $prod_specs = $row['product_spec'];
                $prod_price = $row['product_price'];
                $prod_modal_number = $row['product_modal_number'];
                $prod_added_time = $row['product_added_time'];

                echo '
                <div class="container d-flex">
                    <div class="card mb-3" >
                            <div class="row g-0">
                                <div class="col-md-4">
                                <img src="partials/images/card-1.jpeg" class="img-fluid rounded-start my-3" height="900px" alt="...">
                                </div>
                                <div class="col-md-8">
                                <div class="card-body">
                                    <p class="text-center bg-dark text-light py-3"> DESCRIPTION</p>
                                    <hr noshade>
                                    <h5 class="card-title">'.$prod_name.'</h5>
                                    <p class="card-text">'.$prod_desc.'</p>
                                    <p class="card-text"> Specs - '.$prod_specs.'</p>
                                    <p class="card-text"> Modal Number - '.$prod_modal_number.'</p>
                                    <p class="card-text">Price - '.$prod_price.'</p>
                                    <hr noshade>';
                                    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true && $_SESSION['username'] != "Admin" ){
                                        echo '<div class="btn-group">
                                                <a href="shopcart.php?shopcart=true&prodid='.$prod_id.'&userid='.$user_id.'"><button type="button" class="btn btn-sm btn-outline-dark my-2">ADD TO CART</button></a>
                                             </div> ';
                                    }
                                    else if( $_SESSION['username'] == "Admin"){
                                        echo '
                                        <div class="alert alert-info" role="alert">
                                            You are Admin Man.
                                        </div>';
                                    }
                                    else{
                                        echo '
                                        <div class="alert alert-info" role="alert">
                                            You Have To login or Created account To order something .
                                        </div>';
                                    }
                                    echo '<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
        }
        
    ?>

    <!-- about that product end -->

    <!-- Contact section  start here-->
    <footer class="contact bg-dark" id="Contact">
        <!-- <p class="heading text-center ">
            <i class="fa-solid fa-address-card "></i>
            <span class="text-center">Contact Us</span>
        </p> -->
       
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