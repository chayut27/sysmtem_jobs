<?php
ob_start();
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

function db_connect(){
    try{
        $connection = new mysqli("localhost", "root", "123456", "system_jobs");
        $connection->set_charset("UTF8");

        return $connection;
    }
    catch(Exception $e){
        echo "Erorer Code : " . $e->getCode() ."<br/>DB Connection Failed: " . $e->getMessage();
        exit();
    }
}

function db_query($connection,$sql){
    try{
        $result = $connection->query($sql);
        return $result;
    }
    catch(Exception $e){
        echo "Erorer Code : " . $e->getCode() ."<br/>DB Query Failed: " . $e->getMessage();
        exit();
    }

    
}

function db_select($connection,$sql){
        $result = db_query($connection,$sql);
        $rows = array();
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }

        if(empty($rows)){
            $rows = null;
        }
        
        return $rows;
}

?>