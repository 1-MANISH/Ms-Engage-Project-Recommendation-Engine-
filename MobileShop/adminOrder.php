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

    <title>Orders | Royal Mobile Shop</title>
</head>

<body>

    <!-- Connect to databse -->
    <?php include "partials/_dbconnect.php";?>

    <!-- Navbar start here -->
    <?php include "partials/_navbarAdmin.php";?>
    <!-- Navbar end here -->

    <!-- ORDER DETAILS START HERE -->
      <!-- Shop page Heading shown -->
      <div class="alert alert-secondary my-2" role="alert">
        <h3>
            <p class="text-dark text-center">Orders </p>
        </h3>
    </div>

    <!-- Cart table start-->

    <div class="container my-4">
        <!-- table  -->
        <table class=" table  table-condensed table-striped" id="myTable">
            <thead>
                <tr class="table-dark" >
                    <th scope="col">#</th>
                    <th scope="col">Delivery Person name</th>
                    <th scope="col">Delivery Address</th>
                    <th scope="col">Delivery net Total</th>
                    <th scope="col">Delivery City</th>
                    <th scope="col">Delivery Email</th>
                    <th scope="col">Delivery Person Phone</th>
                    <th scope="col">Order day</th>
                    <th scope="col">Status</th>
                   
                </tr>
            </thead>
            <tbody>

                <!-- Fetching corresponding user cart from cart table  -->
                

                <?php

                    $sql_fetch = "SELECT * FROM `Orders` ";
                    $rejult_fetch = mysqli_query($conn,$sql_fetch);
                    $sno = 1;
                    
                    while($row_fetch = mysqli_fetch_assoc($rejult_fetch)){

                        $del_per_name = $row_fetch['delivery_person_name'];
                        $del_per_add = $row_fetch['delivery_person_address'];
                        $del_total = $row_fetch['delivery_net_total'];
                        $del_city = $row_fetch['delivery_city'];
                        $del_per_email = $row_fetch['delivery_person_email'];
                        $del_per_phone = $row_fetch['delivery_person_mobile_number'];
                        $order_day = $row_fetch['order_day'];
                       

                        echo '
                        <tr class="py-4">
                            <th scope="row">'.$sno++.'</th>
                            <td> '. $del_per_name .'</td>
                            <td>'.$del_per_add.'</td>
                            <td>'. $del_total.' RS</td>
                            <td>'  .$del_city.' </td>
                            <td>'. $del_per_email.' </td>
                            <td>'.$del_per_phone .' </td>
                            <td>'.$order_day .' </td>
                            <td><i class="fa-solid fa-truck-fast fs-1"></i></td>
                        </tr>
                        ';

                        $_SESSION['cartTotal'] = $TotalPrice;
                    }


                ?>
                
                
            </tbody>
        </table>
        <hr>
    </div>

    <!-- Cart table end -->

    <!-- ORDER DETAILS ENDS HERE -->

    
    


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