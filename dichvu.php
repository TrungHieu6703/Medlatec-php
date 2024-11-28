<?php
require "connect.php";
if (isset($_POST['add'])) {
    $tendv = $_POST['tendv'];
    $giadv = $_POST['giadv'];
    $sql = "INSERT INTO `dichvu`(`TenDV`, `GiaDV`) VALUES ('$tendv','$giadv')";
    $result = (new DB())->insert($sql);
    if ($result) {
        header('Location: dichvu.php');
    }
}
// <!--  DELETE -->
if (isset($_POST['delete'])) {
    $ma = $_POST['delete'];
    $sql = "DELETE FROM `dichvu` WHERE `tendv` = '$ma'";
    $result = (new DB())->delete($sql);
    if ($result) {
        header('Location: dichvu.php');
    }
}
// <!--  UPDATE -->
if (isset($_POST['update'])) {
    $tendv = $_POST['tendv'];
    $giadv = $_POST['giadv'];
    $ma = $_POST['update'];
    $sql = "UPDATE `dichvu` SET `TenDV`='$tendv',`GiaDV`='$giadv' WHERE `TenDV`='$ma'";
    $result = (new DB())->update(($sql));
    if ($result) {
        header('Location: dichvu.php');
    }
}

session_start();
if (!$_SESSION['login']) header('Location: index.php');
include('header2.php');
if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];
    $sql = "SELECT * FROM `dichvu` WHERE `TenDV` LIKE '%" . $searchTerm . "%'";
} else {
    $sql = "SELECT `TenDV`, `GiaDV` FROM `dichvu`";
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
    <link rel="stylesheet" href="./assets/css/dichvu.css">
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
                                    <td><?php echo $each['TenDV'] ?></td>
                                    <td><?php echo $each['GiaDV'] ?></td>
                                    <td style="display: flex;">
                                        <form method='POST'>
                                            <button class="btn btn-warning" type="submit" name="delete" value="<?php echo $each['TenDV'] ?>">delete</button>
                                        </form method='POST'>
                                        <button class="btn btn-danger" type="button" name="update" onclick="toggleForm('<?php echo $each['TenDV'] ?>','<?php echo $each['GiaDV'] ?>')">edit</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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
                    <h1>Thêm Dịch VỤ</h1>
                    <label for="">Tên Dịch Vụ</label>
                    <input id="tendv" type="text" name="tendv" id="tendv" required>
                    <label for="">Giá Dịch Vụ</label>
                    <input id="giadv" type="text" name="giadv" id="giadv" required>
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
</div>


</body>

</html>