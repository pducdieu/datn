<?php
include 'connect_db.php';

$category = mysqli_query($con, "SELECT producer.id AS producer_id, 
                                       producer.name AS producer_name, 
                                       producer.address, 
                                       producer.image, 
                                       menu_product.name AS menu_product_name, 
                                        producer.description,
                                       producer.isActive 
                                FROM producer 
                                INNER JOIN menu_product 
                                ON producer.menu_id = menu_product.id");
//B1: tính tổng số bản ghi

$total = mysqli_num_rows($category);

//B2 : THiết lập số bảng ghi trên 1 trang
$limit = 7;
//B3: tính số trang
$page = ceil($total / $limit);
//B4: lấy trang hiện tại
$current_page = (isset($_GET['page']) ? $_GET['page'] : 1);
//B5: tính start
$start = ($current_page - 1) * $limit;
//B6: query sử dụng limit
$category = mysqli_query($con, "SELECT producer.id AS producer_id, 
                                       producer.name AS producer_name, 
                                       producer.address, 
                                       producer.image, 
                                       menu_product.name AS menu_product_name, 
                                        producer.description,
                                       producer.isActive 
                                FROM producer 
                                INNER JOIN menu_product 
                                ON producer.menu_id = menu_product.id 
                                LIMIT $start, $limit");
    ?>
<!DOCTYPE html>
<html>

<head>
    <style>
       img{
  width: 100%;
}
.buttons{
    text-align: right;
    font-weight: bold;
    font-size: 16px;
    margin-bottom: 15px;
    line-height: 38px;
}
.buttons a{
    color: #FFF;
    padding: 10px;
    background: #f44336;
}
 .buttons a:hover {
    color: #ffffff;
    text-decoration: none;
    opacity: 0.8;
}
.page-item {
    border: 1px solid rgba(0,0,0,0.4);
    width: 35px;
    display: inline-block;
    text-align: center;
    line-height: 20px;
    color: black;
}

    </style>
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
                <a class="navbar-brand" href="index.php">ADMIN PAGE</a>
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
                <h2>Quản lý</h2>
            </div>

            <!-- Widgets -->
            <?php
            include "quanlyk.php";
            ?>
            <!-- #END# Widgets -->
            
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Quản lý nhà cung cấp
                            </h2>
                        </div>
                        <div class="body">
                        <div class="buttons">
                            <a href="./them_sua_producer.php">Thêm nhà cung cấp</a>
                             </div>
                            <div class="table-responsive">
                            
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Mã nhà cung cấp</th>
                                            <th>Tên nhà cung cấp</th>
                                            <th>Địa chỉ</th>
                                            <th>Hình ảnh</th>
                                            <th>Thể loại</th>
                                            <th>Trạng thái</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    date_default_timezone_set('Asia/Saigon');
                                    while ($row = mysqli_fetch_array($category)) { 
                                    ?>
                                
                                        <tr> 
                                            <td><?= $row['producer_id'] ?></td>
                                            <td><?= $row['producer_name'] ?></td>
                                            <td><?= $row['address'] ?></td>
                                            <td><img src="../<?= $row['image'] ?>" alt="Hình ảnh" style="max-width: 100px; max-height: 100px;" /></td>
                                            <td><?= $row['menu_product_name'] ?></td>
                                            <td><?= $row['isActive'] ?></td>
                                            <td><a href="./them_sua_producer.php?id=<?= $row['producer_id'] ?>" class="btn btn-danger">Sửa</a></td>
                                            <td><a href="./delete_producer.php?id=<?= $row['producer_id'] ?>" class="btn btn-danger">Xóa</a></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                     
                                </table>
                                <div class="pagination-bar my-3">
                                <div class="col-12">
                                    <nav>
                                        <ul class="pagination justify-content-center">
                                        
                                        <ul class="pagination">
                                           
                                        <?php if($current_page -1 > 0) { ?>
                                            <li><a href="sanpham.php?page=<?php echo $current_page -1 ?>">&laquo;</a></li>
                                            <?php } ?>
                                            <?php for($i=1; $i<=$page ;$i++) { ?>
                                                <li class="<?php echo ($current_page ==$i) ? 'active' : '' ?>"><a href="sanpham.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                                              <?php  }?>
                                              
                                              <?php if($current_page +1 <= $page ) { ?>
                                            <li><a href="sanpham.php?page=<?php echo $current_page +1 ?>">&raquo;</a></li>
                                            <?php } ?>
                                        </ul>
                                        
                                        
                                        </ul>
                                    </nav>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            
        </div>
        <?php


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
