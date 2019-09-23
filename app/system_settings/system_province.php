<nav aria-label="breadcrumb" class="mt-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aria-current="page">จังหวัด</li>
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
                                จังหวัด
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="?page=system_province_add" class="badge badge-pill badge-primary"><i class="fa fa-plus"></i>
                                    เพิ่มจังหวัด</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th style="width:10%;">#</th>
                                    <th>จังหวัด</th>
                                    <th class="text-center" style="width:15%;">สถานะ</th>
                                    <th class="text-center" style="width:15%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $res = get_province();
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
                                            <form method="POST" class="d-inline" action="?page=system_province_edit">
                                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                                <button title="แก้ไข" class="btn btn-warning btn-sm text-black"><i class="fa fa-edit"></i></button>
                                            </form>
                                            <form method="POST" class="d-inline" action="../system_settings/do_province.php">
                                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                                <input type="hidden" name="action" value="deleted">
                                                <button title="ลบ" onClick="return confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่ ?');" class="btn btn-danger btn-sm text-black"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php $num++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>