      <!-- Begin Page Content -->
      <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Mã giảm giá đã xóa</h1>

<!-- Content Row -->
<div class="row">

    <!-- Table column -->
    <div class="col-lg-12">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
           
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
                            foreach ($tat_ca_ma_da_xoa as $key => $madx) {
                                ?> 
                               <tr>
                                <td><?= $key +1 ?></td>
                                        <td><?= $madx['ten_giam_gia'] ?></td>
                                        <td><?= $madx['giam_gia'] ?>%</td>
                                        <td><?= $madx['ngay_bat_dau'] ?></td>
                                        <td><?= $madx['ngay_ket_thuc'] ?></td>
                                        <td>
                                            <!-- Edit link with icon -->
                                            <a onclick="return khoi_phuc_ma()" href="index.php?act=khoi_phuc_ma&id_madx=<?= $madx['id_giam_gia'] ?>" class="btn btn-danger btn-sm deleteCategory" data-id="1">
                                                <i class="fas fa-undo-alt"></i>
                                            </a>
                                        </td>
                            </tr>
                                <?php 
                            }
                            ?>
                          
                         
                            <!-- Add more rows dynamically here using JavaScript -->
                        </tbody>
                    </table>

                    
                    
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <a onclick="return khoi_phuc_toan_bo_ma()" href="index.php?act=khoi_phuc_toan_bo_ma">
                        <button class="btn btn-outline-primary" type="button" id="btnRestoreAll">
                            <i class="fas fa-undo mr-2"></i> Khôi phục toàn bộ
                        </button>
                        </a>
                    </div>
                </div>
                
                
            </div>
        </div>

    </div>

</div>

</div>
<!-- /.container-fluid -->
