<?php
    include "../services.php";
    $service = new UserService();
    if(isset($_GET["id"])){
        echo $_GET["id"];
        if(is_numeric($_GET["id"])){
            if(!$service->Authenticate()){header("location: /PHP/LT2/login.php?redirect=/PHP/LT2/users/delete.php?id=".$_GET['id']);return;}
            if($service->Delete($_GET["id"])){
                if($_SESSION["user_id"]==$_GET["id"]){
                    $service->Logout();
                }
            }
        }
    }
    header("location: /PHP/LT2/users/home.php");
?>