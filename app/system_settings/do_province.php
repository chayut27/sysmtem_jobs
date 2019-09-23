<?php
require_once("../../services/services.php");

$req = array(
    "id" => isset($_POST["id"]) ? $_POST["id"] : "",
    "status" => isset($_POST["status"]) ? $_POST["status"] : "",
    "name" => isset($_POST["name"]) ? $_POST["name"] : "",
);


if($_POST["action"] == "created"){
    $res = created_province($req);

    if($res !== false){
        $_SESSION["SUCCESS"] = "เพิ่มข้อมูลสำเร็จ";
        header("location:../dashboard/?page=system_province");
    }
}else if($_POST["action"] == "updated"){
    $res = updated_province($req);

    if($res !== false){
        $_SESSION["SUCCESS"] = "แก้ไขข้อมูลสำเร็จ";
        header("location:../dashboard/?page=system_province");
    }
}else if($_POST["action"] == "deleted"){
    $res = deleted_province($req);

    if($res !== false){
        $_SESSION["SUCCESS"] = "ลบข้อมูลสำเร็จ";
        header("location:../dashboard/?page=system_province");
    }
}


?>