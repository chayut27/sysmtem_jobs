<?php
require_once("../../db_function/db_function.php");
$connection = db_connect();

function get_user_login($req)
{
    global $connection;

    $sql = "SELECT `id`, `username`, `first_name`, `last_name`, `company`, `permission` FROM `users` WHERE `username` = '" . $req["username"] . "' AND `password` = '" . $req["password"] . "' AND status = 'Y' ";
    $result = db_select($connection, $sql);
    if (!empty($result)) {
        $_SESSION["USER_ID"] = $result[0]["id"];
        $_SESSION["USERNAME"] = $result[0]["username"];
        $_SESSION["FIRSTNAME"] = $result[0]["first_name"];
        $_SESSION["LASTNAME"] = $result[0]["last_name"];
        $_SESSION["COMPANY"] = $result[0]["company"];
        $_SESSION["PERMISSION"] = $result[0]["permission"];
    }

    return $result;
}

function created_jobs_function($req)
{
    global $connection;

    $status = $connection->real_escape_string($req["status"]);
    $name = $connection->real_escape_string($req["name"]);

    $sql = "INSERT INTO `jobs_function` (`status`, `name`) VALUES ('" . $req["status"] . "','" . $req["name"] . "')";
    $result = db_query($connection, $sql);

    return null;
}


function updated_jobs_function($req)
{
    global $connection;

    $status = $connection->real_escape_string($req["status"]);
    $name = $connection->real_escape_string($req["name"]);

    $sql = "UPDATE `jobs_function` SET `status` = '" . $req["status"] . "', `name` = '" . $req["name"] . "' WHERE id = '" . $req["id"] . "'";
    $result = db_query($connection, $sql);

    return null;
}

function deleted_jobs_function($req)
{
    global $connection;

    $status = $connection->real_escape_string($req["status"]);
    $name = $connection->real_escape_string($req["name"]);

    $sql = "DELETE FROM `jobs_function` WHERE id = '" . $req["id"] . "'";
    $result = db_query($connection, $sql);

    return null;
}

function get_jobs_function($req = null)
{
    global $connection;

    if (!empty($req["id"])) {
        $id = $req["id"];
    }

    $sql = "SELECT `id`, `name`, `status` FROM `jobs_function` ";
    if (!empty($req["id"])) {
        $sql .= "WHERE id = '" . $id . "' ";
    }
    $result = db_select($connection, $sql);
    $rows = array();
    if (!empty($result)) {
        foreach ($result as $row) {
            $rows[] = $row;
        }
    }

    return $rows;
}

function created_province($req)
{
    global $connection;

    $status = $connection->real_escape_string($req["status"]);
    $name = $connection->real_escape_string($req["name"]);

    $sql = "INSERT INTO `province` (`status`, `name`) VALUES ('" . $req["status"] . "','" . $req["name"] . "')";
    $result = db_query($connection, $sql);

    return null;
}

function updated_province($req)
{
    global $connection;

    $status = $connection->real_escape_string($req["status"]);
    $name = $connection->real_escape_string($req["name"]);

    $sql = "UPDATE `province` SET `status` = '" . $req["status"] . "', `name` = '" . $req["name"] . "' WHERE id = '" . $req["id"] . "'";
    $result = db_query($connection, $sql);

    return null;
}

function deleted_province($req)
{
    global $connection;

    $status = $connection->real_escape_string($req["status"]);
    $name = $connection->real_escape_string($req["name"]);

    $sql = "DELETE FROM `province` WHERE id = '" . $req["id"] . "'";
    $result = db_query($connection, $sql);

    return null;
}

function get_province($req = null)
{
    global $connection;

    if (!empty($req["id"])) {
        $id = $req["id"];
    }

    $sql = "SELECT `id`, `name`, `status` FROM `province` ";
    if (!empty($req["id"])) {
        $sql .= "WHERE id = '" . $id . "' ";
    }
    $result = db_select($connection, $sql);
    $rows = array();
    if (!empty($result)) {
        foreach ($result as $row) {
            $rows[] = $row;
        }
    }

    return $rows;
}

function created_business_type($req)
{
    global $connection;

    $status = $connection->real_escape_string($req["status"]);
    $name = $connection->real_escape_string($req["name"]);

    $sql = "INSERT INTO `business_type` (`status`, `name`) VALUES ('" . $req["status"] . "','" . $req["name"] . "')";
    $result = db_query($connection, $sql);

    return null;
}

function updated_business_type($req)
{
    global $connection;

    $status = $connection->real_escape_string($req["status"]);
    $name = $connection->real_escape_string($req["name"]);

    $sql = "UPDATE `business_type` SET `status` = '" . $req["status"] . "', `name` = '" . $req["name"] . "' WHERE id = '" . $req["id"] . "'";
    $result = db_query($connection, $sql);

    return null;
}

