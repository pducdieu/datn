<?php
include 'connect_db.php';
$ten= $_GET['user'];
$infor = "SELECT * FROM `user` WHERE  `username` ='$ten'";

$result = mysqli_query($con, $infor);

// Kiểm tra kết quả truy vấn
if (mysqli_num_rows($result) > 0) {
    // Lấy thông tin người dùng
    $user_info = mysqli_fetch_assoc($result);
} else {
    echo "Không tìm thấy người dùng.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="style.css"> <!-- Liên kết đến file CSS -->
</head>
<body>
    <div class="container">
        <h1>Thông tin tài khoản</h1>
        <div class="user-info">
            <div class="info-item">
                <label>Họ và tên:</label>
                <span><?php echo htmlspecialchars($user_info['fullname']); ?></span>
            </div>
            <div class="info-item">
                <label>Tài khoản:</label>
                <span><?php echo htmlspecialchars($user_info['username']); ?></span>
            </div>
            <div class="info-item">
                <label>Email:</label>
                <span><?php echo htmlspecialchars($user_info['email']); ?></span>
            </div>
            <div class="info-item">
                <label>Số điện thoại:</label>
                <span><?php echo htmlspecialchars($user_info['sdt']); ?></span>
            </div>
            <div class="info-item">
                <label>Giới tính:</label>
                <span><?php echo htmlspecialchars($user_info['gioitinh']); ?></span>
            </div>
        </div>
        <a href="index.php"><button class="btn-back-home">Trang chủ</button></a>
    </div>
</body>
</html>
<style type="text/css">
/* Đặt nền cho trang */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f7fc;
    margin: 0;
    padding: 0;
}

/* Container chính chứa thông tin */
.container {
    width: 80%;
    max-width: 900px;
    margin: 50px auto;
    padding: 30px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
}

/* Tiêu đề */
h1 {
    text-align: center;
    color: #5c6bc0; /* Màu xanh dương nhẹ */
    font-size: 36px;
    font-weight: 600;
    margin-bottom: 20px;
}

/* Mỗi mục thông tin người dùng */
.user-info {
    margin-top: 30px;
}

.info-item {
    display: flex;
    justify-content: space-between;
    padding: 12px 20px;
    border-bottom: 1px solid #ddd;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.info-item:last-child {
    border-bottom: none;
}

/* Nhãn (label) */
.info-item label {
    font-weight: bold;
    color: #555;
    width: 160px;
    font-size: 16px;
}

/* Nội dung thông tin */
.info-item span {
    font-size: 16px;
    color: #333;
}

/* Hiệu ứng hover cho mục thông tin */
.info-item:hover {
    background-color: #e8f0fe; /* Màu nền sáng nhẹ khi hover */
    cursor: pointer;
    transform: translateX(10px); /* Di chuyển nhẹ sang phải khi hover */
}

/* Hiệu ứng hover cho container */
.container:hover {
    background-color: #fafafa; /* Làm sáng màu nền container khi hover */
}

/* Tạo hiệu ứng cho màu sắc tiêu đề */
h1 {
    background: linear-gradient(90deg, #5c6bc0, #3f51b5); /* Gradient màu xanh dương */
    -webkit-background-clip: text;
    color: transparent;
}

/* Tạo bóng đổ cho các mục thông tin khi hover */
.info-item:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
/* Style cho nút "Trang chủ" */
.btn-back-home {
    background-color: #4CAF50; /* Màu nền xanh lá */
    color: white; /* Màu chữ trắng */
    padding: 10px 20px; /* Khoảng cách bên trong */
    text-align: center; /* Căn giữa chữ */
    text-decoration: none; /* Loại bỏ gạch chân */
    display: inline-block;
    border-radius: 5px; /* Bo tròn các góc */
    font-size: 16px;
    border: none;
    cursor: pointer; /* Con trỏ thay đổi khi di chuột lên nút */
    transition: background-color 0.3s ease, transform 0.2s ease; /* Thêm hiệu ứng */
}

/* Thêm hiệu ứng hover khi di chuột lên nút */
.btn-back-home:hover {
    background-color: #45a049; /* Tối màu nền khi hover */
    transform: scale(1.05); /* Phóng to nhẹ khi hover */
}


</style>