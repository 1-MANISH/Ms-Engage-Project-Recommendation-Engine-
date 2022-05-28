
<?php

    // Connect to database
    include "partials/_dbconnect.php";

    // getting things from form

    // Varaible to show message

    $accountCreated = false;
    $showError = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){



        $user_name = $_POST['username'];
        $user_email = $_POST['useremail'];
        $user_password = $_POST['userpassword'];
        $user_cpassword = $_POST['usercpassword'];
        $user_address = $_POST['useraddress'];
        $user_mobile_number = $_POST['usermobilenumber'];

        // Insert data into database if valid

        $sql = "SELECT * FROM `Users` WHERE user_email = '$user_email'";

        $rejult = mysqli_query($conn,$sql);

        $numRow = mysqli_num_rows($rejult);
        
        if($numRow > 0)
        {
            $showError = "User Email already exist.Try with another .";
            $userExist  = true;
        }
        else
        {
            // check is password is matching ot not
            if($user_password == $user_cpassword)
            {
                $hash = password_hash($user_password,PASSWORD_DEFAULT);

                // now insert data into users table as account created succesfully
                $sql_insert = "INSERT INTO `Users` ( `user_email`, `user_name`, `user_password`, `user_address`, `user_mobile_number`, `account_created_time`) VALUES ( '$user_email', '$user_name', '$hash', '$user_address', '$user_mobile_number', current_timestamp())";

                $rejult_insert = mysqli_query($conn,$sql_insert);

                if($rejult_insert){
                    $accountCreated = true;

                    
                    
                    header("Location: /MobileShop/index.php?signSuccess=true");
                    exit();
                }
            }
            else
            {
                $showError = "Password do not match";
            }
        }
        header("Location: /MobileShop/index.php?signSuccess=false&error=$showError");
    }


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- link of cdn font-icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <title>Sign  Page</title>
</head>
<body>
    <!-- Navbar  -->
    <?php include "partials/_navbar.php" ?>

    
    
    <div class="container my-4 ">
        <div class="bg-dark text-secondary px-4 py-5  my-4">
                <h1 class="display-7 fw-bold text-white my-4 text-center">SignUp  </h1>
                <form action="<?php echo  $_SERVER["REQUEST_URI"] ?>" method="post">
                    <div class="mb-3">
                        <label for=username" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="useremail" class="form-label">User Email</label>
                        <input type="email" class="form-control" id="useremail" name="useremail" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="useraddress" class="form-label">Address</label>
                        <textarea class="form-control" id="useraddress" name="useraddress" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="usermobilenumber" class="form-label">Mobile Number</label>
                        <input type="number" class="form-control" id="usermobilenumber" name="usermobilenumber" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="userpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userpassword" name="userpassword" >
                    </div>
                    <div class="mb-3">
                        <label for="usercpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="usercpassword" name="usercpassword" >
                    </div>
                    <button role="submit" class="btn btn-primary" > Register</button>
                </form>
        </div>
    </div>
    <!-- Showing message as per detail -->
    
    
    <!-- bottom -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#273036" fill-opacity="1" d="M0,64L60,69.3C120,75,240,85,360,106.7C480,128,600,160,720,149.3C840,139,960,85,1080,69.3C1200,53,1320,75,1380,85.3L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z" ></path></svg>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>