function deleted_business_type($req)
{
    global $connection;

    $status = $connection->real_escape_string($req["status"]);
    $name = $connection->real_escape_string($req["name"]);

    $sql = "DELETE FROM `business_type` WHERE id = '" . $req["id"] . "'";
    $result = db_query($connection, $sql);

    return null;
}

function get_business_type($req = null)
{
    global $connection;

    if (!empty($req["id"])) {
        $id = $req["id"];
    }

    $sql = "SELECT `id`, `name`, `status` FROM `business_type` ";
    if (!empty($req["id"])) {
        $sql .= "WHERE id = '" . $id . "' ";
    }
    $result = db_select($connection, $sql);
    $rows = array();
    if (!empty($result)) {
        foreach ($result as $row) {
            $rows[] = $row;
        }
    }

    return $rows;
}

function created_company($req)
{
    global $connection;

    if (!empty($req["status"])) {
        $req["status"] = $connection->real_escape_string($req["status"]);
    }
    if (!empty($req["company_name"])) {
        $req["company_name"] = $connection->real_escape_string($req["company_name"]);
    }
    if (!empty($req["about"])) {
        $req["about"] = $connection->real_escape_string($req["about"]);
    }
    if (!empty($req["address"])) {
        $req["address"] = $connection->real_escape_string($req["address"]);
    }
    if (!empty($req["tel"])) {
        $req["tel"] = $connection->real_escape_string($req["tel"]);
    }
    if (!empty($req["email"])) {
        $req["email"] = $connection->real_escape_string($req["email"]);
    }
    if (!empty($req["web_site"])) {
        $req["web_site"] = $connection->real_escape_string($req["web_site"]);
    }
    if (!empty($req["contact"])) {
        $req["contact"] = $connection->real_escape_string($req["contact"]);
    }


    $sql = "INSERT INTO `company` (`status`, `name`, `business_type`, `about`, `address`, `province`, `tel`, `email`, `web_site`, `contact`, `updated_at`, `created_at`) VALUES ('" . $req["status"] . "','" . $req["company_name"] . "','" . $req["business_type"] . "','" . $req["about"] . "','" . $req["address"] . "','" . $req["province"] . "','" . $req["tel"] . "','" . $req["email"] . "','" . $req["web_site"] . "','" . $req["contact"] . "',now(),now())";
    $result = db_query($connection, $sql);

    return null;
}

function updated_company($req)
{
    global $connection;

    if (!empty($req["status"])) {
        $req["status"] = $connection->real_escape_string($req["status"]);
    }
    if (!empty($req["company_name"])) {
        $req["company_name"] = $connection->real_escape_string($req["company_name"]);
    }
    if (!empty($req["about"])) {
        $req["about"] = $connection->real_escape_string($req["about"]);
    }
    if (!empty($req["address"])) {
        $req["address"] = $connection->real_escape_string($req["address"]);
    }
    if (!empty($req["tel"])) {
        $req["tel"] = $connection->real_escape_string($req["tel"]);
    }
    if (!empty($req["email"])) {
        $req["email"] = $connection->real_escape_string($req["email"]);
    }
    if (!empty($req["web_site"])) {
        $req["web_site"] = $connection->real_escape_string($req["web_site"]);
    }
    if (!empty($req["contact"])) {
        $req["contact"] = $connection->real_escape_string($req["contact"]);
    }

    $sql = "UPDATE `company` SET `status` = '" . $req["status"] . "', `name` = '" . $req["company_name"] . "', `business_type` = '" . $req["business_type"] . "', `about` = '" . $req["about"] . "', `address` = '" . $req["address"] . "', `province` = '" . $req["province"] . "', `tel` = '" . $req["tel"] . "', `email` = '" . $req["email"] . "', `web_site` = '" . $req["web_site"] . "', `contact` = '" . $req["contact"] . "', `updated_at` = now() WHERE id = '" . $req["id"] . "'";
    $result = db_query($connection, $sql);

    return null;
}

function deleted_company($req)
{
    global $connection;

    $status = $connection->real_escape_string($req["status"]);
    $name = $connection->real_escape_string($req["name"]);

    $sql = "DELETE FROM `company` WHERE id = '" . $req["id"] . "'";
    $result = db_query($connection, $sql);

    return null;
}

function get_company($req = null)
{
    global $connection;

    if (!empty($req["id"])) {
        $id = $req["id"];
    }

    $sql = "SELECT `id`, `name`, `status`, `business_type`, `about`, `address`, `province`, `tel`, `email`, `web_site`, `contact`, `updated_at`, `created_at` FROM `company` ";
    if (!empty($req["id"])) {
        $sql .= "WHERE id = '" . $id . "' ";
    }
    $result = db_select($connection, $sql);
    $rows = array();
    if (!empty($result)) {
        foreach ($result as $row) {
            $rows[] = $row;
        }
    }

    return $rows;
}

