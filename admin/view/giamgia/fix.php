<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Sửa mã giảm giá</h1>

                    <!-- Add Product Form -->
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="index.php?act=update_ma" method="post">
                                <!-- Product Name -->
                                <div class="form-group">
                                    <input name="id_giam_gia" type="hidden" class="form-control" id="productName"value="<?=$one_ma['id_giam_gia'] ?>" >
                                </div>

                                <div class="form-group">
                                    <label for="productName">Mã giảm giá</label>
                                    <input name="ten_ma" type="text" class="form-control" id="productName" value="<?= $one_ma['ten_giam_gia'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="productName">Giá trị</label>
                                    <input name="giam_gia" type="number" class="form-control" id="productName" value="<?= $one_ma['giam_gia'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="productName">Ngày bắt đầu</label>
                                    <input name="ngay_bat_dau" type="date" class="form-control" id="productName" value="<?= $one_ma['ngay_bat_dau'] ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="productName">Ngày kết thúc</label>
                                    <input name="ngay_ket_thuc" type="date" class="form-control" id="productName" value="<?= $one_ma['ngay_ket_thuc'] ?>">
                                </div>

                                <!-- Add Product Button -->
                                <input name="sua_btn" type="submit" class="btn btn-primary" value="Cập nhật">
                            </form>
                        </div>
                        <span style="color:red;">
                            <?php 
                                if(isset($thongbao)){
                                    echo $thongbao;
                                } else {
                                    $thongbao = "";
                                }
                            ?>
                        </span>
                    </div>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <?= $error ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
                </div>
