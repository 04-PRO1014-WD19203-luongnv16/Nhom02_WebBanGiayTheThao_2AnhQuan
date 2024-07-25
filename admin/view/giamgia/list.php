<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Mã giảm giá</h1>

    <!-- Bộ lọc -->
    <!-- <div class="row mb-4">
        <div class="col-lg-12">
            <form class="form-inline">
                <div class="form-group mr-2">
                    <label for="filterCategory" class="mr-2">Tìm kiếm:</label>
                    <select class="form-control" id="filterCategory">
                        <option value="">Tất cả</option>
                        <option value="category1">Theo ngày</option>
                        <option value="category2">Theo tuần</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Lọc</button>
            </form>
        </div>
    </div> -->

    <!-- Content Row -->
    <div class="row">

        <!-- Table column -->
        <div class="col-lg-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quản lý mã giảm giá</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã</th>
                                    <th>Giảm giá</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($giam_gia as $key => $gg) {
                                ?>
                                    <tr>
                                        <td><?= $key +1 ?></td>
                                        <td><?= $gg['ten_giam_gia'] ?></td>
                                        <td><?= $gg['giam_gia'] ?>%</td>
                                        <td><?= $gg['ngay_bat_dau'] ?></td>
                                        <td><?= $gg['ngay_ket_thuc'] ?></td>
                                        <td>
                                            <!-- Edit link with icon -->
                                            <a href="index.php?act=sua_ma&id_giam_gia=<?= $gg['id_giam_gia'] ?>" class="btn btn-primary btn-sm editCategory" data-id="1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <!-- Delete link with icon -->
                                            <a onclick="return xoa_ma()" href="index.php?act=xoa_giam_gia&id_giam_gia=<?= $gg['id_giam_gia'] ?>" class="btn btn-danger btn-sm deleteCategory" data-id="1">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                                <!-- Add more rows dynamically here using JavaScript -->
                            </tbody>
                        </table>
                        <div class="input-group mb-3 w-50">
                            <a href="index.php?act=them_ma"><button name="them_btn" class="btn btn-success" id="btnAddCategory">Thêm mã</button></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
