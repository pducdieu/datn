<?php
include 'connect_db.php'; // Kết nối cơ sở dữ liệu

// Cập nhật last_updated với thời gian hiện tại
$sql = "UPDATE `product` SET `last_updated` = CURRENT_TIMESTAMP";

// Thực thi câu lệnh SQL
if (mysqli_query($con, $sql)) {
    echo "Cập nhật thành công!";
} else {
    echo "Lỗi: " . mysqli_error($con);
}

// Đóng kết nối
mysqli_close($con);
?>