<?php
session_start();
require_once "connect.php";

if (isset($_SESSION['login'])) {
    header('Location: indexadmin.php');
    exit();
}


if (isset($_POST['submit'])) {
    $_SESSION['login'] = true;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM account WHERE username = '$username' AND password = '$password'";

    $data = (new DB())->select($sql);
    // Xử lý dữ liệu...
    if ($data) {
        // Tài khoản hợp lệ, xử lý đăng nhập
        header('Location: indexadmin.php');
        exit();
    } else {
        // Tài khoản không hợp lệ, hiển thị thông báo hoặc thực hiện hành động khác
        echo "Tài khoản không hợp lệ!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-color: #f0f0f0;
    }

    .login-container {
        max-width: 400px;
        width: 100%;
    }

    .login-card {
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
    }

    .login-card h2 {
        color: #333;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    input {
        padding: 10px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
    }

    button {
        background-color: #007BFF;
        color: #fff;
        padding: 12px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>

<body>
    <div class="login-container">
        <div class="login-card">
            <h2>Login</h2>
            <form action="" method="post">
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
    </div>

</body>

</html>