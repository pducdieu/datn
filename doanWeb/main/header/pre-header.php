
<nav class="navbar navbar-expand-md bg-white navbar-light">
        <div class="container">
            <!-- logo  -->
           <div>
        
           <a class="navbar-brand" href="./index.php" style="color: #CF111A;">
           <img src="logo/ad1.png" width="70px">
           <b>Lộc Phát </b>Computer</img></a>
           </div>

            <!-- navbar-toggler  -->
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <!-- form tìm kiếm  -->
                <form action="tongsp.php" class="form-inline ml-auto my-2 my-lg-0 mr-3" method="GET">
                    <div class="input-group" style="width: 500px;">
                        <input type="text" class="form-control" aria-label="Small"
                            name="search"  placeholder="Nhập sách cần tìm kiếm..." value = "<?php if(isset($_GET["search"])) { echo $_GET["search"]; } ?>">
                        <div class="input-group-append" >
                            <button type="submit" class="btn" style="background-color: white; color: black; ">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- ô đăng nhập đăng ký giỏ hàng trên header  -->
               <?php
                include 'taikhoan.php';
               ?>
                <?php
                include 'giohang.php';
               ?>
            </div>
            
        </div>
    </nav>