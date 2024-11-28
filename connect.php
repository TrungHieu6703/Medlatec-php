<?php

class DB
{
    private $host = 'localhost';
    private $name = 'root';
    private $pass = '';
    private $dbname = 'btl_php';

    protected function connect()
    {
        $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->name, $this->pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public function select($sql)
    {
        try {
            $connect = $this->connect();

            $stmt = $connect->prepare($sql);
            $stmt->execute();

            // Lấy tất cả các dòng dữ liệu
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            // Xử lý lỗi (ví dụ: hiển thị thông báo lỗi hoặc ghi log)
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function insert($sql)
    {
        try {
            $connect = $this->connect();
            $connect->exec($sql);

            // Lấy tất cả các dòng dữ liệu

            return true;
        } catch (PDOException $e) {
            // Xử lý lỗi (ví dụ: hiển thị thông báo lỗi hoặc ghi log)
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function delete($sql)
    {
        try {
            $connect = $this->connect();
            $connect->exec($sql);

            // Lấy tất cả các dòng dữ liệu
            echo "Record deleted successfully";
            return true;
        } catch (PDOException $e) {
            // Xử lý lỗi (ví dụ: hiển thị thông báo lỗi hoặc ghi log)
            echo "Error: " . $e->getMessage();

            return false;
        }
    }

    public function update($sql)
    {
        try {
            $connect = $this->connect();
            $stmt = $connect->prepare($sql);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Xử lý lỗi (ví dụ: hiển thị thông báo lỗi hoặc ghi log)
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function upload($sql)
    {
        try {
            if (!isset($_FILES["file"])) {
                echo "Vui lòng chọn một tệp tin.";
                return false;
            }

            $connect = $this->connect();

            $targetDirectory = "uploads/";  // Thư mục lưu trữ file (đảm bảo thư mục này tồn tại và có quyền ghi)
            $targetFile = $targetDirectory . basename($_FILES["file"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            if (!is_dir($targetDirectory)) {
                mkdir($targetDirectory, 0777, true);
            }

            if ($uploadOk == 0) {
                echo "File của bạn không được upload.";
            } else {
                // Nếu mọi thứ đều ổn, thực hiện lưu thông tin vào cơ sở dữ liệu
                $fileName = $_FILES["file"]["name"];

                // Di chuyển file upload vào thư mục đích
                move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);

                // Thực hiện câu truy vấn SQL
                $connect->exec($sql);

                return true;
            }
        } catch (PDOException $e) {
            // Xử lý lỗi (ví dụ: hiển thị thông báo lỗi hoặc ghi log)
            echo "Error: " . $e->getMessage();

            return false;
        }
    }
}
