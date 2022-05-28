
For inserting data into product_category table

INSERT INTO `ProductCategory` (`product_category_id`, `product_category_name`, `product_category_desc`, `product_category_added`) VALUES ('1', 'Mobile Phones', 'Vast selection of components, accessories, adapters, media drives & more from top brands. Huge Selection. Easy & Fast Delivery. Best Deals. No Cost EMI Available. Great Offers. Top Brands. Low Prices.', current_timestamp());

 
For inserting into product table
INSERT INTO `Products` (`product_id`, `product_name`, `product_desc`, `product_spec`, `product_category_id`, `product_price`, `product_modal_number`, `product_added_time`) VALUES ('1', 'Shop Realme 9 pro', 'Realme narzo 30 5G (Racing Blue, 6GB RAM, 128GB Storage) with No Cost EMI/Additional Exchange Offers\r\nrealme narzo 30 5G (Racing Blue, 6GB RAM, 128GB Storage) with No Cost EMI/Additional Exchange Offersrealme narzo 30 5G (Racing Blue, 6GB RAM, 128GB Storage) with No Cost EMI/Additional Exchange Offers.', '(6GB RAM, 128GB Storage)', '1', '16,999', '9 Pro+ 5G', current_timestamp());


<?php
                session_start();
                $user_id = $_SESSION['user_sno'];
                if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
                    echo '<h3><i class="fa-solid fa-user"></i> <span class="badge  btn btn-link">'. $_SESSION['username'].'</span></h3>';
                    echo ' <a href="/MobileShop/logout.php"><button class="btn btn btn-outline-success mx-2"
                    type="button">Logout</button></a>';
                }
                else{
                    echo '
                    <a href="/MobileShop/login.php"><button class="btn btn btn-outline-info mx-2 " type="button">login</button></a>
                    <a href="/MobileShop/signup.php"><button class="btn btn btn-outline-info mx-2" type="button">SignUp</button></a>
                    ';
                }
            ?>