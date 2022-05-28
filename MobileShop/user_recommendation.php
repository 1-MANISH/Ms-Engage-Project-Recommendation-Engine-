
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

        <title>Royal Mobile Shop</title>
    </head>

    <body>
        

        <?php

            include "partials/_dbconnect.php";

            // include "partials/_navbar.php";

            include "recommend.php";


            $sql_1111 = "SELECT * FROM `Cart` ";

            $product  = mysqli_query($conn,$sql_1111);

            $matrix  = array();

            while($row = mysqli_fetch_array($product))
            {

                // echo $row['user_id']."---";

                $sql_2222 = "SELECT * FROM `Users` WHERE sno  = '$row[user_id]'";

                $rejultss = mysqli_query($conn,$sql_2222);

                $usernamess = mysqli_fetch_array($rejultss);

                // echo $user̉namess['user_email']."+ <br>";

                $sql_3333 = "SELECT * FROM `Products` WHERE product_id  = '$row[product_id]'";

                $rejultsss = mysqli_query($conn,$sql_3333);

                $productnames = mysqli_fetch_array($rejultsss);

                // genrated random rating 

                $matrix[$usernamess['user_name']][$productnames['product_name']] = rand(1,5);
            
            }

            echo "<pre>";

            print_r($matrix);

            echo "</pre>";


            var_dump(getRecommendation($matrix,"man1"));

        ?>

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

