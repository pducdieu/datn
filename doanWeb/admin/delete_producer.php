<?php
    ?>
    <head>
        <style>
            .main-content {
                text-align: center;
                border: 1px solid;
                width: 100%;
            
            }  
            .main-content h1{
                color: #f44336;
                text-transform: uppercase;
            } 
            a{
                font-size: 30px;
                text-decoration: none;
                margin-bottom: 12px;
                display: block;
            }
            a:hover{
                color: #f44336;
            }

        </style>
    </head>
    <div class="main-content">
        <h1>Xóa sản phẩm</h1>
        <div id="content-box">
            <?php
            $error = false;
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                include 'connect_db.php';
                $result = mysqli_query($con, "DELETE FROM `producer` WHERE `id` = " . $_GET['id']);
                if (!$result) {
                    $error = "Không thể xóa sản phẩm.";
                }
                mysqli_close($con);
                if ($error !== false) {
                    ?>
                    <div id="error-notify" class="box-content">
                        <h2>Thông báo</h2>
                        <h4><?= $error ?></h4>
                        <a href="producer.php">Danh sách nhà cung cấp</a>
                    </div>
        <?php } else { ?>
                    <div id="success-notify" class="box-content">
                        <h2>Xóa thành công</h2>
                        <a href="producer.php" >Danh sách nhà cung cấp</a>
                    </div>
                <?php } ?>
    <?php } ?>
        </div>
    </div>
    <?php
?>