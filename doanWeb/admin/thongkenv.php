<?php
include 'connect_db.php';

// Nhận giá trị tháng và năm từ người dùng
$month = isset($_GET['month']) ? intval($_GET['month']) : date('m'); // Mặc định là tháng hiện tại
$year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');   // Mặc định là năm hiện tại

// Tính khoảng thời gian theo Unix timestamp
$start_of_month = strtotime("{$year}-{$month}-01 00:00:00"); // Đầu tháng
$end_of_month = strtotime("{$year}-{$month}-01 00:00:00 +1 month -1 second"); // Cuối tháng

$totaltt=0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê Doanh Thu</title>
    <link rel="icon" type="../logo/png" sizes="32x32" href="">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>
<body>
    <h1>Thống Kê Doanh Thu</h1>
    <form method="GET" action="">
        <label for="month">Chọn tháng:</label>
        <select name="month" id="month">
            <?php for ($i = 1; $i <= 12; $i++): ?>
                <option value="<?= $i ?>" <?= $i == $month ? 'selected' : '' ?>><?= $i ?></option>
            <?php endfor; ?>
        </select>
        <label for="year">Chọn năm:</label>
        <select name="year" id="year">
            <?php for ($y = 2020; $y <= date('Y'); $y++): ?>
                <option value="<?= $y ?>" <?= $y == $year ? 'selected' : '' ?>><?= $y ?></option>
            <?php endfor; ?>
        </select>
        <button type="submit">Xem thống kê</button>
    </form>
<?php
    $category = mysqli_query($con, "SELECT * FROM `orders` WHERE `status` = 2 AND `last_updated` BETWEEN $start_of_month AND $end_of_month");
                if ($category && mysqli_num_rows($category) > 0) 

                {
    
?>
    <h2>Doanh thu tháng <?= $month ?>/<?= $year ?>:</h2>
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <tr>
            <td>Mã đơn hàng</td>
            <td>Họ tên</td>
            <td>Sản phẩm</td>
            <td>Số lượng</td>
            <td>Thời gian</td>
            <td>Số tiền</td>
        </tr>
        <?php
                
                while($thongke = mysqli_fetch_assoc($category)){
           
                // Truy vấn chi tiết đơn hàng dựa trên id đơn hàng
                $category_tk = mysqli_query($con, "SELECT * FROM `orders_detail` WHERE `order_id` = '{$thongke['id']}'");
                
                // Kiểm tra có dữ liệu chi tiết đơn hàng không
                
                    while ($row_tk = mysqli_fetch_assoc($category_tk)) {
                        $tien=$row_tk['quantity']*$row_tk['price'];
                        $totaltt= $totaltt+ $tien;
                        ?>
                        
                            <tr>
                                <td><?php echo $thongke['id']; ?></td>
                                <td><?php echo $thongke['name']; ?></td>
                                <td><?php echo $row_tk['product_name']; ?></td>
                                <td><?php echo $row_tk['quantity']; ?></td>
                                <td><?php echo date('d/m/Y H:i:s', $row_tk['time']); ?></td> <!-- Đổi timestamp thành định dạng ngày giờ -->
                                <td><?php echo $tien; ?></td>
                            </tr>
                            <?php
                        
                    }
                }
                
            
            
        ?>
        <tr>
                <td>Tổng Doanh Thu</td>
                <td><?php echo $totaltt; ?></td>
                </tr>
           <?php
     }
      else { echo "<tr><td colspan='1' >Không có dữ liệu!!!!!</td></tr>";}?>     
    </table>
    <a href="./indexnv.php">Quay lại</a>
</body>
</html>
