<?php
if(!isset($_SESSION))
{
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Computer Store mua bán thiết bị điện tử giá rẻ</title>
    <meta name="description"
        content="Chuyên cung cấp đầy đủ linh kiện điện tử đáp ứng theo nhu cầu của khách hàng">
    <meta name="keywords" content="nhà sách online, mua sách hay, sách hot, sách bán chạy, sách giảm giá nhiều">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/home.css">
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="fontawesome_free_5.13.0/css/all.css">
    <link rel="stylesheet" href="css/sach-moi-tuyen-chon.css">
    <link rel="stylesheet" href="css/reponsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" />
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    <link rel="canonical" href="">
    <meta name="google-site-verification" content="urDZLDaX8wQZ_-x8ztGIyHqwUQh2KRHvH9FhfoGtiEw" />
    <link rel="icon" type="logo/png" sizes="32x32" href="">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <style>
         .btn-chitiet{
            color: #fff;
    background-color: #ffc107;
    border-color: #ffc107;
    }
    /* Style cho card-item */
.card-item {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border: 1px solid #ddd;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-item:hover {
  transform: translateY(-10px); /* Nâng sản phẩm lên */
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Tạo bóng mờ đậm hơn khi hover */
}

.card-img-top {
  max-width: 100%;
  height: auto;
  transition: transform 0.3s ease;
}

.card-item:hover .card-img-top {
  transform: scale(1.05); /* Phóng to ảnh một chút khi hover */
}

.card-body {
  padding: 15px;
}

.ten {
  font-size: 16px;
  font-weight: 600;
  color: #333;
  margin-bottom: 10px;
}

.giamoi {
  font-size: 18px;
  color: #f44336;
  font-weight: bold;
}

.btn {
  background-color: #28a745;
  color: white;
  border-radius: 5px;
  padding: 8px 15px;
  font-weight: bold;
  transition: background-color 0.3s ease;
}

.btn:hover {
  background-color: #218838;
}
.pagination-container {
    text-align: center; /* Căn giữa nội dung trong phần tử */
    margin-top: 20px;   /* Khoảng cách phía trên */
}

.pagination-container a {
    margin: 0 10px; /* Khoảng cách giữa các liên kết phân trang */
    padding: 4px 16px;
    
    border-radius: 4px;
    
    text-decoration: none;
}

.pagination-container a:hover {
    background-color: red;
    color: white;
}

.pagination-container span {
    margin: 0 10px;
    padding: 4px 16px;
    
    border-radius: 4px;
    color: red;
}
    </style>
</head>

<body>
    <!-- code cho nut like share facebook  -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>
        <?php
    include 'main/header/pre-header.php'
    ?>

    <?php
    include 'main/header/danhmuc.php';
    ?>
    <?php
    include 'main/header/banner.php';
    ?>
<section class="content my-4">
    <div class="container"> 
        <div class="noidung bg-white" style=" width: 100%;">
            <div class="items">
                <div class="row">
                <?php
                    $results_per_page = 8; // Số sản phẩm mỗi trang

                    // Xác định số trang hiện tại
                    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1; // Nếu không có trang, mặc định là trang 1
                    }   

                    // Tính toán vị trí bắt đầu cho truy vấn (OFFSET)
                    $start_from = ($page - 1) * $results_per_page;

                    // Kiểm tra tìm kiếm và thực hiện truy vấn với phân trang
                    if (isset($_GET['search']) && !empty($_GET['search'])) {
                        $kw = $_GET["search"];
                        $sql = "SELECT * FROM product WHERE `name` LIKE '%$kw%' LIMIT $start_from, $results_per_page";
                    } else {
                        $sql = "SELECT * FROM product LIMIT $start_from, $results_per_page";
                    }

                    // Thực hiện truy vấn
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                       <div class="card-item">
                           <a href="chitietsp.php?id=<?php echo $row['id']; ?>" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="">
                               <img class="card-img-top anh" src="<?php echo $row['image']; ?>" >
                               <div class="card-body noidungsp mt-3">
                                   <h6 class="card-title ten"><?php echo $row['name']; ?></h6>
                                   <a href="chitietsp.php?id=<?php echo $row['id']; ?>" class="btn btn-success" role="button">Chi tiết</a>
                                   <div class="gia d-flex align-items-baseline">
                                       <div class="giamoi"> <?php echo number_format($row['price']); ?> VNĐ</div> 
                                   </div>
                               </div>
                           </a>
                       </div>
                    </div>
                <?php
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Phân trang -->
<?php
// Tính toán tổng số sản phẩm
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $kw = $_GET["search"];
    $sql_count = "SELECT COUNT(*) AS total FROM product WHERE `name` LIKE '%$kw%'";
} else {
    $sql_count = "SELECT COUNT(*) AS total FROM product";
}
$result_count = mysqli_query($con, $sql_count);
$row_count = mysqli_fetch_assoc($result_count);
$total_results = $row_count['total'];

// Tính toán số trang cần thiết
$total_pages = ceil($total_results / $results_per_page);

// Hiển thị các liên kết phân trang
echo '<div class="pagination-container">';
if ($page > 1) {
    echo '<a href="?page=1">Đầu</a>';
    echo '<a href="?page=' . ($page - 1) . '">Trước</a>';
}
for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        echo '<span>' . $i . '</span>';
    } else {
        echo '<a href="?page=' . $i . '">' . $i . '</a>';
    }
}
if ($page < $total_pages) {
    echo '<a href="?page=' . ($page + 1) . '">Tiếp</a>';
    echo '<a href="?page=' . $total_pages . '">Cuối</a>';
}
echo '</div>';
?>

    <div class="fixed-bottom">
        <div class="btn btn-warning float-right rounded-circle nutcuonlen" id="backtotop" href="#"
            style="background:#CF111A;"><i class="fa fa-chevron-up text-white"></i></div>
    </div>
    <?php
    include 'main/footer/dichvu.php';
    ?>
    <?php
    include 'main/footer/footer.php';
    ?>

</body>

</html>