<?php
require_once("../../services/services.php");

$req = array(
    "id" => isset($_POST["id"]) ? $_POST["id"] : "",
    "first_name" => isset($_POST["first_name"]) ? $_POST["first_name"] : "",
    "last_name" => isset($_POST["last_name"]) ? $_POST["last_name"] : "",
    "username" => isset($_POST["username"]) ? $_POST["username"] : "",
);

if($_POST["action"] == "updated_profile"){
    $res = updated_users_profile($req);

    if($res !== false){
        $_SESSION["SUCCESS"] = "แก้ไขข้อมูลสำเร็จ";
        header("location:../dashboard/?page=users_profile");
    }
}

?>