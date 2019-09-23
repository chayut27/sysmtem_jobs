<nav aria-label="breadcrumb" class="mt-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">งาน</li>
        </ol>
    </div>
</nav>


<div id="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                งาน
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="?page=jobs_add" class="badge badge-pill badge-primary"><i class="fa fa-plus"></i>
                                    เพิ่มงาน</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_SESSION["SUCCESS"])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $_SESSION["SUCCESS"]; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php unset($_SESSION["SUCCESS"]);
                        } ?>
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ประเภทงาน</th>
                                    <th>ตำแหน่งงาน</th>
                                    <th>ชื่อบริษัท</th>
                                    <th>จังหวัด</th>
                                    <th>สถานะ</th>
                                    <th>วันที่</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $req_jobs = array(
                                    "company" => $_SESSION["COMPANY"]??0,
                                );
                                $res_jobs = get_jobs($req_jobs);
                                $num = 1;
                                foreach ($res_jobs as $row) {
                                    if ($row["status"] == "Y") {
                                        $bg_status = "badge-success";
                                        $status = "เปิดใช้งาน";
                                    } else {
                                        $bg_status = "badge-secondary";
                                        $status = "ปิดใช้งาน";
                                    }

                                    $req_jobs_function = array(
                                        "id" => $row["jobs_type"],
                                    );
                                    $res_jobs_function = get_jobs_function($req_jobs_function);

                                    $req_company = array(
                                        "id" => $row["company"],
                                    );
                                    $res_company = get_company($req_company);

                                    $req_province = array(
                                        "id" => $res_company[0]["province"],
                                    );
                                    $res_province = get_province($req_province);

                                    ?>
                                    <tr>
                                        <td scope="row"><?php echo $num; ?>.</td>
                                        <td><?php echo $res_jobs_function[0]["name"]; ?></td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><?php echo $res_company[0]["name"]; ?></td>
                                        <td><?php echo $res_province[0]["name"]; ?></td>
                                        <td class="text-center"><span class="badge badge-pill <?php echo $bg_status; ?>"><?php echo $status; ?></span></td>
                                        <td><?php echo $row["created_at"]; ?></td>
                                        <td class="text-center">
                                            <form method="POST" class="d-inline" action="?page=jobs_edit">
                                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                                <button title="แก้ไข" class="btn btn-warning btn-sm text-black"><i class="fa fa-edit"></i></button>
                                            </form>
                                            <form method="POST" class="d-inline" action="../jobs/do_jobs.php">
                                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                                <input type="hidden" name="action" value="deleted">
                                                <button title="ลบ" onClick="return confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่ ?');" class="btn btn-danger btn-sm text-black"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php $num++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>