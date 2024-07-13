      <!-- Begin Page Content -->
      <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Sản phẩm đã xóa</h1>

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
                                <th>Tên sản phẩm</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($san_pham_da_xoa as $key => $spdx) {
                                ?> 
                               <tr>
                                <td><?=$key+1?></td>
                                <td><?=$spdx['ten_san_pham'] ?></td>
                                <td>
                                 
                                    <a onclick="return khoi_phuc_san_pham()" href="index.php?act=khoi_phuc_san_pham&id_spdx=<?=$spdx['id_san_pham'] ?>" class="btn btn-danger btn-sm deleteCategory" data-id="1">
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
                        <a onclick="khoi_phuc_toan_bo_san_pham()" href="index.php?act=khoi_phuc_toan_bo_san_pham">
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