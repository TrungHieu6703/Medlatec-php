<?php
require "connect.php";
session_start();
if (!$_SESSION['login']) header('Location: index.php');
include('header2.php');
///////////add/////////////////////
if (isset($_POST['add'])) {
    $mahd = $_POST['mahd'];
    $malk = $_POST['malk'];
    $sql = "INSERT INTO `hoadon`(`MaHD`, `MaLK`) VALUES ('$mahd','$malk')";
    $result = (new DB())->insert($sql);
    if ($result) {
        header('Location: hoadon.php');
    }
}
// <!--  DELETE -->
if (isset($_POST['delete'])) {
    $ma = $_POST['delete'];
    $sql = "DELETE FROM `hoadon` WHERE `MaHD` = '$ma'";
    $result = (new DB())->delete($sql);
    if ($result) {
        header('Location: hoadon.php');
    }
}
/////////////select//////////////////
$sql = "
SELECT
    hoadon.MaHD,
    lichkham.MaLK,
    khachhang.*,
    lichkham.TenDV,
    dichvu.GiaDV,
    bacsi.*,
    chuyenkhoa.TenKhoa,
    lichkham.NgayKham,
    lichkham.GioKham
FROM
    hoadon
JOIN
    lichkham ON hoadon.MaLK = lichkham.MaLK
JOIN
    khachhang ON lichkham.SDT_KH = khachhang.SDT
JOIN
    dichvu ON lichkham.TenDV = dichvu.TenDV
JOIN
    bacsi ON lichkham.MaBS = bacsi.MaBS
JOIN
    chuyenkhoa ON bacsi.MaKhoa = chuyenkhoa.MaKhoa;

";
$result = (new DB())->select($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/dichvu.css">
</head>
<style>

</style>

<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <table class="table table-striped table-bordered" style="border: 1px solid black;">
                        <button type="button" class="btn btn-primary" onclick="toggleFormAdd()">Add</button>
                        <thead>
                            <tr>
                                <th scope="col">Mã Hóa Đơn</th>
                                <th scope="col">Mã Lịch Khám</th>
                                <th scope="col">Thông Tin Khách Hàng</th>
                                <th scope="col">Thông Tin Bác Sĩ </th>
                                <th scope="col">Giá</th>
                                <th scope="col">Ngày Khám</th>
                                <th scope="col">Giờ Khám</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php foreach ($result as $each) { ?>

                            <tr>
                                <td>
                                    <?php echo  $each['MaHD'] ?>
                                </td>
                                <td>
                                    <?php echo  $each['MaLK'] ?>
                                </td>
                                <td>
                                    <?php echo 'Khách Hàng: ' . $each['TenKH'] ?><br>
                                    <?php echo 'Ngày Sinh: ' . $each['NgaySinh'] ?><br>
                                    <?php echo 'Giới Tính: ' . $each['GioiTinh'] ?><br>
                                    <?php echo 'Địa Chỉ: ' . $each['DiaChi'] ?><br>
                                    <?php echo 'Email: ' . $each['Email'] ?><br>
                                    <?php echo 'SĐT: ' . $each['SDT'] ?><br>
                                </td>
                                <td>
                                    <?php echo 'Mã Bác Sĩ: ' . $each['MaBS'] ?><br>
                                    <?php echo 'Bác Sĩ: ' . $each['TenBS'] ?><br>
                                    <?php echo 'Khoa: ' . $each['TenKhoa'] ?><br>
                                </td>
                                <td>
                                    <?php echo $each['GiaDV'] . " VNĐ" ?>
                                </td>
                                <td>
                                    <?php echo $each['NgayKham'] ?>
                                </td>
                                <td>
                                    <?php echo $each['GioKham'] ?>
                                </td>
                                <td>
                                    <form method='POST'>
                                        <button class="btn btn-warning" type="submit" name="delete" value="<?php echo $each['MaHD'] ?>">delete</button>
                                    </form method='POST'>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- FORM UPDATE -->
    <form action="" id="myForm" class="form" hidden method="POST">
        <span class="close-btn" onclick="toggleForm()">&#10006;</span>
        <h1>Sửa Dịch Vụ</h1>
        <label for="">Tên Dịch Vụ</label>
        <input id="tendv" type="text" name="tendv" required>
        <label for="">Giá Dịch Vụ</label>
        <input id="giadv" type="text" name="giadv" required>
        <button id="updateButton" class="btn btn-warning" type="submit" name="update">Update</button>
    </form>

    <!-- FORM ADD -->
    <form action="" id="form-add" class="form" hidden method="POST">
        <span class="close-btn" onclick="toggleFormAdd()">&#10006;</span>
        <h1>Thêm Hóa Đơn</h1>
        <label for="">Mã Hóa Đơn</label>
        <input id="mahd" type="text" name="mahd" required>
        <label for="">Mã Lịch Khám</label>
        <input id="malk" type="text" name="malk" required>
        <button id="updateButton" class="btn btn-warning" type="submit" name="add">Add</button>
    </form>
</body>
<script>
    function toggleFormAdd() {
        var form = document.getElementById("form-add");
        var ck = form.hidden = !form.hidden;
    }

    function toggleForm(tendv, giadv) {
        var form = document.getElementById("myForm");
        var ck = form.hidden = !form.hidden;
        document.getElementById("tendv").value = tendv;
        document.getElementById("giadv").value = giadv;
        document.getElementById("updateButton").value = tendv;

        if (ck) {
            document.body.style.backgroundColor = "white";
        } else {
            document.body.style.backgroundColor = "rgb(223,233,241, 0.5)";
        }
    }
</script>

</html>