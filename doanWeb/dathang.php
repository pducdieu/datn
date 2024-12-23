<?php
if(!isset($_SESSION))
{
    session_start();
}
include './connect_db.php';



?>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: 'Roboto', sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f9f9f9;
}

.containerr {
  background-color: #ffffff;
  max-width: 800px;
  margin: 30px auto;
  padding: 20px 30px;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

h2 {
  text-align: center;
  margin-bottom: 20px;
  color: #333;
}

input[type="text"],
input[type="email"],
input[type="tel"],
textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
  font-size: 16px;
}

label {
  font-size: 16px;
  font-weight: 500;
  margin-bottom: 6px;
  display: inline-block;
  color: #555;
}

input[type="submit"] {
  background-color: #28a745;
  color: white;
  padding: 14px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  font-weight: 600;
  width: 100%;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
  background-color: #218838;
}

.radio-group {
  display: flex;
  align-items: center;
  gap: 10px;
}

.radio-group input {
  margin: 0;
}

textarea {
  height: 120px;
}

@media screen and (max-width: 600px) {
  .container {
    padding: 15px;
  }
}
</style>
<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Lộc Phát Computer mua bán thiết bị điện tử giá rẻ</title>
    <meta name="description"
        content="Chuyên cung cấp đầy đủ linh kiện điện tử đáp ứng theo nhu cầu của khách hàng">
    <meta name="keywords" content="">
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
    <style>img[alt="www.000webhost.com"]{display: none;}</style>
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
   $name = isset($_POST['name']) ? $_POST['name'] : '';
   $email = isset($_POST['email']) ? $_POST['email'] : '';
   $address = isset($_POST['address']) ? $_POST['address'] : '';
   $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    if($name == '' || $address == '' || $phone =='' || $email ='')
    {
      ?>
    <?php
    }   
   ?>
<body>
<div class="containerr">
  <form action="./danhsachdathang.php" method="post">
    <label for="name">Họ và tên</label>
    <input type="text" id="name" name="name" placeholder="Nhập tên của bạn" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>

    <label for="address">Địa chỉ</label>
    <input type="text" id="address" name="address" placeholder="Nhập địa chỉ của bạn" required>

    <label for="phone">Số điện thoại</label>
    <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại của bạn" pattern="^0[0-9]{9}$" required>

    <label for="content">Nội dung</label>
    <textarea id="content" name="content" placeholder="Nhập nội dung đơn hàng (nếu có)"></textarea>

    <label>Phương thức thanh toán</label>
    <div class="radio-group">
      <input type="radio" id="cod" name="payment" value="COD" required>
      <label for="cod">Thanh toán khi nhận hàng</label>
    </div>

    <input type="submit" name="send" value="Xác nhận">
  </form>
</div>
<?php
    include 'main/footer/dichvu.php';
    ?>
    <?php
    include 'main/footer/footer.php';
    ?>
</body>
</html>