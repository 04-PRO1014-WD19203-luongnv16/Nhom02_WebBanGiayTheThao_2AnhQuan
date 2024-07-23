<div class="hero-wrap hero-bread" style="background-image: url('/duan1/view/images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ</a></span> <span></span></p>
                <h1 class="mb-0 bread">Cảm ơn quý khách</h1>
            </div>
        </div>
    </div>
</div>


<?php 

if(isset($hoa_don) && !empty($hoa_don)){
 
    // Hiển thị thông tin chung của đơn hàng
    $first_don_hang = reset($hoa_don); // Lấy đơn hàng đầu tiên trong mảng
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-body">
                        <h2 class="card-title">Cảm ơn quý khách đã đặt hàng!</h2>
                        <ul class="list-unstyled">
                            <li>Mã đơn hàng:<?=$first_don_hang['ma_hoa_don']?></li>
                            <li>Ngày đặt hàng: <?=$first_don_hang['ngay_tao_don']?></li>
                            <li>Giảm giá: <span style="color: red; font-weight: 600;">-  VNĐ</span></li>
                            <li>Tổng đơn hàng: <?=number_format($first_don_hang['tong_don_hang'])?> <span style="color: red; font-weight: 600;"> VNĐ</span></li>
                            <li>Phương thức thanh toán: <?=$first_don_hang['phuong_thuc_thanh_toan']?></li>
                            <li>Trạng thái đơn hàng: <?=$first_don_hang['trang_thai_thanh_toan']?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hiển thị danh sách sản phẩm và size -->
    <div class="container mt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách sản phẩm</h5>
                        <ul class="list-unstyled">
                            <?php foreach ($hoa_don as $don_hang): ?>
                                <li><?=$don_hang['ten_san_pham']?> - Size <?=$don_hang['size_name']?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 

} else {
    echo "Không tìm thấy đơn hàng.";
}
?>
<div class="text-center mt-4 mb-5">
    <a href="index.php" class="btn btn-primary">Quay lại</a>
</div>
