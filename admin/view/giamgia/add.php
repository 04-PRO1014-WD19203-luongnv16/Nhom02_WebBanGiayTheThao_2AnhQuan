<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Thêm mã giảm giá</h1>

                    <!-- Add Product Form -->
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="index.php?act=them_ma" method="post">
                                <!-- Product Name -->
                                <div class="form-group">
                                    <label for="productName">Mã giảm giá</label>
                                    <input type="text" class="form-control" id="ten_ma" name="ten_ma" value="<?= $ten_ma ?>">
                                    <span style="color:red;">
                                        <?php 
                                            if(isset($loi_ten)){
                                                echo $loi_ten;
                                            } else {
                                                $loi_ten = "";
                                            }
                                        ?>
                                    </span>
                                </div>
                                

                                <div class="form-group">
                                    <label for="productName">Giá trị</label>
                                    <input name="giam_gia" type="number" class="form-control" id="productName">
                                    <span style="color:red;">
                                        <?php 
                                            if(isset($loi_giam_gia)){
                                                echo $loi_giam_gia;
                                            } else {
                                                $loi_giam_gia = "";
                                            }
                                        ?>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="productName">Ngày bắt đầu</label>
                                    <input name="ngay_bat_dau" type="date" class="form-control" id="productName">
                                    <span style="color:red;">
                                        <?php 
                                            if(isset($loi_ngay_bat_dau)){
                                                echo $loi_ngay_bat_dau;
                                            } else {
                                                $loi_ngay_bat_dau = "";
                                            }
                                        ?>
                                    </span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="productName">Ngày kết thúc</label>
                                    <input name="ngay_ket_thuc" type="date" class="form-control" id="productName">
                                    <span style="color:red;">
                                        <?php 
                                            if(isset($loi_ngay_ket_thuc)){
                                                echo $loi_ngay_ket_thuc;
                                            } else {
                                                $loi_ngay_ket_thuc = "";
                                            }
                                        ?>
                                    </span>
                                </div>

                                <!-- Add Product Button -->
                                <input name="them_btn" type="submit" class="btn btn-primary" value="Thêm mã">
                                <span style="color:red;">
                                        <?php 
                                            if(isset($thongbao)){
                                                echo $thongbao;
                                            } else {
                                                $thongbao = "";
                                            }
                                        ?>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
