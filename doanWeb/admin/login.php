<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Đăng nhập hệ thống</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: #fff;
    }

    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }
  </style>
    </head>
    <body>
         <?php
          include './connect_db.php';

          $error = ""; // Biến chứa thông báo lỗi
          $redirectURL = ""; // Biến để điều hướng dựa trên chức vụ nhân viên

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kiểm tra xem người dùng đã nhập đủ thông tin chưa
          if (empty($_POST['username']) || empty($_POST['password'])) {
            $error = "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.";
          } else {
        // Lấy thông tin từ form
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

        // Sử dụng prepared statement để bảo mật
            $query = "SELECT `id`, `username`, `password`, `cvnv` FROM `admin` WHERE `username` = ?";
        // Chuẩn bị câu truy vấn
            $statement = mysqli_prepare($con, $query);

        // Kiểm tra nếu prepared statement đã được tạo thành công
            if ($statement === false) {
              die('Lỗi khi chuẩn bị truy vấn: ' . mysqli_error($con));
            }

        // Liên kết các tham số vào prepared statement
            mysqli_stmt_bind_param($statement, "s", $username);

        // Thực thi câu truy vấn
            mysqli_stmt_execute($statement);

        // Lấy kết quả
            $result = mysqli_stmt_get_result($statement);

            if (mysqli_num_rows($result) > 0) {
              $admin = mysqli_fetch_assoc($result);            
              if ( $username ==$admin['username']&& $password== $admin['password']) {
                // Đăng nhập thành công, lưu thông tin vào session
                $_SESSION['admin'] = $admin;

                // Kiểm tra chức vụ nhân viên và điều hướng
                switch ($admin['cvnv']) {
                    case 1: // Nhân viên bán hàng
                        $redirectURL = "indexnv.php";
                        break;
                    case 2: // Nhân viên kho
                        $redirectURL = "indexk.php";
                        break;
                    case 0: // Admin
                        $redirectURL = "index.php";
                        break;
                    default:
                        $error = "Chức vụ không hợp lệ.";
                        break;
                }
            } else {
                // Mật khẩu không chính xác
                $error = "Mật khẩu không chính xác.";
            }
        } else {
            // Không tìm thấy tài khoản
            $error = "Tên đăng nhập không tồn tại.";
        }

        // Đóng prepared statement
        mysqli_stmt_close($statement);
    }

    // Đóng kết nối cơ sở dữ liệu
    mysqli_close($con);

    // Nếu có URL điều hướng, thực hiện điều hướng
    if (!empty($redirectURL)) {
        header("Location: $redirectURL");
        exit;
    }
}
?> 
</body>
</html>

<body>
    <?php 
    // Nếu người dùng chưa đăng nhập, hiển thị form đăng nhập
    if (empty($_SESSION['admin'])) { ?>
        <div class="section"></div>
        <main>
            <center>
                <img class="responsive-img" style="width: 250px;" src="https://i.imgur.com/ax0NCsK.gif" />
                <div class="section"></div>
                <h5 class="indigo-text">Đăng nhập vào tài khoản của bạn</h5>
                <div class="section"></div>
                <?php 
                // Hiển thị lỗi nếu có
                if (!empty($error)) { ?>
                    <div class="error" style="color: red;"><?= htmlspecialchars($error) ?></div>
                <?php } ?>
                <div class="container">
                    <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                        <form class="col s12" action="" method="post" autocomplete="off">
                            <div class='row'>
                                <div class='col s12'></div>
                            </div>
                            <div class='row'>
                                <div class='input-field col s12'>
                                    <input class='validate' type='text' name='username' />
                                    <label>Nhập tên đăng nhập</label>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='input-field col s12'>
                                    <input class='validate' type='password' name='password' />
                                    <label>Nhập mật khẩu</label>
                                </div>
                            </div>
                            <br />
                            <center>
                                <div class='row'>
                                    <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Đăng nhập</button>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
            </center>
        </main>
     <?php } else { 
        // Nếu đã đăng nhập, điều hướng đến trang phù hợp với chức vụ
        header("Location: $redirectURL");
        exit;
    } ?> 
</body>

<html>
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">  
</head>
<body>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>

</html>


