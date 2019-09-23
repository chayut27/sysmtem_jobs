<?php

$req = array(
    "id" => $_SESSION["USER_ID"],
    "company" => $_SESSION["COMPANY"],
);

$res = get_user($req);
if (empty($res)) {
    header("location:../dashboard/");
}

?>
<nav aria-label="breadcrumb" class="mt-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">โปรไฟล์ : <?php echo $res[0]["first_name"]." ".$res[0]["last_name"]; ?></li>
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
                            โปรไฟล์ : <?php echo $res[0]["first_name"]." ".$res[0]["last_name"]; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="../users/do_users_profile.php" method="POST">
                            <input type="hidden" name="action" value="updated_profile">
                            <input type="hidden" name="id" value="<?php echo $_SESSION["USER_ID"]; ?>">
                            <?php if (isset($_SESSION["ERROR"])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo $_SESSION["ERROR"]; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php unset($_SESSION["ERROR"]);
                            } ?>
                            <?php if (isset($_SESSION["SUCCESS"])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $_SESSION["SUCCESS"]; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php unset($_SESSION["SUCCESS"]);
                            } ?>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อ <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="first_name" name="first_name" value="<?php echo $res[0]["first_name"];?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">นามสกุล <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="last_name" name="last_name" value="<?php echo $res[0]["last_name"];?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อผู้ใช้งาน <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="username" name="username" value="<?php echo $res[0]["username"];?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">บริษัท</label>
                                <div class="col-sm-10 my-2">
                                    <?php 
                                    $req_company = array(
                                        "id" => $res[0]["company"],
                                    );
                                    $res_company = get_company($req_company);
                                    echo $res_company[0]["name"];
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">แก้ไขล่าสุดเมื่อ</label>
                                <div class="col-sm-10 my-2">
                                    <?php echo $res[0]["updated_at"];?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">เข้าร่วมเมื่อ</label>
                                <div class="col-sm-10 my-2">
                                    <?php echo $res[0]["created_at"];?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                                <div class="col-12 col-lg-2">
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