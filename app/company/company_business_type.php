<nav aria-label="breadcrumb" class="mt-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">ประเภทธุรกิจ</li>
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
                                ประเภทธุรกิจ
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="?page=company_business_type_add" class="badge badge-pill badge-primary"><i class="fa fa-plus"></i>
                                    เพิ่มประเภทธุรกิจ</a>
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
                                    <th>ประเภทธุรกิจ</th>
                                    <th>สถานะ</th>
                                    <th>วันที่</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $res = get_business_type();
                                $num = 1;
                                foreach ($res as $row) {
                                    if ($row["status"] == "Y") {
                                        $bg_status = "badge-success";
                                        $status = "เปิดใช้งาน";
                                    } else {
                                        $bg_status = "badge-secondary";
                                        $status = "ปิดใช้งาน";
                                    }
                                    ?>
                                    <tr>
                                        <td scope="row"><?php echo $num; ?>.</td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td class="text-center"><span class="badge badge-pill <?php echo $bg_status; ?>"><?php echo $status; ?></span></td>
                                        <td class="text-center">
                                            <form method="POST" class="d-inline" action="?page=company_business_type_edit">
                                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                                <button title="แก้ไข" class="btn btn-warning btn-sm text-black"><i class="fa fa-edit"></i></button>
                                            </form>
                                            <form method="POST" class="d-inline" action="../company/do_business_type.php">
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