<nav aria-label="breadcrumb" class="mt-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">ผู้ใช้งาน</li>
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
                                ผู้ใช้งาน
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="?page=users_add" class="badge badge-pill badge-primary"><i class="fa fa-plus"></i>
                                    เพิ่มผู้ใช้งาน</a>
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
                                    <th style="width:10%;">#</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>บริษัท</th>
                                    <th>การอนุญาต</th>
                                    <th class="text-center" style="width:15%;">สถานะ</th>
                                    <th class="text-center" style="width:15%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $req_user = array(
                                    "company" => $_SESSION["COMPANY"],
                                );
                                $res = get_user($req_user);
                                $num = 1;
                                foreach ($res as $row) {
                                    if ($row["status"] == "Y") {
                                        $bg_status = "badge-success";
                                        $status = "เปิดใช้งาน";
                                    } else {
                                        $bg_status = "badge-secondary";
                                        $status = "ปิดใช้งาน";
                                    }

                                    $company = "";

                                    if (!empty($row["company"])) {
                                        $req_company = array(
                                            "id" => $row["company"],
                                        );
                                        $res_company = get_company($req_company);
                                        $company = $res_company[0]["name"];
                                    }


                                    ?>
                                    <tr>
                                        <td scope="row"><?php echo $num; ?>.</td>
                                        <td><?php echo $row["first_name"] . " " . $row["last_name"]; ?></td>
                                        <td><?php echo $company; ?></td>
                                        <td><?php echo $row["permission"]; ?></td>
                                        <td class="text-center"><span class="badge badge-pill <?php echo $bg_status; ?>"><?php echo $status; ?></span></td>
                                        <td class="text-center">
                                            <form method="POST" class="d-inline" action="?page=users_edit">
                                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                                <button title="แก้ไข" class="btn btn-warning btn-sm text-black"><i class="fa fa-edit"></i></button>
                                            </form>
                                            <form method="POST" class="d-inline" action="../users/do_users.php">
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