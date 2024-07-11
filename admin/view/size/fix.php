
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Size </h1>

<!-- Content Row -->
<div class="row">

    <!-- Table column -->
    <div class="col-lg-12">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sửa size</h6>
            </div>
            <div class="card-body">
            
                <div class="input-group mb-3 w-50">
               <form class="input-group mb-3 w-50"   action="index.php?act=update_size" method="post" >
               <input name="id_size" type="hidden" class="form-control" id="inputCategoryName"value="<?=$one_size['id_size'] ?>" >
               <input name="ten_size" type="text" class="form-control" id="inputCategoryName" value="<?=$one_size['size_name'] ?>" >
                    <div class="input-group-append">
                       
                        <input class="btn btn-success" id="btnAddCategory" type="submit" name="sua_btn" value="Cập nhật">
                           
                       
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