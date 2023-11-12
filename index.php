<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            background-image: url("ảnh nền.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .title {
            font-weight: bold;
            font-size: 24px;
        }

        .btn-center {
            display: flex;
            justify-content: center;
        }

        .form-control {
            font-weight: bold;
            font-size: 18px;
        }
    </style>
    <title>Trang xác nhận</title>
</head>

<body>
    <?php require_once "config.php" ?>
    <?php
    if (isset($_POST["add"])) {
        $stt = $_POST["stt"];
        $hoten = $_POST["hoten"];
        $email = $_POST["email"];
        $sdt = $_POST["sdt"];
        $chucvu = $_POST["chucvu"];

        // Kiểm tra xem mã sinh viên đã tồn tại hay chưa
        $checkQuery = "SELECT * FROM formdangky2 WHERE stt = '$stt'";
        $result = $conn->query($checkQuery);
        if ($result->num_rows > 0) {
            echo "<script>alert('Mã sinh viên đã tồn tại!');</script>";
        } else {
            // Thực hiện truy vấn INSERT
            $insertQuery = "INSERT INTO formdangky2 (stt, Hoten, email, sdt, chucvu) VALUES ('$stt', N'$hoten', '$email', '$sdt', '$chucvu')";
            if ($conn->query($insertQuery)) {
                echo "<script>alert('Thêm thành công!');</script>";
            } else {
                echo "<script>alert('Thêm thất bại!');</script>";
            }
        }
    }
    $conn->close();
    ?>

    <div class="container">
        <form method="POST" action="">
            <div class="form-group">
                <label for="stt" class="title">STT</label>
                <input name="stt" class="form-control" placeholder="stt">
            </div>
            <div class="form-group">
                <label for="hoten" class="title">Họ Tên</label>
                <input name="hoten" class="form-control" placeholder="Họ Tên">
            </div>
            <div class="form-group">
                <label for="email" class="title">Email</label>
                <input name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="sdt" class="title">Số điện thoại</label>
                <input name="sdt" class="form-control" placeholder="Số điện thoại">
            </div>
            <div class="form-group">
                <label for="chucvu" class="title">Chức vụ</label>
                <select name="chucvu" class="form-control">
                    <option value="">Chọn chức vụ</option>
                    <option value="Trưởng nhà">Trưởng nhà</option>
                    <option value="Phó nhà">Phó nhà</option>
                    <option value="Thư ký">Thư Ký</option>
                    <option value="Thủ Qũy">Thủ Qũy</option>
                </select>
            </div>
            <div class="form-group btn-center">
                <button type="submit" class="btn btn-primary" name="add"><strong>Xác Nhận</strong></button>
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>