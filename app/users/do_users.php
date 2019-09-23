<?php
require_once("../../services/services.php");

$req = array(
    "id" => isset($_POST["id"]) ? $_POST["id"] : "",
    "status" => isset($_POST["status"]) ? $_POST["status"] : "",
    "first_name" => isset($_POST["first_name"]) ? $_POST["first_name"] : "",
    "last_name" => isset($_POST["last_name"]) ? $_POST["last_name"] : "",
    "username" => isset($_POST["username"]) ? $_POST["username"] : "",
    "password" => isset($_POST["password"]) ? $_POST["password"] : "",
    "company" => isset($_POST["company"]) ? $_POST["company"] : "",
);


if($_POST["action"] == "created"){
    $res = created_users($req);

    if($res !== false){
        $_SESSION["SUCCESS"] = "เพิ่มข้อมูลสำเร็จ";
        header("location:../dashboard/?page=users");
    }
}else if($_POST["action"] == "updated"){
    $res = updated_users($req);

    if($res !== false){
        $_SESSION["SUCCESS"] = "แก้ไขข้อมูลสำเร็จ";
        header("location:../dashboard/?page=users");
    }
}else if($_POST["action"] == "deleted"){
    $res = deleted_users($req);

    if($res !== false){
        $_SESSION["SUCCESS"] = "ลบข้อมูลสำเร็จ";
        header("location:../dashboard/?page=users");
    }
}


?>