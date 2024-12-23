<?php
if (!isset($_SESSION)) 
{
        session_start();
}
if(!isset($_SESSION['admin'])){
    header('location: login.php');
}

?>
<?php
include 'connect_db.php';

$category = mysqli_query($con, "SELECT * FROM `product` ORDER BY `sldb` DESC LIMIT 5 ");
//B1: tính tổng số bản ghi

$total_p = mysqli_num_rows($category);



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
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

<body class="theme-red">
    <!-- Page Loader -->
   
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="indexk.php">ADMIN PAGE</a>
            </div>
            
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <?php
            include "info.php";
            ?>
            <!-- #User Info -->
            <!-- Menu -->
           <div class="menu">
                <ul class="list">
                    <li class="header">Main</li>
                    <li class="active">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Quản lý</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="producerk.php">Quản lý danh mục</a>
                            </li>
                            
                            <li>
                                <a href="ksanpham.php">Quản lý sản phẩm</a>
                            </li>

                            <li>
                                <a href="thongkek.php">Thống kê</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                   
                   
                    <li>
                        <a href="../index.php">
                            <i class="material-icons">update</i>
                            <span>Về trang user</span>
                        </a>
                    </li>
                   
                </ul>
            </div>
            
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
       
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>QUẢN LÝ</h2>
            </div>

            <!-- Widgets -->
            <?php
            include "quanlyk.php";
            ?>
            <div class="table-responsive">
                            <h3>Top 5 sản phẩm bán chạy</h3>
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng tồn kho</th>
                                            <th>Số lượng đã bán</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    date_default_timezone_set('Asia/Saigon');
                                    while ($row = mysqli_fetch_array($category)) { 
                                    ?>
                                
                                        <tr> 
                                            <td><img src="../<?= $row['image'] ?>" width="250" height="150"/></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= number_format ($row['price']) ?> đ</td>
                                            <td><?=$row['sltk']?></td>
                                            <td><?=$row['sldb']?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                     
                                </table>
                                <h3>Top 5 sản phẩm bán chậm</h3>
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng tồn kho</th>
                                            <th>Sô lượng đã bán</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    date_default_timezone_set('Asia/Saigon');
                                    $category = mysqli_query($con, "SELECT * FROM `product` ORDER BY `sldb` ASC LIMIT 5 ");
                                    while ($row = mysqli_fetch_array($category)) { 
                                    ?>
                                
                                        <tr> 
                                            <td><img src="../<?= $row['image'] ?>" width="250" height="150"/></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= number_format ($row['price']) ?> đ</td>
                                            <td><?=$row['sltk']?></td>
                                            <td><?=$row['sldb']?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                     
                                </table>
            </div>

            
        </div>
        <?php
    if(isset($_GET['click'])=='logout')
    unset($_SESSION['current_user']);
    
    ?>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>
    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
