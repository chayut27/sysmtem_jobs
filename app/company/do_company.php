<?php
require_once("../../services/services.php");
    
$business_type = implode(",",$_POST["business_type"]);


$req = array(
    "id" => isset($_POST["id"]) ? $_POST["id"] : "",
    "status" => isset($_POST["status"]) ? $_POST["status"] : "",
    "company_name" => isset($_POST["company_name"]) ? $_POST["company_name"] : "",
    "business_type" => isset($business_type) ? $business_type : 99,
    "about" => isset($_POST["about"]) ? $_POST["about"] : "",
    "address" => isset($_POST["address"]) ? $_POST["address"] : "",
    "province" => isset($_POST["province"]) ? $_POST["province"] : 0,
    "tel" => isset($_POST["tel"]) ? $_POST["tel"] : "",
    "email" => isset($_POST["email"]) ? $_POST["email"] : "",
    "web_site" => isset($_POST["web_site"]) ? $_POST["web_site"] : "",
    "contact" => isset($_POST["contact"]) ? $_POST["contact"] : "",
);

if($_POST["action"] == "created"){
    $res = created_company($req);

    if($res !== false){
        $_SESSION["SUCCESS"] = "เพิ่มข้อมูลสำเร็จ";
        header("location:../dashboard/?page=company");
    }
}else if($_POST["action"] == "updated"){
    $res = updated_company($req);

    if($res !== false){
        $_SESSION["SUCCESS"] = "แก้ไขข้อมูลสำเร็จ";
        header("location:../dashboard/?page=company");
    }
}else if($_POST["action"] == "deleted"){
    $res = deleted_company($req);

    if($res !== false){
        $_SESSION["SUCCESS"] = "ลบข้อมูลสำเร็จ";
        header("location:../dashboard/?page=company");
    }
}else if($_POST["action"] == "updated_profile"){
    $res = updated_company($req);

    if($res !== false){
        $_SESSION["SUCCESS"] = "แก้ไขข้อมูลสำเร็จ";
        header("location:../dashboard/?page=company_profile");
    }
}


?>