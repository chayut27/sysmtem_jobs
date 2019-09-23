<nav aria-label="breadcrumb" class="mt-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="?page=users">ผู้ใช้งาน</a></li>
            <li class="breadcrumb-item active" aria-current="page">เพิ่มผู้ใช้งาน</li>
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
                                เพิ่มผู้ใช้งาน
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="../users/do_users.php" method="POST">
                            <input type="hidden" name="action" value="created">
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
                                        <input type="radio" id="enabled" name="status" class="custom-control-input" value="Y" checked>
                                        <label class="custom-control-label" for="enabled">เปิดใช้งาน</label>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2">
                                    <div class="custom-control custom-radio my-2">
                                        <input type="radio" id="disnabled" name="status" class="custom-control-input" value="N">
                                        <label class="custom-control-label" for="disnabled">ปิดใช้งาน</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อ <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="first_name" name="first_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">นามสกุล <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="last_name" name="last_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อผู้ใช้งาน <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="username" name="username" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">รหัสผ่าน <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">บริษัท <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="company" id="company" class="form-control" required>
                                        <option value="">-- โปรดเลือก --</option>
                                        <?php
                                        $res = get_company();
                                        foreach ($res as $row) {

                                            ?>
                                            <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
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