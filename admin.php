<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <a href="index.php?controller=student&action=add"><button type="button" class="btn btn-primary">Add</button></a>
    <a href="view/login.php"><button type="button" class="btn btn-primary">Đăng nhập </button></a>
    <a href="index.php?controller=student&action=add"><button type="button" class="btn btn-primary">Đăng Ký</button></a>
    <a href="http://localhost:3000/view/login.php"><button type="button" class="btn btn-primary">Đăng nhập</button></a>

    <?php
    require "connect.php";
    $sql = "SELECT 
    thietbi.MaTB, thietbi.TenTB, thietbi.SoLuong, chuyenkhoa.MaKhoa, chuyenkhoa.TenKhoa
FROM
    thietbi
JOIN    
    chuyenkhoa ON chuyenkhoa.MaKhoa = thietbi.MaKhoa;
";
    $data = (new DB())->select($sql);
    // print_r($data);
    ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <?php foreach ($data as $each) { ?>

            <tr>
                <td><?php echo $each['MaTB'] ?></td>
                <td><?php echo $each['TenTB'] ?></td>
                <td><?php echo $each['SoLuong'] ?></td>
                <td><?php echo $each['MaKhoa'] ?></td>
                <td><?php echo $each['TenKhoa'] ?></td>
                <td>
                    <a href="#" class="btn btn-danger">edit</a>
                    <a href="#" class="btn btn-warning">delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>