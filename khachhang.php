<?php
require "connect.php";

session_start();
if (!$_SESSION['login']) header('Location: index.php');
include('header2.php');
if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];
    $sql = "SELECT * FROM `khachhang` WHERE `TenKH` LIKE '%" . $searchTerm . "%'";
} else {
    $sql = "SELECT * FROM `khachhang`";
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
</head>
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
                    <table class=" table table-striped table-bordered" style="position: relative;
    top: 40px;
    left: 60px;">
                        <thead>
                            <tr>
                                <th scope="col">SĐT</th>
                                <th scope="col">Tên Khách Hàng</th>
                                <th scope="col">Ngày Sinh</th>
                                <th scope="col">Giới Tính</th>
                                <th scope="col">Địa Chỉ</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $each) { ?>
                                <tr>
                                    <td><?php echo $each['SDT'] ?></td>
                                    <td><?php echo $each['TenKH'] ?></td>
                                    <td><?php echo $each['NgaySinh'] ?></td>
                                    <td><?php echo $each['GioiTinh'] ?></td>
                                    <td><?php echo $each['DiaChi'] ?></td>
                                    <td><?php echo $each['Email'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>


</body>

</div>


</body>

</html>