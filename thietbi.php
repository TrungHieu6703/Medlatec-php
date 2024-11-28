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
    $sql = "DELETE FROM `thietbi` WHERE `MaTB` = '$ma'";
    $result = (new DB())->delete($sql);
    if ($result) {
        header('Location: thietbi.php');
    }
}
// <!--  UPDATE -->
if (isset($_POST['update'])) {
    $tentb = $_POST['tentb'];
    $matb = $_POST['matb'];
    $matb = $_POST['soluong'];
    $makhoa = $_POST['makhoa'];
    $ma = $_POST['update'];
    $sql = "UPDATE `thietbi` SET `MaTB`='$matb',`TenTB`='$tentb',`SoLuong`='$soluong',`MaKhoa`='$makhoa' WHERE `MaTB` ='$ma'";
    $result = (new DB())->update(($sql));
    if ($result) {
        header('Location: thietbi.php');
    }
}

session_start();
if (!$_SESSION['login']) header('Location: index.php');
include('header2.php');
if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];
    $sql = "SELECT * FROM `thietbi` WHERE `TenTB` LIKE '%" . $searchTerm . "%'";
} else {
    $sql = "SELECT 
    thietbi.MaTB, thietbi.TenTB, thietbi.SoLuong, chuyenkhoa.MaKhoa, chuyenkhoa.TenKhoa
FROM
    thietbi
JOIN    
    chuyenkhoa ON chuyenkhoa.MaKhoa = thietbi.MaKhoa;
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
    <style>
        .form {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form span.close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .form h1,
        .form p {
            text-align: center;
        }

        .form label {
            display: block;
            margin-bottom: 5px;
        }

        .form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        #updateButton {
            width: 100%;
            padding: 10px;
            background-color: #ffc107;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .form-search {
            position: absolute;
            top: 8px;
            left: 500px;
        }
    </style>
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

                <div class="col-md-10">
                    <form method="post" action="" class="form-search">
                        <input type="search" name="searchTerm" placeholder="Search...">
                        <button type="submit" name="search">Search</button>
                    </form>
                    <button type="button" class="btn btn-primary" onclick="toggleFormAdd()">Add</button>
                    <table class=" table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Mã Thiết Bị</th>
                                <th scope="col">Tên Thiết Bị</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Mã Khoa</th>
                                <th scope="col">Tên Khoa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $each) { ?>
                                <tr>
                                    <td><?php echo $each['MaTB'] ?></td>
                                    <td><?php echo $each['TenTB'] ?></td>
                                    <td><?php echo $each['SoLuong'] ?></td>
                                    <td><?php echo $each['MaKhoa'] ?></td>
                                    <td style="display: flex;">
                                        <form method='POST'>
                                            <button class="btn btn-warning" type="submit" name="delete" value="<?php echo $each['MaTB'] ?>">delete</button>
                                        </form>
                                        <button class="btn btn-danger" type="button" name="update" onclick="toggleForm('<?php echo $each['MaTB'] ?>','<?php echo $each['TenTB'] ?>','<?php echo $each['SoLuong'] ?>','<?php echo $each['MaKhoa'] ?>')">edit</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- FORM UPDATE -->
                <form action="" id="myForm" class="form" hidden method="POST">
                    <span class="close-btn" onclick="toggleForm()">&#10006;</span>
                    <h1>Sửa Thiết Bị</h1>
                    <label for="">Mã Thiết Bị</label>
                    <input id="matb" type="text" name="matb" required>
                    <label for="">Tên Thiết Bị</label>
                    <input id="tentb" type="text" name="tentb" required>
                    <label for="">Số Lượng</label>
                    <input id="soluong" type="text" name="soluong" required>
                    <label for="">Mã Khoa</label>
                    <input id="makhoa" type="text" name="makhoa" required>
                    <!-- <label for="">Tên Chuyên Khoa</label>
                    <input id="tenkhoa" type="text" name="tenkhoa" required> -->
                    <button id="updateButton" class="btn btn-warning" type="submit" name="update">Update</button>
                </form>

                <!-- FORM ADD -->
                <form action="" id="form-add" class="form" hidden method="POST">
                    <span class="close-btn" onclick="toggleFormAdd()">&#10006;</span>
                    <h1>Thêm Thiết Bị</h1>
                    <label for="">Mã Thiết Bị</label>
                    <input id="matb" type="text" name="matb" required>
                    <label for="">Tên Thiết Bị</label>
                    <input id="tentb" type="text" name="tentb" required>
                    <label for="">Số Lượng</label>
                    <input id="soluong" type="text" name="soluong" required>
                    <label for="">Mã Khoa</label>
                    <input id="makhoa" type="text" name="makhoa" required>
                    <!-- <label for="">Tên Chuyên Khoa</label>
                    <input id="tenkhoa" type="text" name="tenkhoa" required> -->
                    <button id="updateButton" class="btn btn-warning" type="submit" name="add">Add</button>
                </form>

</body>
<script>
    function toggleFormAdd() {
        var form = document.getElementById("form-add");
        var ck = form.hidden = !form.hidden;
    }

    function toggleForm(matb, tentb, soluong, makhoa) {
        var form = document.getElementById("myForm");
        var ck = form.hidden = !form.hidden;
        document.getElementById("matb").value = matb;
        document.getElementById("tentb").value = tentb;
        document.getElementById("soluong").value = soluong;
        document.getElementById("makhoa").value = makhoa;
        document.getElementById("updateButton").value = matb;

        if (ck) {
            document.body.style.backgroundColor = "white";
        } else {
            document.body.style.backgroundColor = "rgb(223,233,241, 0.5)";
        }
    }
</script>
</div>


</body>

</html>