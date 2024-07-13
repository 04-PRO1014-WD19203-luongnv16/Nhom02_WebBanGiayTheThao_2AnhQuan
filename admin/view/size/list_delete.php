      <!-- Begin Page Content -->
      <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Size đã xóa</h1>

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
                                <th>Tên size</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($tat_ca_size_da_xoa as $key => $szdx) {
                                ?> 
                               <tr>
                                <td><?=$key+1?></td>
                                <td><?=$szdx['size_name'] ?></td>
                                <td>
                                 
                                    <a onclick="return khoi_phuc_size()" href="index.php?act=khoi_phuc_size&id_szdx=<?=$szdx['id_size'] ?>" class="btn btn-danger btn-sm deleteCategory" data-id="1">
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
                        <a onclick="khoi_phuc_toan_bo_size()" href="index.php?act=khoi_phuc_toan_bo_size">
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