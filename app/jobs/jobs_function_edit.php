<?php

$req = array(
    "id" => $_POST["id"],
);

$res = get_jobs_function($req);
if(empty($res)){
    header("location:../dashboard/?page=jobs_function");
}

?>

<nav aria-label="breadcrumb" class="mt-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="?page=jobs_function">ประเภทงาน</a></li>
            <li class="breadcrumb-item active" aria-current="page">แก้ไขประเภทงาน : <?php echo $res[0]["name"];?></li>
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
                                แก้ไขประเภทงาน : <?php echo $res[0]["name"];?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="../jobs/do_jobs_function.php" method="POST">
                        <input type="hidden" name="action" value="updated">
                        <input type="hidden" name="id" value="<?php echo $_POST["id"];?>">
                        <?php if(isset($_SESSION["ERROR"])){ ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $_SESSION["ERROR"];?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php unset($_SESSION["ERROR"]); } ?>
                            <div class="form-group row">
                                <label for="customSwitch1" class="col-12 col-lg-2 col-form-label">สถานะ</label>
                                <div class="col-6 col-lg-2">
                                    <div class="custom-control custom-radio my-2">
                                        <input type="radio" id="enabled" name="status" <?php if($res[0]["status"] == "Y") echo "checked";?> class="custom-control-input" value="Y" checked>
                                        <label class="custom-control-label" for="enabled">เปิดใช้งาน</label>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2">
                                    <div class="custom-control custom-radio my-2">
                                        <input type="radio" id="disnabled" name="status" <?php if($res[0]["status"] == "N") echo "checked";?> class="custom-control-input" value="N">
                                        <label class="custom-control-label" for="disnabled">ปิดใช้งาน</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">ประเภทงาน</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $res[0]["name"];?>" required>
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