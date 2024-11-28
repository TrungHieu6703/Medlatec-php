<?php
require "connect.php";
if (isset($_POST['add'])) {
    $makhoa = $_POST['makhoa'];
    $tenkhoa = $_POST['tenkhoa'];
    $file = $_FILES["file"]["name"];
    $sql = "INSERT INTO `chuyenkhoa`(`MaKhoa`, `TenKhoa`, `Anh`) VALUES ('$makhoa','$tenkhoa','$file')";
    $result = (new DB())->upload($sql);
    if ($result) {
        header('Location: chuyenkhoa.php');
    }
}
// <!--  DELETE -->
if (isset($_POST['delete'])) {
    $ma = $_POST['delete'];
    $sql = "DELETE FROM `chuyenkhoa` WHERE `MaKhoa` = '$ma'";
    $result = (new DB())->delete($sql);
    if ($result) {
        header('Location: chuyenkhoa.php');
    }
}
// <!--  UPDATE -->
if (isset($_POST['update'])) {
    $makhoa = $_POST['makhoa'];
    $tenkhoa = $_POST['tenkhoa'];
    $ma = $_POST['update'];
    $file = $_FILES["file"]["name"];
    $sql = "UPDATE `chuyenkhoa` SET `MaKhoa`='$makhoa',`TenKhoa`='$tenkhoa', `Anh`='$file' WHERE `MaKhoa`='$ma'";
    $result = (new DB())->upload(($sql));
    if ($result) {
        header('Location: chuyenkhoa.php');
    }
}

session_start();
if (!$_SESSION['login']) header('Location: index.php');
include('header2.php');
if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];
    $sql = "SELECT * FROM `chuyenkhoa` WHERE `TenKhoa` LIKE '%" . $searchTerm . "%'";
} else {
    $sql = "SELECT `MaKhoa`, `TenKhoa` FROM `chuyenkhoa`";
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
    <link rel="stylesheet" href="./assets/css/chuyenkhoa.css">
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
                                <th scope="col">Mã Khoa</th>
                                <th scope="col">Tên Khoa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $each) { ?>
                                <tr>
                                    <td><?php echo $each['MaKhoa'] ?></td>
                                    <td><?php echo $each['TenKhoa'] ?></td>
                                    <td style="display: flex;">
                                        <form method='POST'>
                                            <button class="btn btn-warning" type="submit" name="delete" value="<?php echo $each['MaKhoa'] ?>">delete</button>
                                        </form method='POST'>
                                        <button class="btn btn-danger" type="button" name="update" onclick="toggleForm('<?php echo $each['MaKhoa'] ?>','<?php echo $each['TenKhoa'] ?>')">edit</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- FORM UPDATE -->
                <form action="" id="myForm" class="form" hidden method="POST" enctype="multipart/form-data">
                    <span class="close-btn" onclick="toggleForm()">&#10006;</span>
                    <h1>Sửa Chuyên Khoa</h1>
                    <label for="">Mã Khoa</label>
                    <input id="makhoa" type="text" name="makhoa" required>
                    <label for="">Tên Chuyên Khoa</label>
                    <input id="tenkhoa" type="text" name="tenkhoa" required>
                    <label for="">Ảnh</label>
                    <input type="file" name="file" id="file" required>
                    <button id="updateButton" class="btn btn-warning" type="submit" name="update">Update</button>
                </form>

                <!-- FORM ADD -->
                <form action="" id="form-add" class="form" hidden method="POST" enctype="multipart/form-data">
                    <span class="close-btn" onclick="toggleFormAdd()">&#10006;</span>
                    <h1>Thêm Chuyên Khoa</h1>
                    <label for="">Mã Khoa</label>
                    <input id="makhoa" type="text" name="makhoa" required>
                    <label for="">Tên Chuyên Khoa</label>
                    <input id="tenkhoa" type="text" name="tenkhoa" required>
                    <label for="">Ảnh</label>
                    <input type="file" name="file" id="file" required>
                    <button id="updateButton" class="btn btn-warning" type="submit" name="add">Add</button>
                </form>

</body>
<script>
    function toggleFormAdd() {
        var form = document.getElementById("form-add");
        var ck = form.hidden = !form.hidden;
    }

    function toggleForm(makhoa, tenkhoa) {
        var form = document.getElementById("myForm");
        var ck = form.hidden = !form.hidden;
        document.getElementById("makhoa").value = makhoa;
        document.getElementById("tenkhoa").value = tenkhoa;
        document.getElementById("updateButton").value = makhoa;

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