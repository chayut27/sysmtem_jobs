<?php

$req = array(
    "id" => $_POST["id"],
);

$res = get_user($req);
if (empty($res)) {
    header("location:../dashboard/?page=jobs_function");
}

?>

<nav aria-label="breadcrumb" class="mt-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="?page=system_province">ผู้ใช้งาน</a></li>
            <li class="breadcrumb-item active" aria-current="page">แก้ไขผู้ใช้งาน : <?php echo $res[0]["first_name"] . " " . $res[0]["last_name"]; ?></li>
        </ol>
    </div>
</nav>


<div id="page-content" class="mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                แก้ไขผู้ใช้งาน : <?php echo $res[0]["first_name"] . " " . $res[0]["last_name"]; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="../users/do_users.php" method="POST">
                            <input type="hidden" name="action" value="updated">
                            <input type="hidden" name="id" value="<?php echo $_POST["id"]; ?>">
                            <?php if (isset($_SESSION["ERROR"])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo $_SESSION["ERROR"]; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php unset($_SESSION["ERROR"]);
                            } ?>
                            <div class="form-group row">
                                <label for="customSwitch1" class="col-12 col-lg-2 col-form-label">สถานะ</label>
                                <div class="col-6 col-lg-2">
                                    <div class="custom-control custom-radio my-2">
                                        <input type="radio" id="enabled" name="status" <?php if ($res[0]["status"] == "Y") echo "checked"; ?> class="custom-control-input" value="Y" checked>
                                        <label class="custom-control-label" for="enabled">เปิดใช้งาน</label>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2">
                                    <div class="custom-control custom-radio my-2">
                                        <input type="radio" id="disnabled" name="status" <?php if ($res[0]["status"] == "N") echo "checked"; ?> class="custom-control-input" value="N">
                                        <label class="custom-control-label" for="disnabled">ปิดใช้งาน</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อ <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="first_name" name="first_name" value="<?php echo $res[0]["first_name"]; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">นามสกุล <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="last_name" name="last_name" value="<?php echo $res[0]["last_name"]; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อผู้ใช้งาน <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="username" name="username" value="<?php echo $res[0]["username"]; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">บริษัท <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <?php
                                    $res_company = get_company();
                                    ?>
                                    <select name="company" id="company" class="form-control" required>
                                        <option value="">-- โปรดเลือก --</option>
                                        <?php
                                        foreach ($res_company as $row) {

                                            ?>
                                            <option value="<?php echo $row["id"]; ?>" 
                                            <?php if ($row["id"] == $res[0]["company"]) {
                                                 echo "selected";
                                            } ?>><?php echo $row["name"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-block btn-success"><i class="fa fa-save"></i>
                                        บันทึก</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>