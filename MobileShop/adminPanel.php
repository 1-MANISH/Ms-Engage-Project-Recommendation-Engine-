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

    <title>Admin Panel | Royal Mobile Shop</title>
</head>

<body>

    <!-- Connect to databse -->
    <?php include "partials/_dbconnect.php";?>

    <!-- Navbar start here -->
    <?php include "partials/_navbarAdmin.php";?>
    <!-- Navbar end here -->

    



    <!-- slider start here -->
    
    <div id="carouselExampleCaptions" class="carousel slide my-1" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="partials/images/slider-3.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-text-dark">Royal Mobile Shop</h5>
                    <p class="text-text-dark"> Some representative placeholder content for the first slide.</p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <!-- <a href="#"><button type="button" class="btn btn btn-danger btn-lg px-4 me-sm-3 fw-bold">Buy Now</button></a> -->
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="partials/images/slider11.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-text-dark">Royal Mobile Shop</h5>
                    <p class="text-text-dark"> Some representative placeholder content for the first slide.</p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <!-- <a href="#"><button type="button" class="btn btn btn-danger btn-lg px-4 me-sm-3 fw-bold">Buy Now</button></a> -->
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="partials/images/slider22.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-text-dark">Royal Mobile Shop</h5>
                    <p class="text-text-dark"> Some representative placeholder content for the first slide.</p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <!-- <a href="#"><button type="button" class="btn btn btn-danger btn-lg px-4 me-sm-3 fw-bold">Buy Now</button></a> -->
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- slider end here -->

    <!-- product category section start  -->

    <div class="container py-4 ">

        <h3 class="text-center my-4 "><span class="badge bg-dark py-3 text-info">PRODUCTS AVAILABLE</span></h3>

        <div class="row row-cols-1 row-cols-md-3 g-4">

            <!-- Fetching  product category from DB-->

            <?php

                $sql = "SELECT * FROM `ProductCategory`";
                $rejult = mysqli_query($conn,$sql);

                $numRows = mysqli_num_rows($rejult);
                $card_num  = 1;
                while($row = mysqli_fetch_assoc($rejult)){
                    $prod_category_id = $row['product_category_id'];
                    $prod_category_name = $row['product_category_name'];
                    $prod_category_desc = $row['product_category_desc'];
                    $prod_category_added = $row['product_category_added'];
                    
                    echo '
                    <div class="col">
                        <div class="card">
                            <img src="partials/images/card-'.$card_num.'.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"> <a href="#">'.$prod_category_name.'</a> </h5>
                                <p class="card-text">'.substr($prod_category_desc,0,90).'</p>
                                <a href="#" class="btn btn-dark">View Products</a>
                                
                            </div>
                        </div>
                    </div>
                    ';

                    $card_num++;

                }

            ?>

        </div>
    </div>

    <!-- product category section end -->



    <!-- Contact section  start here-->
    <footer class="contact bg-dark" id="Contact">
        <!-- <p class="heading text-center ">
            <i class="fa-solid fa-address-card "></i>
            <span class="text-center">Contact Us</span>
        </p> -->
        <div id="container">
            <div id="box1">
                <font class="top">
                    Contact
                </font>
                <font class="bottom">
                    Lets Do shop from our Mobile shop .. How do you take most of bonus?
                </font>
            </div>
            <div id="box2">
                <ul>
                    <div class="icon-box">
                        <a href="" class="facebook">
                            <div class="icon">
                                <li> <i class="fab fa-facebook"></i></li>
                            </div>
                        </a>
                        <a href="" class="twitter">
                            <div class="icon">
                                <li> <i class="fab fa-twitter"></i></li>
                            </div>
                        </a>
                        <a href="" class="linkedin">
                            <div class="icon">
                                <li> <i class="fab fa-linkedin"></i></li>
                            </div>
                        </a>
                        <a href="" class="youtube">
                            <div class="icon">
                                <li> <i class="fab fa-youtube"></i></li>
                            </div>
                        </a>
                        <a href="" class="envelope">
                            <div class="icon">
                                <li> <i class="fas fa-envelope"></i></li>
                            </div>
                        </a>
                    </div>
                </ul>
            </div>
            <div id="box3">
                <div class="left">
                    <div class="loc"><i class="fas fa-map-marker"></i></div>
                    <div class="detail">
                        <font face="" arial">Loresm Inspum Ltd</font>
                        <font face="" arial">Random street 80,Ghatol,Banswara</font>
                    </div>
                </div>
                <div class="middle">
                    <div class="call"><i class="fas fa-phone"></i></div>
                    <div class="detail">
                        <font face="" arial">Phone</font>
                        <font face="" arial">+91 9956789034</font>
                    </div>
                </div>
                <div class="right">
                    <div class="email"><i class="fas fa-envelope-open-text"></i></div>
                    <div class="detail">
                        <font face="" arial">Email</font>
                        <font face="" arial">office@loreminspum.com</font>
                    </div>
                </div>
            </div>
            <div id="box4">
                <div class="copyright">
                    <font face="arial">
                        Copyright &copy; 2021 All Rights Reserved by <a href="">Royal Mobile Shop</a>
                    </font>
                </div>
            </div>
        </div>
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