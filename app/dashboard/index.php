<?php
require_once("../../services/services.php");
if (empty($_SESSION["USER_ID"])) {
    include("./login.php");
    exit();
}

// $RequestSignature = md5($_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING'].print_r($_POST, true));
// if ($_SESSION['LastRequest'] == $RequestSignature)
// {
//     header("location:./");
//     $_SESSION['LastRequest'] = null;
// }
// else
// {
//   $_SESSION['LastRequest'] = $RequestSignature;
// }

$page = isset($_GET["page"]) ? $_GET["page"] : "dashboard";
// if ($_SESSION["PERMISSION"] == "ADMINISTRATOR") {
    if ($page != "dashboard" && $page != "jobs" && $page != "jobs_add" && $page != "jobs_edit" && $page != "jobs_function" && $page != "jobs_function_add" && $page != "jobs_function_edit" && $page != "company" && $page != "company_profile" && $page != "company_add" && $page != "company_edit" && $page != "company_business_type" && $page != "company_business_type_add" && $page != "company_business_type_edit" && $page != "system_province" && $page != "system_province_add" && $page != "system_province_edit" && $page != "users_profile" && $page != "users" && $page != "users_add" && $page != "users_edit") {
        header("location:404.php");
        exit();
    }
// }else{
//     if ($page != "dashboard" && $page != "jobs" && $page != "jobs_add" && $page != "jobs_function" && $page != "jobs_function_add" && $page != "jobs_function_edit" && $page != "company" && $page != "company_add" && $page != "company_business_type" && $page != "company_business_type_add" && $page != "company_province" && $page != "company_province_add") {
//         header("location:404.php");
//         exit();
//     }
// }
$ex_page = explode("_", $page);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CWCODING</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/w/bs4-4.1.1/dt-1.10.18/r-2.2.2/datatables.min.css" />
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body class="d-flex flex-column">
    <?php include("../../include/navbar.php"); ?>

    <?php
    if ($page == "dashboard") {
        ?>
        <div id="page-content" class="mt-4">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="font-weight-light mt-4">ยินดีต้อนรับคุณ <?php echo $_SESSION["FIRSTNAME"]." ".$_SESSION["LASTNAME"];?></h1>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php } elseif ($ex_page[0] == "system") {
        include("../" . $ex_page[0] . "_settings/" . $page . ".php");
    } else {
        include("../" . $ex_page[0] . "/" . $page . ".php");
    } ?>

    <?php include("../../include/footer.php"); ?>

    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/w/bs4-4.1.1/dt-1.10.18/r-2.2.2/datatables.min.js"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(700, 0).slideUp(1000, function() {
                $(this).remove()
            })
        }, 2e3)
    </script>
    <?php if ($ex_page[0] == "system") { ?>
        <script src="<?php echo "../" . $ex_page[0] . "_settings/js/" . $page . ".js";  ?>"></script>
    <?php } else { ?>
        <script src="<?php echo "../" . $ex_page[0] . "/js/" . $page . ".js";  ?>"></script>
    <?php } ?>
</body>

</html>