<?php
require "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/khoa.css">
</head>
<script src="./assets/js/api.js"></script>

<?php
if (isset($_POST['submit'])) {
    $phone = $_POST['phone'];
    $ten = $_POST['name'];
    $ngaysinh = $_POST['dob'];
    $gioitinh = $_POST['gender'];
    $email = $_POST['email'];
    $diachi = $_POST['address'];
    $dichvu = $_POST['selectService'];
    $ngaykham = $_POST['dateInput'];
    $giokham = $_POST['timeInput'];
    $maBS = $_POST['bacsi'];

    $sql1 = "INSERT INTO `khachhang`(`SDT`, `TenKH`, `NgaySinh`, `GioiTinh`, `DiaChi`, `Email`) 
    VALUES ('$phone','$ten','$ngaysinh','$gioitinh','$diachi','$email')
    ON DUPLICATE KEY UPDATE 
    `TenKH`='$ten', `NgaySinh`='$ngaysinh', `GioiTinh`='$gioitinh', `DiaChi`='$diachi', `Email`='$email'";

    (new DB())->insert($sql1);

    $sql2 = "SELECT `SDT` FROM `khachhang` WHERE `SDT` = '$phone'";
    $data = (new DB())->select($sql2);
    $lastInsertedPhoneNumber = $data[0]['SDT'];
    $sql3 = "INSERT INTO `lichkham`(`SDT_KH`, `TenDV`, `MaBS`, `NgayKham`, `GioKham`) VALUES ('$lastInsertedPhoneNumber','$dichvu','$maBS','$ngaykham','$giokham')";
    $rs = (new DB())->insert($sql3);
}
?>


<body>
    <div class="collum" style="display: flex; flex-direction: column; width: 1320px; height: auto;">
        <div class="header">
            <div class="avatar"><img src="./assets/img/logo-pc.png" alt="" style="height: 52px; width: 230px; "></div>
            <div class="phone" style="display: flex;">
                <div class="icon-circle"><i class="icon fa-solid fa-magnifying-glass"></i></div>
                <div class="input "><input type="text" name="" id="" placeholder="tìm kiếm" style="height: 44px; width: 300px; margin: 2px 0px 0px 5px; background-color:rgb(245, 245, 245); border: none; border-radius: 10px;"></div>
            </div>
            <div class="phone">
                <div class="icon-circle"><i class="icon fa-solid fa-phone"></i></div>
                <div class="infor">
                    <p style="margin: 0px;">Đường dây nóng</p>
                    <p>1900565656</p>
                </div>
            </div>
            <div class="phone">
                <div class="icon-circle"><i class="icon fa-regular fa-comment-dots"></i></div>
                <div class="infor">
                    <p style="margin: 0px;">Liên hệ</p>
                    <p>Hỗ trợ khách hàng</p>
                </div>
            </div>
            <div class="login">
                <a href="account.php" class="btn btn-primary">Đăng Nhập</a>
            </div>
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col-6">
                    <h1 style="float: left;">Đội Ngũ Bác Sĩ Chuyên Gia</h1>
                </div>
            </div>
        </div>
        <?php
        $ma = $_GET['ma'];
        $sql = "SELECT bacsi.MaBS, bacsi.TenBS, bacsi.Anh, chuyenkhoa.TenKhoa
                FROM bacsi
                JOIN chuyenkhoa ON bacsi.MaKhoa = chuyenkhoa.MaKhoa
                WHERE chuyenkhoa.MaKhoa= '$ma'";
        $data = (new DB())->select($sql);
        ?>
        <div class="container text-center">
            <div class="row">
                <?php foreach ($data as $each) { ?>
                    <div class="col-3" style="  height: 500px; display: flex ; flex-direction: column; ">
                        <div class="avarDoctor">
                            <div class="circle" style="position: absolute; height: 250px; width: 250px; background-color: rgb(223,233,241); border-radius: 50%; transform: translateX(10%); "></div>
                            <img src="uploads/<?php echo $each['Anh'] ?>" alt="" style="height: 300px; width: 250px; position: relative; z-index: 10; ">
                        </div>
                        <div class="nameDoctor">
                            <p><?php echo $each['TenBS'] ?></p>
                        </div>
                        <div class="khoa">
                            <p><?php echo $each['TenKhoa'] ?></p>
                        </div>
                        <div class="rate">
                            <i class="icon fa-solid fa-star"></i>
                            <i class="icon fa-solid fa-star"></i>
                            <i class="icon fa-solid fa-star"></i>
                            <i class="icon fa-solid fa-star"></i>
                            <i class="icon fa-solid fa-star"></i>
                        </div>
                        <div class="booking">
                            <button type="button" id="appointment" class="btn btn-outline-primary" onclick="toggleForm('<?php echo $each['MaBS'] ?>', '<?php echo $each['TenBS'] ?>')">Đặt Lịch Khám</button>
                        </div>

                    </div>
                <?php } ?>
            </div>
        </div>

        <form action="" method="POST" hidden id="myForm">
            <span class="close-btn" onclick="toggleForm()">&#10006;</span>
            <h1>Đặt Lịch Cùng Chuyên Gia</h1>
            <p>Quý khách hàng vui lòng điền thông tin để đặt lịch thăm khám cùng</p>
            <p id="tenBS" style="color: rgb(41, 142, 195 ); font-weight: 500;"></p>
            <div class="main">
                <div class="collum">
                    <label for="phone">SĐT</label>
                    <input type="text" name="phone" id="phone">

                    <label for="name">Tên Khách Hàng</label>
                    <input type="text" name="name" id="name">

                    <label for="dob">Ngày Sinh</label>
                    <input type="date" name="dob" id="dob">

                    <label for="gender">Giới Tính</label>
                    <input type="text" name="gender" id="gender">

                    <label for="gender">Email</label>
                    <input type="text" name="email" id="email">
                </div>

                <div class="collum">
                    <label for="provinceSelect">Tỉnh/Thành phố:</label>
                    <select id="provinceSelect" onchange="loadDistricts()" name="province">
                        <option value="tinh">Chọn Tỉnh</option>
                    </select>
                    <label for="districtSelect">Quận/Huyện:</label>
                    <select id="districtSelect" name="district">
                    </select>
                    <label for="address">Địa Chỉ</label>
                    <input type="text" name="address" id="address">
                    <label for="selectService">Chọn Dịch Vụ:</label>
                    <select id="selectService" name="selectService">
                        <?php
                        $sql = "SELECT `TenDV`, `GiaDV` FROM `dichvu`";
                        $data = (new DB())->select($sql);
                        foreach ($data as $row) {
                            echo "<option value='" . $row["TenDV"] . "'>" . $row["TenDV"] . "</option>";
                        }
                        ?>
                    </select>
                    <label for="dateInput">Chọn Ngày:</label>
                    <input type="date" id="dateInput" name="dateInput">

                </div>
            </div>
            <label for="timeInput" style="margin-left: 45px;">Chọn Giờ:</label>
            <input type="time" id="timeInput" name="timeInput">
            <input type="submit" name="submit" value="Đặt Lịch" onclick="getValueDL()">
            <input type="hidden" name="bacsi" id="idBS" value=""></input>
        </form>
