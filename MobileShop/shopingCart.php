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



    <title>Shoping Cart | Royal Mobile Shop</title>
</head>

<body>

    <!-- Connect to databse -->
    <?php include "partials/_dbconnect.php";?>

    <!-- Navbar start here -->
    <?php include "partials/_navbar.php";?>
    <!-- Navbar end here -->

    <!-- handled order from user's -->
    <?php

        

        
    ?>

    <!-- Shop page Heading shown -->
    <div class="alert alert-secondary my-2" role="alert">
        <h3>
            <p class="text-dark text-center">SHOPING CART </p>
        </h3>
    </div>

    <!-- Cart table start-->

    <div class="container my-4">
        <p class="text-center text-danger my-4"><b>YOUR ORDER </b> </p>
        <!-- table  -->
        <table class=" table table-condensed  table-bordered table-striped " id="myTable">
            
            <thead>
                <tr class="table-primary" >
                    <th scope="col" colspan="3">&nbsp;</th>
                </tr>
            </thead>
            <tbody>

                <!-- Fetching corresponding  cart_total from cart table  -->
                

                <?php

                    session_start();

                    $cartTotal = $_SESSION['cartTotal'];
                    $shipngcharge = 900;

                  
                ?>
                <tr>
                    <th colspan="2" class="text-center">Cart Total  </th>
                    <td  class="text-center"><?php echo $cartTotal.' RS '?></td>
                </tr>
                <tr>
                    <th colspan="2" class="text-center">Shipping Total   </th>
                    <td  class="text-center"><?php echo $shipngcharge.' RS '?></td>
                </tr>
                <tr>
                    <th colspan="2" class="text-center">Order Total   </th>
                    <td  class="text-center"><?php echo $cartTotal+$shipngcharge.' RS '?></td>
                </tr>
                
            </tbody>
        </table>
        <hr>
    </div>

    <!-- Cart table end -->

    <!-- Handled form to subimit -->
    <?php

   

        $cartTotal = $_SESSION['cartTotal'];
        $shipngcharge = 900;

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // fetching data from form
            $del_per_fname = $_POST['firstname'];
            $del_per_lname = $_POST['lastname'];

            $del_person_fullname = $del_per_fname."  ".$del_per_lname;

            $del_per_address = $_POST['address'];
            $del_city = $_POST['city'];
            $del_per_mob_number = $_POST['mobilenumber'];
            $del_per_email = $_POST['email'];

            $del_net_total = $cartTotal+$shipngcharge;

            // insert into Orders table

            $sql_insert = "INSERT INTO `Orders` ( `delivery_person_name`, `delivery_person_address`, `delivery_net_total`, `delivery_city`, `delivery_person_email`, `delivery_person_mobile_number`, `order_day`) VALUES ( '$del_person_fullname', '$del_per_address', '$del_net_total', '$del_city', '$del_per_email', '$del_per_mob_number', current_timestamp())";

            $rejult = mysqli_query($conn,$sql_insert);
            
            if(!$rejult){
                echo mysqli_error($conn);
               
            }else{

                $sql_1 = "SELECT * FROM `Orders`";
                $rejult_1 = mysqli_query($conn,$sql_1);
                $num_orders = mysqli_num_rows($rejult_1);

                $order_date = "";
                $order_address = "";
                while($row = mysqli_fetch_assoc($rejult_1)){
                    $order_date = $row['order_day'];
                    $order_address = $row['delivery_person_address'];
                }

                $_SESSION['orderNum'] =  $num_orders;
                $_SESSION['orderDay'] =  $order_date;
                $_SESSION['orderAddress'] =  $order_address;

                header("Location: /MobileShop/Order.php");
                echo '
                <div class="container text-center">
                    <a href="Order.php"><button type="button" class="btn btn-success">Genrate Receipt</button></a>
                </div>';
               
            }          
        }
    ?>
    <!-- BILLING DETAIL SECTION STARTS HERE -->
    
    <div class="container my-4 ">
        <div class="bg-light text-secondary px-4 py-5  my-4">

                <h4 class="display-7 fw-bold text-dark my-4">BILLING DETAIL - </h4>

                <form action="<?php echo  $_SERVER["REQUEST_URI"] ?>" method="post">
                    <div class="mb-3">
                        <label for=firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id=city" name="city" aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label"> Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3">
                        <label for="mobilenumber" class="form-label">Mobile Number</label>
                        <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" aria-describedby="emailHelp" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" > SUBMIT </button>
                </form>
        </div>
    </div>
    <!-- BILLING DETAIL SECTION ENDS HERE -->



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