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

</style>
<section class="_1khoi sachmoi bg-white">
        <div class="container">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-left pb-2 bg-transparent pt-4">
                        <h1 class="header text-uppercase" style="font-weight: 400;">CASE BUILD SẴN </h1>
                        <a href="tongsp.php" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                </div>
                <div class="khoisanpham" style="padding-bottom: 2rem;">
                <?php
                                $sql = "SELECT * FROM product WHERE menu_id=1 LIMIT 8 ";
                                $result = mysqli_query($con,$sql);
                                while($row = mysqli_fetch_array($result))
                                {
                            ?>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                       <div class="card-item">
                           <a href="chitietsp.php?id= <?php echo $row['id'] ?>" class="motsanpham"
                               style="text-decoration: none; color: black;" data-toggle="tooltip"
                               data-placement="bottom" title="">
                               <img class="card-img-top anh" src="<?php echo $row['image'];?>" >
                               <div class="card-body noidungsp mt-3">
                                   <h6 class="card-title ten"><?php echo $row['name']; ?></h6>
                                   <a href="chitietsp.php?id= <?php echo $row['id'] ?>  " class="btn btn-success" role="button">Chi tiết</a>
                                   <div class="gia d-flex align-items-baseline">
                                   <div class="giamoi"> <?php  echo number_format ($row['price'])  ?> đ</div> 
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
        
        <div class="container">
            <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-left pb-2 bg-transparent pt-4">
              <h2 class="header text-uppercase" style="font-weight: 400;"> Màn hình </h2>
            </div>
        </div>
                <div class="khoisanpham" style="padding-bottom: 2rem;">
                <?php
                                $sql = "SELECT * FROM product WHERE menu_id=2 LIMIT 8";
                                $result = mysqli_query($con,$sql);
                                while($row = mysqli_fetch_array($result))
                                {
                            ?>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                       <div class="card-item">
                           <a href="chitietsp.php?id= <?php echo $row['id'] ?>" class="motsanpham"
                               style="text-decoration: none; color: black;" data-toggle="tooltip"
                               data-placement="bottom" title="">
                               <img class="card-img-top anh" src="<?php echo $row['image'];?>" >
                               <div class="card-body noidungsp mt-3">
                                   <h6 class="card-title ten"><?php echo $row['name']; ?></h6>
                                   <a href="chitietsp.php?id= <?php echo $row['id'] ?>  " class="btn btn-success" role="button">Chi tiết</a>
                                   <div class="gia d-flex align-items-baseline">
                                   <div class="giamoi"> <?php  echo number_format ($row['price']) ; ?> VNĐ</div> 
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
        
        <div class="container">
            <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-left pb-2 bg-transparent pt-4">
                <h3 class="header text-uppercase" style="font-weight: 400;"> Linh kiện </h3>
            </div>
        </div>
                <div class="khoisanpham" style="padding-bottom: 2rem;">
                <?php
                                $sql = "SELECT * FROM product WHERE menu_id=3 LIMIT 8";
                                $result = mysqli_query($con,$sql);
                                while($row = mysqli_fetch_array($result))
                                {
                            ?>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                       <div class="card-item">
                           <a href="chitietsp.php?id= <?php echo $row['id'] ?>" class="motsanpham"
                               style="text-decoration: none; color: black;" data-toggle="tooltip"
                               data-placement="bottom" title="">
                               <img class="card-img-top anh" src="<?php echo $row['image'];?>" >
                               <div class="card-body noidungsp mt-3">
                                   <h6 class="card-title ten"><?php echo $row['name']; ?></h6>
                                   <a href="chitietsp.php?id= <?php echo $row['id'] ?>  " class="btn btn-success" role="button">Chi tiết</a>
                                   <div class="gia d-flex align-items-baseline">
                                   <div class="giamoi"> <?php  echo number_format ($row['price']) ; ?> VNĐ</div> 
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


    </section>
   