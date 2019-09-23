<?php
require_once("../../services/services.php");

$req = array(
    "username" => $_POST["username"],
    "password" => $_POST["password"],
);

$res = get_user_login($req);
if(!empty($res)){
    header("location:./");
}else{
    $_SESSION["ERROR"] = "Username หรือ Password ไม่ถูกต้อง";
    header("location:./");
}


?>