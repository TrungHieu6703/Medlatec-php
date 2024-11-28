<?php
require "connect.php";
if (isset($_POST['add'])) {
    $tentb = $_POST['tentb'];
    $matb = $_POST['matb'];
    $soluong = $_POST['soluong'];
    $makhoa = $_POST['makhoa'];

    $sql = "INSERT INTO `thietbi`(`MaTB`, `TenTB`, `SoLuong`, `MaKhoa`) VALUES ('$matb','$tentb','$soluong','$makhoa')";
    $result = (new DB())->insert($sql);
    if ($result) {
        header('Location: thietbi.php');
    }
}
// <!--  DELETE -->
if (isset($_POST['delete'])) {
    $ma = $_POST['delete'];
    $sql = "DELETE lichkham, khachhang
    FROM lichkham
    JOIN khachhang ON lichkham.SDT_KH = khachhang.SDT
    WHERE lichkham.MaLK = '$ma'";
    $result = (new DB())->delete($sql);
    if ($result) {
        header('Location: lichkham.php');
    }
}


session_start();
if (!$_SESSION['login']) header('Location: index.php');
include('header2.php');
if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];
    $sql = "SELECT 
    lichkham.MaLK, lichkham.SDT_KH, lichkham.TenDV, lichkham.NgayKham, lichkham.GioKham, bacsi.TenBS, bacsi.MaBS
FROM
    lichkham
JOIN    
    bacsi ON bacsi.MaBS = lichkham.MaBS
WHERE
    lichkham.SDT_KH LIKE '%" . $searchTerm . "%'";
} else {
    $sql = "SELECT 
    lichkham.MaLK, lichkham.SDT_KH, lichkham.TenDV, lichkham.NgayKham, lichkham.GioKham, bacsi.TenBS, bacsi.MaBS
FROM
    lichkham
JOIN    
    bacsi ON bacsi.MaBS = lichkham.MaBS;
";
}

$data = (new DB())->select($sql);
// print_r($data);
?>
<!DOCTYPE html>
<html lang="en">
<style>

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/lichkham.css">
</head>

<body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php
                include("sidenav.php");
                ?>
            </div>
            <div class="col-md-10">
                <form method="post" action="" class="form-search">
                    <input type="search" name="searchTerm" placeholder="Search...">
                    <button type="submit" name="search">Search</button>
                </form>
                <div class="col-md-10">
                    <table class=" table table-striped table-bordered" style="margin-top: 40px;">
                        <thead>
                            <tr>
                                <th scope="col">Mã Lịch Khám</th>
                                <th scope="col">Số Điện Thoại Khách Hàng</th>
                                <th scope="col">Tên Dịch Vụ</th>
                                <th scope="col">Mã Bác Sĩ</th>
                                <th scope="col">Tên Bác Sĩ</th>
                                <th scope="col">Ngày Khám</th>
                                <th scope="col">Giờ Khám</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $each) { ?>
                                <tr>
                                    <td><?php echo $each['MaLK'] ?></td>
                                    <td><?php echo $each['SDT_KH'] ?></td>
                                    <td><?php echo $each['TenDV'] ?></td>
                                    <td><?php echo $each['MaBS'] ?></td>
                                    <td><?php echo $each['TenBS'] ?></td>
                                    <td><?php echo $each['NgayKham'] ?></td>
                                    <td><?php echo $each['GioKham'] ?></td>
                                    <td>
                                        <form method='POST'>
                                            <button class="btn btn-warning" type="submit" name="delete" value="<?php echo $each['MaLK'] ?>">delete</button>
                                        </form method='POST'>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
</body>

</div>


</body>

</html>