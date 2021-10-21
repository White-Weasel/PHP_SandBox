<?php
    include "../services.php";
    $service = new UserService();
    if(!$service->Authenticate()){header("location: /login.php");return;}

    if(isset($_GET["id"])){
        if(is_numeric($_GET["id"])){
            if($service->Delete($_GET["id"])){
                if($_SESSION["user_id"]==$_GET["id"]){
                    $service->Logout();
                }
            }
        }
    }
    header("location: /PHP/LT2/users/home.php");
?>