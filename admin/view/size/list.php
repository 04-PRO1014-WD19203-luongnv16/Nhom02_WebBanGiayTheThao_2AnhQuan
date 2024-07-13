<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Size</h1>

<!-- Content Row -->
<div class="row">

    <!-- Table column -->
    <div class="col-lg-12">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quản lý danh sách size</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Size</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($size  as $key => $sz) {
                            ?>
 <tr>
                                <td><?=$key+1?></td>
                                <td><?= $sz['size_name'] ?></td>
                                <td>
                                    <!-- View details link with icon -->
                               
                                    <!-- Edit link with icon -->
                                    <a href="index.php?act=sua_size&idssz=<?=$sz['id_size']?>" class="btn btn-primary btn-sm editCategory" data-id="1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <!-- Delete link with icon -->
                                    <a onclick="return xoa_size()" href="index.php?act=xoa_size&idsz=<?=$sz['id_size']?>" class="btn btn-danger btn-sm deleteCategory" data-id="1">
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

                    
                    
                </div>
                <div class="input-group mb-3 w-50">
               <form class="input-group mb-3 w-50"   action="index.php?act=them_size" method="post" >
               <input name="ten_size" type="text" class="form-control" id="inputCategoryName" placeholder="Nhập size...">
                    <div class="input-group-append">
                       
                        <input class="btn btn-success" id="btnAddCategory" type="submit" name="them_btn" value="Thêm">
                           
                       
                    </div>
             
               </form>
         
                </div>
                <span style="color:red;"><?php if(isset($thongbao)){
                  echo $thongbao;
                }else {
                  $thongbao = "";
                }
                  ?></span>
            </div>
        </div>

    </div>

</div>

</div>