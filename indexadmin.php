<?php
require "connect.php";
session_start();
if (!$_SESSION['login']) header('Location: index.php');
include('header2.php');

$sql1 = "SELECT COUNT(*) AS TotalRows FROM khachhang";
$sql2 = "SELECT COUNT(*) AS TotalRows FROM bacsi";
$sql3 = "SELECT COUNT(*) AS TotalRows FROM thietbi";
$sql4 = "SELECT COUNT(*) AS TotalRows FROM lichkham";
$sql5 = "SELECT COUNT(*) AS TotalRows FROM dichvu";
$sql6 = "SELECT COUNT(*) AS TotalRows FROM hoadon";
$sql7 = "SELECT COUNT(*) AS TotalRows FROM chuyenkhoa";
$total1 = (new DB())->select($sql1);
$total2 = (new DB())->select($sql2);
$total3 = (new DB())->select($sql3);
$total4 = (new DB())->select($sql4);
$total5 = (new DB())->select($sql5);
$total6 = (new DB())->select($sql6);
$total7 = (new DB())->select($sql7);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

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
                    <h4 class="my-2">
                        Bảng Điều Khiển
                    </h4>
                    <div class="col-md-12 my-5">
                        <div class="row">
                            <div class="col-md-3 bg-success mx-2" style="height: 130px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white " style="font-size: 20px"><?php echo ($total1[0]['TotalRows']) ?></h5>
                                            <h5 class=" text-white" style="font-size: 20px">Quản Lý</h5>
                                            <h5 class=" text-white" style="font-size: 20px">Khách Hàng</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="khachhang.php"><i class="fa fa-user-cog fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-info mx-2" style="height: 130px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">

                                            <h5 class="my-2 text-white " style="font-size: 20px"><?php echo ($total2[0]['TotalRows']) ?></h5>
                                            <h5 class=" text-white" style="font-size: 20px">Quản Lý</h5>
                                            <h5 class=" text-white" style="font-size: 20px">Bác Sĩ</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="bacsi.php"><i class="fa fa-user-md fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-2" style="height: 130px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">

                                            <h5 class="my-2 text-white " style="font-size: 20px"><?php echo ($total3[0]['TotalRows']) ?></h5>
                                            <h5 class=" text-white" style="font-size: 20px">Quản Lý</h5>
                                            <h5 class=" text-white" style="font-size: 20px">Thiết Bị</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="thietbi.php"><i class="fa fa-procedures fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">

                                            <h5 class="my-2 text-white " style="font-size: 20px"><?php echo ($total4[0]['TotalRows']) ?></h5>
                                            <h5 class=" text-white" style="font-size: 20px">Quản Lý</h5>
                                            <h5 class=" text-white" style="font-size: 20px">Lịch Khám</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="lichkham.php"><i class="fa fa-calendar-check fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">

                                            <h5 class="my-2 text-white " style="font-size: 20px"><?php echo ($total5[0]['TotalRows']) ?></h5>
                                            <h5 class=" text-white" style="font-size: 20px">Quản Lý </h5>
                                            <h5 class=" text-white" style="font-size: 20px">Dịch Vụ</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="dichvu.php"><i class="fa fa-capsules fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-success mx-2 my-2" style="height: 130px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">

                                            <h5 class="my-2 text-white " style="font-size: 20px"><?php echo ($total6[0]['TotalRows']) ?></h5>
                                            <h5 class=" text-white" style="font-size: 20px">Quản lý</h5>
                                            <h5 class=" text-white" style="font-size: 20px">Hóa Đơn</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="hoadon.php"><i class="fa fa-money-check-alt fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-info mx-2 my-2" style="height: 130px">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white " style="font-size: 20px"><?php echo ($total7[0]['TotalRows']) ?></h5>
                                            <h5 class=" text-white" style="font-size: 20px">Quản Lý</h5>
                                            <h5 class=" text-white" style="font-size: 20px">Chuyên Khoa</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="chuyenkhoa.php"><i class="fa fa-chart-line fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>