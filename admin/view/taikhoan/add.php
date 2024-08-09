<style>
    .custom-img-height {
        max-height: 200px; /* Đặt chiều cao tối đa */
    }
</style>

<!-- Main Page -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Thêm tài khoản</h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Form column -->
        <div class="col-lg-12">

            <!-- Form Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thêm tài khoản mới</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="ten_tai_khoan">Tên tài khoản</label>
                            <input type="text" class="form-control" id="ten_tai_khoan" name="ten_tai_khoan" >
                            <span style="color:red;"><?php if(isset($loi_ten)){
                                echo $loi_ten;}else {
                               $loi_ten = "";}?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" >
                            <span style="color:red;"><?php if(isset($loi_email)){
                                echo $loi_email;}else {
                               $loi_email = "";}?></span>
                        </div>
                        <div class="form-group">
                            <label for="mat_khau">Mật khẩu</label>
                            <input type="password" class="form-control" id="mat_khau" name="mat_khau" >
                            <span style="color:red;"><?php if(isset($loi_mat_khau)){
                                echo $loi_mat_khau;}else {
                               $loi_mat_khau = "";}?></span>
                        </div>
                        <div class="form-group">
                            <label for="anh_dai_dien">Ảnh đại diện</label>
                            <input type="file" class="form-control-file" id="anh_dai_dien" name="anh_dai_dien">
                        </div>
                     <input type="submit" class="btn btn-primary" name="them_tk_btn" id="" value="Thêm tài khoản" >
                     
                    </form>
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
<!-- end main page-fluid -->
