<?php

$req = array(
    "id" => $_POST["id"],
);

$res = get_jobs($req);
if (empty($res)) {
    header("location:../dashboard/?page=jobs");
}

?>
<nav aria-label="breadcrumb" class="mt-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="?page=jobs">งาน</a></li>
            <li class="breadcrumb-item active" aria-current="page">แก้ไขงาน : <?php echo $res[0]["name"]; ?></li>
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
                                แก้ไขงาน : <?php echo $res[0]["name"]; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="../jobs/do_jobs.php" method="POST">
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
                                <label for="staticEmail" class="col-sm-2 col-form-label">ตำแหน่ง <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $res[0]["name"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">ประเภทงาน <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="job_function" id="job_function" class="form-control" required>
                                        <option value="">-- โปรดเลือก --</option>
                                        <?php
                                        $res_jobs_function = get_jobs_function();
                                        foreach ($res_jobs_function as $row) {
                                            ?>
                                            <option value="<?php echo $row["id"];?>" <?php if ($res[0]["jobs_function"] == $row["id"]) {
                                                                echo "selected";
                                                            } ?>><?php echo $row["name"];?></option>
                                        <?php  } ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">รายละเอียดงาน <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea name="job_detail" class="form-control" required><?php echo $res[0]["name"]; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">อัตรา <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="person" id="person" class="form-control" required>
                                        <?php
                                        for ($i = 1; $i <= 20; $i++) {
                                            ?>
                                            <option value="<?php echo $i; ?>" <?php if ($res[0]["person"] == $i) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">ระดับการศึกษา <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="education" id="education" class="form-control" required>
                                        <option value="">-- โปรดเลือก --</option>
                                        <option value="1" <?php if ($res[0]["education"] == 1) {
                                                                echo "selected";
                                                            } ?>>ต่ำกว่า ปวช.</option>
                                        <option value="2" <?php if ($res[0]["education"] == 2) {
                                                                echo "selected";
                                                            } ?>>ปวช. ปวส. อนุปริญญา</option>
                                        <option value="3" <?php if ($res[0]["education"] == 3) {
                                                                echo "selected";
                                                            } ?>>ปริญญาตรี</option>
                                        <option value="4" <?php if ($res[0]["education"] == 4) {
                                                                echo "selected";
                                                            } ?>>ปริญญาโท</option>
                                        <option value="5" <?php if ($res[0]["education"] == 5) {
                                                                echo "selected";
                                                            } ?>>ปริญญาเอก</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">คุณสมบัติ <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea name="qualification" id="qualification" class="form-control" required><?php echo $res[0]["name"]; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">ประเภท <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="job_type" id="job_type" class="form-control" required>
                                        <option value="">-- โปรดเลือก --</option>
                                        <option value="1" <?php if ($res[0]["jobs_type"] == 1) {
                                                                echo "selected";
                                                            } ?>>งานประจำ</option>
                                        <option value="2" <?php if ($res[0]["jobs_type"] == 2) {
                                                                echo "selected";
                                                            } ?>>งานพาร์ทไทม์</option>
                                        <option value="3" <?php if ($res[0]["jobs_type"] == 3) {
                                                                echo "selected";
                                                            } ?>>ฝึกงาน</option>
                                        <option value="4" <?php if ($res[0]["jobs_type"] == 4) {
                                                                echo "selected";
                                                            } ?>>ฟรีแลนซ์</option>
                                        <option value="5" <?php if ($res[0]["jobs_type"] == 5) {
                                                                echo "selected";
                                                            } ?>>ชั่วคราว / สัญญาจ้าง</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">เงินเดือนโดยประมาณ <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="salary" id="salary" class="form-control" required>
                                        <option value="0" <?php if ($res[0]["salary"] == 0) {
                                                                echo "selected";
                                                            } ?>>ตามตกลง</option>
                                        <option value="1" <?php if ($res[0]["salary"] == 1) {
                                                                echo "selected";
                                                            } ?>>ตามประสบการณ์ทำงาน</option>
                                        <option value="2" <?php if ($res[0]["salary"] == 2) {
                                                                echo "selected";
                                                            } ?>>0-5,000 บาท</option>
                                        <option value="3" <?php if ($res[0]["salary"] == 3) {
                                                                echo "selected";
                                                            } ?>>5001-10,000 บาท</option>
                                        <option value="4" <?php if ($res[0]["salary"] == 4) {
                                                                echo "selected";
                                                            } ?>>10,001-15,000 บาท</option>
                                        <option value="5" <?php if ($res[0]["salary"] == 5) {
                                                                echo "selected";
                                                            } ?>>20,001-25,000 บาท</option>
                                        <option value="6" <?php if ($res[0]["salary"] == 6) {
                                                                echo "selected";
                                                            } ?>>30,001-50,000 บาท</option>
                                        <option value="7" <?php if ($res[0]["salary"] == 7) {
                                                                echo "selected";
                                                            } ?>>50,000 ขึ้นไป</option>
                                    </select>
                                </div>
                            </div>
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