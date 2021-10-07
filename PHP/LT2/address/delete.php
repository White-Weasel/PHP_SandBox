<?php
    include "../services.php";
    $service = new UserService();
    $address_sv = new AddressService($service);
    if(isset($_GET["id"])){
        echo $_GET["id"];
        if(is_numeric($_GET["id"])){
            if(!$service->Authenticate()){header("location: /PHP/LT2/login.php?redirect=/PHP/LT2/address/delete.php?id=".$_GET['id']);return;}
            $address_sv->Delete($_GET["id"]);
        }
    }
    header("location: /PHP/LT2/address/home.php");
?>