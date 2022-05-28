<?php

    session_start();

    session_unset();

    session_destroy();

    header("Location: /MobileShop/index.php?loginSuccess=false");
?>