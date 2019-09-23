<?php
require_once("../../services/services.php");

if($_SESSION["PERMISSION"] == "ADMINISTRATOR"){
    $company = $_POST["company"]??0;
}else{
    $company = $_SESSION["COMPANY"]??0;
}

$user_id = $_SESSION["USER_ID"];


// echo "<pre>";
// echo $sql;
// echo "</pre>";
// exit();


if($_POST["action"] == "created"){
    $req = array(
        "hdnCount" => isset($_POST["hdnCount"]) ? $_POST["hdnCount"] : "",
        "name" => isset($_POST["name"]) ? $_POST["name"] : "",
        "job_function" => isset($_POST["job_function"]) ? $_POST["job_function"] : 0,
        "detail" => isset($_POST["job_detail"]) ? $_POST["job_detail"] : "",
        "person" => isset($_POST["person"]) ? $_POST["person"] : "",
        "education" => isset($_POST["education"]) ? $_POST["education"] : 0,
        "qualification" => isset($_POST["qualification"]) ? $_POST["qualification"] : "",
        "job_type" => isset($_POST["job_type"]) ? $_POST["job_type"] : 0,
        "salary" => isset($_POST["salary"]) ? $_POST["salary"] : 0,
        "company" => $company,
        "user_id" => $user_id,
    );
    $res = created_jobs($req);

    if($res !== false){
        $_SESSION["SUCCESS"] = "เพิ่มข้อมูลสำเร็จ";
        header("location:../dashboard/?page=jobs");
    }
}else if($_POST["action"] == "updated"){
    $req = array(
        "id" => isset($_POST["id"]) ? $_POST["id"] : "",
        "status" => isset($_POST["status"]) ? $_POST["status"] : "",
        "name" => isset($_POST["name"]) ? $_POST["name"] : "",
        "job_function" => isset($_POST["job_function"]) ? $_POST["job_function"] : 0,
        "detail" => isset($_POST["job_detail"]) ? $_POST["job_detail"] : "",
        "person" => isset($_POST["person"]) ? $_POST["person"] : "",
        "education" => isset($_POST["education"]) ? $_POST["education"] : 0,
        "qualification" => isset($_POST["qualification"]) ? $_POST["qualification"] : "",
        "job_type" => isset($_POST["job_type"]) ? $_POST["job_type"] : 0,
        "salary" => isset($_POST["salary"]) ? $_POST["salary"] : 0,
    );
    $res = updated_jobs($req);

    if($res !== false){
        $_SESSION["SUCCESS"] = "แก้ไขข้อมูลสำเร็จ";
        header("location:../dashboard/?page=jobs");
    }
}else if($_POST["action"] == "deleted"){
    $req = array(
        "id" => isset($_POST["id"]) ? $_POST["id"] : "",
    );
    $res = deleted_jobs($req);

    if($res !== false){
        $_SESSION["SUCCESS"] = "ลบข้อมูลสำเร็จ";
        header("location:../dashboard/?page=jobs");
    }
}


?>