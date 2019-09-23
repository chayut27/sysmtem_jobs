<nav class="navbar navbar-expand-lg navbar-light bg-blue">
    <a class="navbar-brand text-white" href="./">CWCODING</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="nav-right ml-auto">
        <ul class="nav justify-content-end">
            <li class="nav_item">
                <a id="txt" class="nav-link text-white"></a>
            </li>
            <li class="nav-item dropdown position-static">
                <a class="nav-link text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" alt="" width="27" class="img-fluid rounded-circle">
                    <?php echo $_SESSION["FIRSTNAME"] . " " . $_SESSION["LASTNAME"]; ?>
                </a>
                <div class="dropdown-menu animate slideIn w-100" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?page=users_profile">โปรไฟล์</a>
                    <!-- <a class="dropdown-item" href="#">เปลี่ยนรหัสผ่าน</a> -->
                    <?php
                    if ($_SESSION["PERMISSION"] == "USER") {
                        ?>
                        <div class="dropdown-divider"></div>
                        <a href="?page=company_profile" class="dropdown-item">บริษัท</a>
                    <?php } ?>
                    <div class="dropdown-divider"></div>
                    <a href="do_logout.php" class="dropdown-item">ออกจากระบบ</a>
                </div>

            </li>
        </ul>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ผู้ใช้งาน
                </a>
                <div class="dropdown-menu animate slideIn" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?page=users">ผู้ใช้งาน</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    งาน
                </a>
                <div class="dropdown-menu animate slideIn" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?page=jobs">งาน</a>
                    <a class="dropdown-item" href="?page=jobs_function">ประเภทงาน</a>
                </div>
            </li>
            <?php
            if ($_SESSION["PERMISSION"] == "ADMINISTRATOR") {
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        บริษัท
                    </a>
                    <div class="dropdown-menu animate slideIn" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?page=company">บริษัท</a>
                        <a class="dropdown-item" href="?page=company_business_type">ประเภทธุรกิจ</a>
                    </div>
                </li>
            <?php } ?>
            <?php
            if ($_SESSION["PERMISSION"] == "ADMINISTRATOR") {
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ตั้งค่าระบบ
                    </a>
                    <div class="dropdown-menu animate slideIn" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?page=system_province">จังหวัด</a>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>