</body>

<script>
    function getValueDL() {
        var address = document.getElementById("address").value;
        var province = document.getElementById("provinceSelect");
        var district = document.getElementById("districtSelect");
        var textProvince = province.options[province.selectedIndex].text;
        var textDistrict = district.options[district.selectedIndex].text;
        var rs = textProvince + ", " + textDistrict + ", " + address;
        var fullAddress = document.getElementById("address").value = rs;
    }
    document.getElementById('myForm').addEventListener('submit', function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function toggleForm(id, name) {
        document.getElementById("tenBS").textContent = name;
        console.log(document.getElementById("idBS").value = id);
        var form = document.getElementById("myForm");
        var ck = form.hidden = !form.hidden;
        if (ck) {
            var body = document.body.style.backgroundColor = "white"
        } else {
            var body = document.body.style.backgroundColor = "white";
        }
    }

    function validateForm() {
        var phone = document.getElementById('phone').value;
        var name = document.getElementById('name').value;
        var dob = document.getElementById('dob').value;
        var gender = document.getElementById('gender').value;
        var email = document.getElementById('email').value;
        var province = document.getElementById('provinceSelect').value;
        var district = document.getElementById('districtSelect').value;
        var address = document.getElementById('address').value;
        var service = document.getElementById('selectService').value;
        var date = document.getElementById('dateInput').value;
        var time = document.getElementById('timeInput').value;

        if (phone === '' || name === '' || dob === '' || gender === '' || email === '' ||
            province === 'tinh' || district === '' || address === '' || service === '' || date === '' || time === '') {
            alert('Vui lòng điền đầy đủ thông tin');
            return false;
        }
        return true;
    }
</script>

</html>