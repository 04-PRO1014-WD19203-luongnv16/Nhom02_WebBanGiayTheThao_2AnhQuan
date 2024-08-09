<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="index.php">Trang chủ</a></span> 
                    <span>Chi tiết đơn hàng</span>
                </p>
                <h1 class="mb-0 bread">Chi tiết đơn hàng</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid px-5">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center">Chi tiết đơn hàng</h1>

    <!-- Product Details -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <?php if (isset($hoa_don) && !empty($hoa_don)) {
                $first_don_hang = reset($hoa_don); // Lấy đơn hàng đầu tiên trong mảng
            ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin đơn hàng</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-3 font-weight-bold">Tên người nhận:</div>
                        <div class="col-sm-9"><?= $first_don_hang['ten_dang_nhap'] ?></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-3 font-weight-bold">Mã đơn hàng:</div>
                        <div class="col-sm-9"><?= $first_don_hang['ma_hoa_don'] ?></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-3 font-weight-bold">Địa chỉ:</div>
                        <div class="col-sm-9"><?= $first_don_hang['dia_chi'] ?></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-3 font-weight-bold">Email:</div>
                        <div class="col-sm-9"><?= $first_don_hang['email'] ?></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-3 font-weight-bold">SDT:</div>
                        <div class="col-sm-9"><?= $first_don_hang['sdt'] ?></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-3 font-weight-bold">Ngày tạo đơn:</div>
                        <div class="col-sm-9"><?= $first_don_hang['ngay_tao_don'] ?></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-3 font-weight-bold">Phương thức thanh toán:</div>
                        <div class="col-sm-9"><?= $first_don_hang['phuong_thuc_thanh_toan'] ?></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-3 font-weight-bold">Trạng thái giao hàng:</div>
                        <div class="col-sm-9">
                            <?php
                            $trang_thai = [
                                0 => 'Đang chờ xử lý',
                                1 => 'Đang giao',
                                2 => 'Đã giao',
                                3 => 'Đã hủy'
                            ];
                            echo $trang_thai[$first_don_hang['trang_thai_giao_hang']];
                            ?>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-3 font-weight-bold">Trạng thái thanh toán:</div>
                        <div class="col-sm-9"><?= $first_don_hang['trang_thai_thanh_toan'] ?></div>
                    </div>

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Thông tin sản phẩm</h6>
                    </div> 
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $stt = 1;
                                foreach ($hoa_don as $value) {
                                    $thanh_tien = $value['tong_gia_bien_the'];
                                    $gia_ban = $thanh_tien / $value['so_luong'];
                                    echo "<tr>
                                        <td>{$stt}</td>
                                        <td>{$value['ten_san_pham']}</td>
                                        <td><img src='uploads/{$value['hinh_anh_san_pham']}' alt='Ảnh sản phẩm' style='width: 100px;'></td>
                                        <td>" . number_format($gia_ban) . " đồng</td>
                                        <td>{$value['so_luong']}</td>
                                        <td>" . number_format($thanh_tien) . " đồng</td>
                                    </tr>";
                                    $stt++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-3 font-weight-bold">Tổng giá:</div>
                        <div class="col-sm-9"><?= number_format($first_don_hang['tong_don_hang']) ?> đồng</div>
                    </div>

                    <div class="row">
                        <div class="col-sm-9 offset-sm-3">
                            <a href="index.php?act=don_hang" class="btn btn-secondary">Quay lại</a>
                            <?php if ($first_don_hang['trang_thai_thanh_toan'] == "Đã thanh toán") { ?>

                                <?php
                                    if($dem !==0){
                                        ?>
                                       <span class="btn btn-warning btn-sm">Bạn đã đánh giá sản phẩm này rồi</span>

                                        <?php
                                    }else{
                                        ?>
                                         <a href="index.php?act=danh_gia&id_don=<?= $value['id_don_hang'] ?>" class="btn btn-success btn-sm">Đánh giá</a>
                                        <?php
                                    }
                                    ?>
                               
                            <?php } else { echo ""; } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            } else {
                echo "Không tìm thấy đơn hàng.";
            }
            ?>
        </div>
    </div>
</div>
