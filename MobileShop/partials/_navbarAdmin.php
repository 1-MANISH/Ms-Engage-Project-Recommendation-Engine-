<div class="navbar alert alert-secondary">
    <div class="container-fluid">
        <a href="/MobileShop/adminPanel.php"><i class="fa-solid fa-user-secret logo  fa-2x text-dark  "></i></a>
        <form class="d-flex">

            <?php
                session_start();
                $user_id = $_SESSION['user_sno'];
                if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
                    echo '
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-lg dropdown-toggle rounded-pill" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user rounded-circle"></i> <span class="badge   btn btn-link">'. $_SESSION["username"].'</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/MobileShop/logout.php">Logout</a></li>
                        </ul>
                    </div> ';

                }
                else{
                    echo '
                    <a href="/MobileShop/login.php"><button class="btn btn btn-outline-info mx-2 " type="button">login</button></a>
                    <a href="/MobileShop/signup.php"><button class="btn btn btn-outline-info mx-2" type="button">SignUp</button></a>
                    ';
                }
            ?>

        </form>
    </div>
</div>
<div class="navbar">
    <div class="container-fluid">
        <p class="mx-2 display-6"> <span class="text-danger"> ROYAL </span>MOBILE SHOP</p>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/MobileShop/adminPanel.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/MobileShop/addProductCategory.php?addPage=true">Add Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Orders</a>
                </li> -->
                <?php
                    session_start();

                    if(( !isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != true) || ($_SESSION["username"] != "Admin") ){

                        header("Loaction:/MobileShop/index.php");
                        echo '
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/MobileShop/adminPanel.php">Home</a>
                            </li>';
                    }
                    else if($_SESSION["username"] == "Admin"){
                        if( $_GET['addPage'] != true &&  $_GET['OrderPage'] != true && $_GET['addProd'] != true)
                        {
                            
                                echo '
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="/MobileShop/adminPanel.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="/MobileShop/addProductCategory.php?addPage=true">Add Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="/MobileShop/addProduct.php?addProd=true">Add Product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="/MobileShop/AdminOrder.php?OrderPage=true">Orders</a>
                                </li>
                                ';
                            
                        }else if($_GET['addPage'] == true){
                            echo '
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="page" href="/MobileShop/adminPanel.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/MobileShop/addProductCategory.php?addPage=true">Add Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="/MobileShop/addProduct.php?addProd=true">Add Product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="/MobileShop/AdminOrder.php?OrderPage=true">Orders</a>
                                </li>
                                
                                ';
                        }else if($_GET['addProd'] == true){
                            echo '
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="page" href="/MobileShop/adminPanel.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="/MobileShop/addProductCategory.php?addPage=true">Add Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/MobileShop/addProduct.php?addProd=true">Add Product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="/MobileShop/AdminOrder.php?OrderPage=true">Orders</a>
                                </li>
                                ';
                        }else{
                            echo '
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="page" href="/MobileShop/adminPanel.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="/MobileShop/addProductCategory.php?addPage=true">Add Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="/MobileShop/addProduct.php?addProd=true">Add Product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/MobileShop/AdminOrder.php?OrderPage=true">Orders</a>
                                </li>
                                ';
                        }
                    } 
                ?>

            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>