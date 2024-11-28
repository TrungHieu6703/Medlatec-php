<?php
require "connect.php";
if (isset($_POST['add'])) {
    $mabs = $_POST['mabs'];
    $ten = $_POST['tenbs'];
    $makhoa = $_POST['makhoa'];
    $file = $_FILES["file"]["name"];
    $sql = "INSERT INTO `bacsi`(`MaBS`, `TenBS`, `MaKhoa`, `Anh`) VALUES ('$mabs','$ten','$makhoa','$file')";
    $result = (new DB())->upload($sql);
    if ($result) {
        header('Location: bacsi.php');
    }
}
// <!--  DELETE -->
if (isset($_POST['delete'])) {
    $ma = $_POST['delete'];
    $sql = "DELETE FROM `bacsi` WHERE `MaBS` = '" . $ma . "'";
    $result = (new DB())->delete($sql);
    if ($result) {
        header('Location: bacsi.php');
    }
}
// <!--  UPDATE -->
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $file = $_FILES["file"]["name"];
    $ma = $_POST['update'];
    $sql = "UPDATE bacsi SET Anh = '$file', `TenBS` = '$name' WHERE MaBS = '$ma'";
    $result = (new DB())->upload(($sql));
    if ($result) {
        header('Location: bacsi.php');
    }
}

session_start();
if (!$_SESSION['login']) header('Location: index.php');
include('header2.php');
if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];
    $sql = "SELECT * FROM `bacsi` WHERE `TenBS` LIKE '%" . $searchTerm . "%'";
} else {
    $sql = "SELECT * FROM `bacsi`";
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
    <link rel="stylesheet" href="./assets/css/bacsi.css">
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

                <div class="col-md-12">
                    <form method="post" action="" class="form-search">
                        <input type="search" name="searchTerm" placeholder="Search...">
                        <button type="submit" name="search">Search</button>
                    </form>
                    <button type="button" class="btn btn-primary" onclick="toggleFormAdd()">Add</button>
                    <table class=" table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $each) { ?>
                                <tr>
                                    <td><?php echo $each['MaBS'] ?></td>
                                    <td><?php echo $each['TenBS'] ?></td>
                                    <td><img src="uploads/<?php echo $each['Anh'] ?>" alt="" style="height: 100px; width: 200px;"></td>
                                    <td style="display: flex;">
                                        <form method='POST'>
                                            <button class="btn btn-warning" type="submit" name="delete" value="<?php echo $each['MaBS'] ?>">delete</button>
                                        </form method='POST'>
                                        <button class="btn btn-danger" type="button" name="update" onclick="toggleForm('<?php echo $each['MaBS'] ?>','<?php echo $each['TenBS'] ?>')">edit</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- FORM UPDATE -->
                <form action="" id="myForm" class="form" hidden method="POST" enctype="multipart/form-data">
                    <span class="close-btn" onclick="toggleForm()">&#10006;</span>
                    <h1>Sửa thông tin bác sĩ</h1>
                    <label for="">Tên Bác Sĩ</label>
                    <input id="tenBS" type="text" name="name" required>
                    <label for="">Ảnh</label>
                    <input type="file" name="file" id="file" required>
                    <button id="updateButton" class="btn btn-warning" type="submit" name="update">Update</button>
                </form>

                <!-- FORM ADD -->
                <form action="" id="form-add" class="form" hidden method="POST" enctype="multipart/form-data">
                    <span class="close-btn" onclick="toggleFormAdd()">&#10006;</span>
                    <h1>Thêm Bác Sĩ</h1>
                    <label for="">Mã Bác Sĩ</label>
                    <input type="text" name="mabs" required>
                    <label for="">Tên Bác Sĩ</label>
                    <input type="text" name="tenbs" required>
                    <label for="">Mã Khoa</label>
                    <input type="text" name="makhoa" required>
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

    function toggleForm(maBS, tenBS) {
        var form = document.getElementById("myForm");
        var ck = form.hidden = !form.hidden;
        document.getElementById("tenBS").value = tenBS;
        document.getElementById("updateButton").value = maBS;

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