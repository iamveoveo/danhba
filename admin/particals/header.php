<?php include("../config/constants.php");?>
<?php //include("particals/log-check.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Quản lý Danh Bạ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/util_.css">
	<link rel="stylesheet" type="text/css" href="css/main_.css">
    <link rel="stylesheet" type="text/css" href="css/search.css">
</head>
<body style="background: #f6f6f6">
    <div class="sticky-top">
        <header class="d-flex justify-content-center py-3" style="background-color:#A1988299;">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="<?php echo SITEURL; ?>admin/index.php" class="nav-link active" aria-current="page"><i class="fas fa-home pe-1"></i>Nhân Viên</a></li>
                <li class="nav-item"><a href="<?php echo SITEURL; ?>admin/manager-donvi.php" class="nav-link">Đơn Vị</a></li>
                <li class="nav-item"><a href="<?php echo SITEURL; ?>admin/manager-nguoidung.php" class="nav-link">Người dùng</a></li>
                <li class="nav-item"><a href="<?php echo SITEURL; ?>admin/profile.php" class="nav-link">Thông tin cá nhân</a></li>
                <li class="nav-item"><a href="<?php echo SITEURL; ?>admin/logout.php" class="nav-link">Đăng xuất</a></li>
            </ul>
        </header>
    </div>