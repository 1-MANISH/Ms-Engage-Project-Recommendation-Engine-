
<?php

    // Connect to database
    include "partials/_dbconnect.php";

    // getting things from form

    // Varaible to show message

    $LoggedIn = false;
    $showError = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $user_email = $_POST['useremail'];
        $user_password = $_POST['userpassword'];
       
       

        // Insert data into database if valid

        $sql = "SELECT * FROM `Users` WHERE user_email = '$user_email' ";

        $rejult = mysqli_query($conn,$sql);

        $numRow = mysqli_num_rows($rejult);
        
        if($numRow == 1)
        {
            $row = mysqli_fetch_assoc($rejult);

            if(password_verify($user_password,$row['user_password']))
            {
                $LoggedIn = true;

                session_start();


                $_SESSION["loggedIn"] = $LoggedIn;
                $_SESSION["useremail"] = $user_email;
                $_SESSION["username"] = $row['user_name'];
                $_SESSION["user_sno"] = $row['sno'];
                
                if($row['user_name'] == "Admin"){
                    header("Location: /MobileShop/adminPanel.php");
                    exit();
                }
                header("Location: /MobileShop/index.php?loginSuccess=true");
            }
            
        }
        else
        {
            $showError = "Unable to login ..";
            header("Location: /MobileShop/index.php?loginSuccess=false&error=$showError");
        }
        
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

    <title>login Page</title>
</head>
<body>
    <!-- Navbar  -->
    <?php include "partials/_navbar.php" ?>

    <div class="container my-4 ">
        <div class="bg-dark text-secondary px-4 py-5  my-4">
                <h1 class="display-7 fw-bold text-white my-4 text-center">Login  </h1>
                <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="post">
                    
                    <div class="mb-3">Email</label>
                        <input type="email" class="form-control" id="useremail" name="useremail" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="mb-3">
                        <label for="userpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userpassword" name="userpassword" >
                    </div>
                    <button type="submit" class="btn btn-primary" >Login</button>
                </form>
        </div>
    </div>
    <!-- Showing message as per detail -->
    
    
    <!-- bottom -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#273036" fill-opacity="1" d="M0,64L60,69.3C120,75,240,85,360,106.7C480,128,600,160,720,149.3C840,139,960,85,1080,69.3C1200,53,1320,75,1380,85.3L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z" ></path></svg>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
