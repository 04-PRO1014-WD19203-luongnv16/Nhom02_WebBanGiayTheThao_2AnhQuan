<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ</a></span> <span>Đơn hàng của bạn</span></p>
                <h1 class="mb-0 bread">Đơn hàng của bạn</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 order-md-last">
                <div class="row">
                    <!-- Điều hướng trạng thái đơn hàng -->


                    <!-- Bảng danh sách đơn hàng -->
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Số lượng sản phẩm</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng giá trị đơn hàng</th>
                                    <th>Trạng thái</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Tình trạng đơn hàng</th>
                                    <th>Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($hoa_don as $key => $value) {
                                   ?>
                                                                   <tr>
                                    <td><?=$value['ma_hoa_don']?></td>
                                    <td><?=$value['tong_so_luong_san_pham'] ?></td>
                                    <td><?=$value['ngay_tao_don'] ?></td>
                                    <td><?=number_format($value['tong_don_hang'] )?> Đồng</td>
                                    <td>
    <?php 
    if ($value['trang_thai_giao_hang'] == 0) {
        echo "Chờ xử lý";
    } elseif ($value['trang_thai_giao_hang'] == 1) {
        echo "Đang giao";
    } elseif ($value['trang_thai_giao_hang'] == 2) {
        echo "Đã giao";
    } elseif ($value['trang_thai_giao_hang'] == 3) {
        echo "Đã hủy";
    } 
    ?>
</td>

                                    <td><?=$value['phuong_thuc_thanh_toan'] ?></td>
                                    <td>
                                        <?php 
                                        if($value['trang_thai_giao_hang'] == 3 ){
                                            ?>
                                            <a href="#" class="btn btn-danger btn-sm">Đã hủy</a>
                                            <?php
                                        }else{
                                            ?>
                                                                                <a href="index.php?act=don_hang&da_nhan=<?=$value['id_don_hang'] ?>" class="btn btn-success btn-sm">Đã nhận hàng</a>
    <?php if ($value['trang_thai_giao_hang'] == 0 || $value['trang_thai_giao_hang'] == 1) { ?>
        <a href="#" class="btn btn-warning btn-sm">Chưa nhận</a>
    <?php } ?>
                                            <?php
                                        }
                                        ?>


</td>


<td>
    <a href="#" class="btn btn-primary btn-sm">Xem chi tiết</a>
    <?php if ($value['trang_thai_giao_hang'] == 0) { ?>
        <a href="index.php?act=don_hang&huy_don=<?=$value['id_don_hang'] ?>" class="btn btn-danger btn-sm">Hủy đơn</a>
    <?php } ?>
</td>

                                </tr>
                             
                                <!-- Thêm nhiều đơn hàng giả định khác nếu cần -->
                                   <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


