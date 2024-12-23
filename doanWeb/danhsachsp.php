<?php
if(!isset($_SESSION))
{
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Lộc Phát Computer mua bán thiết bị điện tử giá rẻ</title>
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
    <style>.btn-chitiet{
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
}</style>
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
                    include './connect_db.php';
                        $selectproduct = "SELECT * FROM `product` WHERE  `menu_id` =".$_GET['id'];
                        $result = mysqli_query($con,$selectproduct);
                        while($row = mysqli_fetch_array($result))
                        {    
                            // echo "<pre>";
                            // print_r($row);
                        ?>
                        <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="card-item">
                            <a href="chitietsp.php?id= <?php echo $row['id'] ?>" class="motsanpham"
                                style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom">
                                <img class="card-img-top anh" src="<?php echo $row['image'];?>">
                                <div class="card-body noidungsp mt-3">
                                    <h3 class="card-title ten"><?php echo $row['name']; ?></h3>
                                    <a href="chitietsp.php?id= <?php echo $row['id'] ?>  " class="btn btn-success" role="button">Chi tiết</a>
                                    <div class="gia d-flex align-items-baseline">
                                        <div class="giamoi"> <?php  echo number_format ($row['price']); ?> VNĐ</div> 
                                        <!-- <div class="giacu text-muted">139.000 ₫</div>
                                        <div class="sale">-20%</div> -->
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