function created_jobs($req)
{
    global $connection;

    $values = "";
    for ($i = 0; $i < $req["hdnCount"]; $i++) {
        $values .= "('" . $req["name"][$i] . "','" . $req["job_function"][$i] . "','" . $req["detail"][$i] . "','" . $req["person"][$i] . "','" . $req["education"][$i] . "','" . $req["qualification"][$i] . "','" . $req["job_type"][$i] . "','" . $req["salary"][$i] . "','" . $req["company"] . "','" . $req["user_id"] . "',now(),now()),";
    }

    $values = substr($values, 0, -1);
    $sql = "INSERT INTO `jobs` (`name`, `jobs_function`, `detail`, `person`, `education`, `qualification`, `jobs_type`, `salary`, `company`, `user_id`, `updated_at`, `created_at`) VALUES $values ";
    $result = db_query($connection, $sql);

    return null;
}

function updated_jobs($req)
{
    global $connection;

    $sql = "UPDATE `jobs` SET `status` = '" . $req["status"] . "', `name` = '" . $req["name"] . "', `jobs_function` = '" . $req["job_function"] . "', `detail` = '" . $req["detail"] . "', `person` = '" . $req["person"] . "', `education` = '" . $req["education"] . "', `qualification` = '" . $req["qualification"] . "', `jobs_type` = '" . $req["job_type"] . "', `salary` = '" . $req["salary"] . "', `updated_at` = now() WHERE id = '" . $req["id"] . "'";
    $result = db_query($connection, $sql);

    return null;
}

function deleted_jobs($req)
{
    global $connection;

    $sql = "DELETE FROM `jobs` WHERE id = '" . $req["id"] . "'";
    $result = db_query($connection, $sql);

    return null;
}

function get_jobs($req = null)
{
    global $connection;

    if (!empty($req["id"])) {
        $id = $req["id"];
    }

    
    $condition = true;
    $sql = "SELECT * FROM `jobs` ";
    if (!empty($req["id"])) {
        $sql .= "WHERE id = '" . $id . "' ";
        $condition = false;
    }
    if (!empty($req["company"])) {
        if($condition === true){
            $sql .= " WHERE ";
        }else{
            $sql .= " AND ";
        }
        $sql .= " company = '" . $req["company"] . "' ";
    }
    $result = db_select($connection, $sql);
    $rows = array();
    if (!empty($result)) {
        foreach ($result as $row) {
            $rows[] = $row;
        }
    }

    return $rows;
}

function get_user($req = null)
{
    global $connection;

    if (!empty($req["id"])) {
        $id = $req["id"];
    }

    
    $condition = true;
    $sql = "SELECT * FROM `users` ";
    if (!empty($req["id"])) {
        $sql .= "WHERE id = '" . $id . "' ";
        $condition = false;
    }
    if (!empty($req["company"])) {
        if($condition === true){
            $sql .= " WHERE ";
        }else{
            $sql .= " AND ";
        }
        $sql .= " company = '" . $req["company"] . "' ";
    }
    $result = db_select($connection, $sql);
    $rows = array();
    if (!empty($result)) {
        foreach ($result as $row) {
            $rows[] = $row;
        }
    }

    return $rows;
}

function updated_users_profile($req)
{
    global $connection;

    $sql = "UPDATE `users` SET `first_name` = '" . $req["first_name"] . "', `last_name` = '" . $req["last_name"] . "', `username` = '" . $req["username"] . "', `updated_at` = now() WHERE id = '" . $req["id"] . "'";
    $result = db_query($connection, $sql);

    $_SESSION["USERNAME"] = $req["username"];
    $_SESSION["FIRSTNAME"] = $req["first_name"];
    $_SESSION["LASTNAME"] = $req["last_name"];

    return null;
}

function created_users($req)
{
    global $connection;

    $status = $connection->real_escape_string($req["status"]);
    $name = $connection->real_escape_string($req["name"]);

    $sql = "INSERT INTO `users` (`status`, `first_name`, `last_name`, `username`, `password`, `company`, `updated_at`, `created_at`) VALUES ('" . $req["status"] . "','" . $req["first_name"] . "','" . $req["last_name"] . "','" . $req["username"] . "','" . $req["password"] . "','" . $req["company"] . "',now(),now())";
    $result = db_query($connection, $sql);

    return null;
}

function updated_users($req)
{
    global $connection;

    $status = $connection->real_escape_string($req["status"]);
    $name = $connection->real_escape_string($req["name"]);

    $sql = "UPDATE `users` SET `status` = '" . $req["status"] . "', `first_name` = '" . $req["first_name"] . "', `last_name` = '" . $req["last_name"] . "', `company` = '" . $req["company"] . "', `updated_at` = now() WHERE id = '" . $req["id"] . "'";
    $result = db_query($connection, $sql);

    return null;
}

function deleted_users($req)
{
    global $connection;

    $sql = "DELETE FROM `users` WHERE id = '" . $req["id"] . "'";
    $result = db_query($connection, $sql);

    return null;
}


