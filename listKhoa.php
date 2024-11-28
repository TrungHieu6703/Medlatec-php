<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="./assets/css/listkhoa.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Specialties</title>

</head>

<body>
    <div class="container text-center" style="margin-top: 50px;">
        <div class="row">
            <div class="col-8">
                <h2 style="float: left; display: flex; margin-right: 10px;">CÁC CHUYÊN KHOA Y TẾ TẠI <span style=" color: rgb(74,147,227); padding-left: 5px;"> MEDLATEC</span>
                </h2>
            </div>
        </div>
    </div>
    <div class="container text-center" style="text-align: center; margin: auto;">
        <div class="row justify-content-start " style="width: 1300px; height: auto;position: relative; left: 10px; ">
            <?php
            require_once "connect.php";
            $sql = "select * from chuyenkhoa";
            $data = (new DB())->select($sql);
            ?>
            <?php foreach ($data as $each) { ?>
                <div class="bang col-2" style="border: 1px solid rgb(74,147,227); height: 200px; padding: 0; ">
                    <a href="khoa.php?ma=<?php echo $each['MaKhoa'] ?>" style="height: 100%; display: flex; flex-direction: column; justify-content: space-evenly;">
                        <div class="img" style="position: relative; right: 50px;">
                            <img src="uploads/<?php echo $each['Anh'] ?>" alt="">;
                        </div>
                        <div>
                            <p style=" font-weight: 700; font-size: larger; position: relative; float: left; margin-left: 10px;"><?php echo $each['TenKhoa'] ?></p>
                        </div>
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>
</body>

</html>