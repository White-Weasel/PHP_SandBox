<?php
    include "services.php";
    $service = new UserService();
    $service->Logout();
    header("location: /PHP/LT2/login.php");
?>