<!-- // Kiểm tra và hiển thị chi tiết sản phẩm -->
<?php 
if ($one_san_pham !== false) {
    
    ?>
    <style>
        <style>
    .product-image {
        text-align: center;
        margin-bottom: 20px; 
    }

    .product-image img {
        max-width: 40%;
        height: 100px; 
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        transition: transform 0.3s ease; 
    }

    .product-image img:hover {
        transform: scale(1.05); 
    }
</style>
    </style>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Chi tiết sản phẩm</h1>

        <!-- Product Details -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Thông tin sản phẩm</h6>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-2 font-weight-bold">Tên sản phẩm:</div>
                            <div class="col-sm-10"><?= $one_san_pham['ten_san_pham'] ?></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-2 font-weight-bold">Mô tả:</div>
                            <div class="col-sm-10"><?= $one_san_pham['mo_ta'] ?></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-2 font-weight-bold">Lượt xem:</div>
                            <div class="col-sm-10"><?= $one_san_pham['luot_xem'] ?></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-2 font-weight-bold">Danh mục:</div>
                            <div class="col-sm-10"><?= $one_san_pham['ten_danh_muc'] ?></div>
                        </div>

                        <!-- Table for Sizes -->
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <h6 class="m-0 font-weight-bold text-primary">Thông tin chi tiết theo size</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Size</th>
                                                <th>Giá nhập</th>
                                                <th>Sale</th>
                                                <th>Giá bán</th>
                                                <th>Số lượng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $tong_so_luong =0?>
                                            <?php foreach ($one_san_pham['sizes'] as $size): ?>
                                                <?php $tong_so_luong +=$size['so_luong_ton'] ?>
                                                <tr>
                                                    <td><?= $size['size_name'] ?></td>
                                                    <td><?= $size['gia_nhap'] ?> đồng</td>
                                                    <td><?= $size['sale'] ?> %</td>
                                                    <td><?= $size['gia_ban'] ?> đồng</td>
                                                    <td><?= $size['so_luong_ton'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                         <!-- Column for Product Images -->
    
                <div class="card  mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Ảnh sản phẩm</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($one_san_pham['anh_san_pham'] as $image): ?>
                                <div class="col-sm-6 mb-3  product-image">
                                    <img src="../uploads/<?= $image ?>" class="img-fluid" alt="Ảnh sản phẩm">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
         
            <!-- End Column for Product Images -->
                        <div class="row mb-4">
                            <div class="col-sm-2 font-weight-bold">Tổng số lượng:</div>
                            <div class="col-sm-10"><?= $tong_so_luong ?></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 offset-sm-2">
                                <a href="index.php?act=san_pham" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <?php
} else {
    // Xử lý khi không tìm thấy sản phẩm hoặc có lỗi xảy ra
    echo "Không tìm thấy sản phẩm hoặc có lỗi xảy ra.";
}
?>