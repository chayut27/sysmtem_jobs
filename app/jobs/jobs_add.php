<nav aria-label="breadcrumb" class="mt-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="?page=jobs">งาน</a></li>
            <li class="breadcrumb-item active" aria-current="page">เพิ่มงาน</li>
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
                                เพิ่มงาน
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="../jobs/do_jobs.php" method="POST">
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
                            <?php if ($_SESSION["PERMISSION"] == "ADMINISTRATOR") { ?>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">บริษัท <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="company" id="company" class="form-control" required>
                                            <option value="">-- โปรดเลือก --</option>
                                            <?php
                                                $res = get_company();
                                                $num = 1;
                                                foreach ($res as $row) {
                                                    ?>
                                                <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            <?php } ?>
                            <div id="job_detail">
                                <div class="job">
                                    <div class="form-group row">
                                        <label class="col-md-12 col-form-label bg-light job_row_1">แบบฟอร์มตำแหน่งที่
                                            1</label>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label for="customSwitch1" class="col-12 col-lg-2 col-form-label">สถานะ</label>
                                        <div class="col-6 col-lg-2">
                                            <div class="custom-control custom-radio my-2">
                                                <input type="radio" id="enabled" name="status[]" class="custom-control-input" value="Y" checked>
                                                <label class="custom-control-label" for="enabled">เปิดใช้งาน</label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-2">
                                            <div class="custom-control custom-radio my-2">
                                                <input type="radio" id="disnabled" name="status[]" class="custom-control-input" value="N">
                                                <label class="custom-control-label" for="disnabled">ปิดใช้งาน</label>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">ตำแหน่ง <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name[]" id="name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">ประเภทงาน <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="job_function[]" id="job_function" class="form-control" required>
                                                <option value="">-- โปรดเลือก --</option>
                                                <option value="1">งานประจำ</option>
                                                <option value="2">งานพาร์ทไทม์</option>
                                                <option value="3">ฝึกงาน</option>
                                                <option value="4">ฟรีแลนซ์</option>
                                                <option value="5">ชั่วคราว / สัญญาจ้าง</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">รายละเอียดงาน <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea name="job_detail[]" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">อัตรา <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="person[]" id="person" class="form-control" required>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">ระดับการศึกษา <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="education[]" id="education" class="form-control" required>
                                                <option value="">-- โปรดเลือก --</option>
                                                <option value="1">ต่ำกว่า ปวช.</option>
                                                <option value="2">ปวช. ปวส. อนุปริญญา</option>
                                                <option value="3">ปริญญาตรี</option>
                                                <option value="4">ปริญญาโท</option>
                                                <option value="5">ปริญญาเอก</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">คุณสมบัติ <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea name="qualification[]" id="qualification" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">ประเภท <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="job_type[]" id="job_type" class="form-control" required>
                                                <option value="">-- โปรดเลือก --</option>
                                                <option value="1">งานประจำ</option>
                                                <option value="2">งานพาร์ทไทม์</option>
                                                <option value="3">ฝึกงาน</option>
                                                <option value="4">ฟรีแลนซ์</option>
                                                <option value="5">ชั่วคราว / สัญญาจ้าง</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">เงินเดือนโดยประมาณ <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="salary[]" id="salary" class="form-control" required>
                                                <option value="0">ตามตกลง</option>
                                                <option value="1">ตามประสบการณ์ทำงาน</option>
                                                <option value="2">0-5,000 บาท</option>
                                                <option value="3">5001-10,000 บาท</option>
                                                <option value="4">10,001-15,000 บาท</option>
                                                <option value="5">20,001-25,000 บาท</option>
                                                <option value="6">30,001-50,000 บาท</option>
                                                <option value="7">50,000 ขึ้นไป</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label"></label>
                                <div class="col-md-3 mb-2">
                                    <button type="button" class="btn btn-block btn-primary add"><i class="fa fa-plus"></i>
                                        เพิ่มตำแหน่งงาน</button>

                                    <input type="hidden" id="hdnCount" name="hdnCount" value="1">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button type="button" id="deleteRows" class="btn btn-block btn-danger"><i class="fa fa-remove"></i>
                                        ลบตำแหน่งงาน</button>
                                </div>
                                <div class="col-md-3 mb-2">
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