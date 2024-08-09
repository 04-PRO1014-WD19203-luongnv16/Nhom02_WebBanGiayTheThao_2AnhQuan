<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ</a></span> <span>Đánh giá sản phẩm</span></p>
                <h1 class="mb-0 bread">Đánh giá sản phẩm</h1>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid px-5">
    <?php if (is_array($hoa_don)) extract($hoa_don); ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center">Đánh giá sản phẩm</h1>

    <!-- Review Form -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Đánh giá sản phẩm của bạn</h6>
                </div>
                <div class="card-body">
                <form action="index.php?act=binh_luan" method="POST">
    <div class="form-group row mb-4">
        <label for="ten_nguoi_danh_gia" class="col-sm-3 col-form-label font-weight-bold">Tên của bạn:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="ten_nguoi_danh_gia" name="ten_nguoi_danh_gia" value="<?= $_SESSION['user']['ten_dang_nhap'] ?>" required>
        </div>
    </div>
    <div class="form-group row mb-4">
        <label for="email" class="col-sm-3 col-form-label font-weight-bold">Email:</label>
        <div class="col-sm-9">
            <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['user']['email'] ?>" required>
        </div>
    </div>
    <?php foreach ($san_pham_list as $sp) { ?>
    <div class="form-group row mb-4">
        <label class="col-sm-3 col-form-label font-weight-bold">Sản phẩm:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control mb-2" value="<?= $sp['ten_san_pham'] ?>" disabled>
            <input type="hidden" name="id_san_pham[]" value="<?= $sp['id_san_pham'] ?>">
            <input type="hidden" name="id_don_hang" id="" value="<?=$id_don_hang ?>" >
            <textarea class="form-control mb-2" name="comment[]" rows="4" placeholder="Nhập đánh giá của bạn"></textarea>
            <select class="form-control mb-2" name="diem_danh_gia[]" required>
                <option value="">Chọn điểm đánh giá</option>
                <option value="5">5 Sao</option>
                <option value="4">4 Sao</option>
                <option value="3">3 Sao</option>
                <option value="2">2 Sao</option>
                <option value="1">1 Sao</option>
            </select>
        </div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col-sm-9 offset-sm-3">
            <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
            <a href="index.php?act=don_hang" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
</div>
