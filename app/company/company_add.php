<nav aria-label="breadcrumb" class="mt-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="?page=company">บริษัท</a></li>
            <li class="breadcrumb-item active" aria-current="page">เพิ่มบริษัท</li>
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
                                เพิ่มบริษัท
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="../company/do_company.php" method="POST">
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
                                        <input type="radio" id="enabled" name="status" value="Y" checked class="custom-control-input">
                                        <label class="custom-control-label" for="enabled">เปิดใช้งาน</label>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2">
                                    <div class="custom-control custom-radio my-2">
                                        <input type="radio" id="disnabled" name="status" value="N" class="custom-control-input">
                                        <label class="custom-control-label" for="disnabled">ปิดใช้งาน</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อบริษัท <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="company_name" name="company_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">ประเภทธุรกิจ</label>
                                <div class="col-sm-10">
                                    <?php
                                    $res = get_business_type();
                                    foreach ($res as $row) {
                                        ?>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" id="business_type_<?php echo $row["id"]; ?>" name="business_type[]" class="custom-control-input" value="<?php echo $row["id"]; ?>">
                                            <label class="custom-control-label" for="business_type_<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">เกี่ยวกับ</label>
                                <div class="col-sm-10">
                                    <textarea id="about" name="about" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">สถานที่ตั้ง <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea id="address" name="address" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">จังหวัด <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="province" id="province" class="form-control" required>
                                        <option value="">-- โปรดเลือก --</option>
                                        <?php
                                        $res = get_province();
                                        foreach ($res as $row) {
                                            ?>
                                            <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">โทรศัพท์ <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="tel" id="tel" name="tel" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">อีเมล์ <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">เว็บไซต์</label>
                                <div class="col-sm-10">
                                    <input type="text" id="web_site" name="web_site" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">สนใจติดต่อคุณ <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="contact" name="contact" class="form-control" required>
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