<div class="navbar alert alert-secondary">
    <div class="container-fluid">
        <a href="/MobileShop/"><i class="fa-solid fa-user-secret logo  fa-2x text-dark  "></i></a>
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
                <li class="nav-item">
                    <a class="nav-link <?php if($_GET['shoppage']!=true && $_GET['shopcart']!=true) echo 'active';  ?>" aria-current="page" href="/MobileShop/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($_GET['shoppage']==true) echo 'active';  ?>" href="/MobileShop/">Shop Page</a>
                </li>
                <?php
                    session_start();
                    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true)
                    {
                        if($_GET['shopcart'] == true){
                            echo '
                            <li class="nav-item">
                                <a class="nav-link active" href="/MobileShop/shopcart.php?shopcart=true&userid='.$user_id.' ">Cart</a>
                            </li>
                            ';
                        }
                        else{
                            echo '
                            <li class="nav-item">
                                <a class="nav-link " href="/MobileShop/shopcart.php?shopcart=true&userid='.$user_id.' ">Cart</a>
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
<!-- Navbar end here -->





<!-- <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand mx-4" href="/MobileShop/index.php">Royal Mobile Shop</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success mx-2" type="submit">Search</button>
                
            </form>
        </div>
</nav>;
 -->