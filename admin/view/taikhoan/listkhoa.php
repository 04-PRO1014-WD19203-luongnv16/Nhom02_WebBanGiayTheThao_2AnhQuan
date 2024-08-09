<style>
    .custom-img-height {
        max-height: 200px; /* Đặt chiều cao tối đa */
    }
</style>

<!-- Main Page -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Quản lý tài khoản</h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Table column -->
        <div class="col-lg-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tài khoản bị khóa</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên tài khoản</th>
                                    <th>Email</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Vai trò</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                foreach ( $all_tai_khoan_khoa  as $key => $tk) {
                            ?> 
                                <tr>
                                    <td><?=$key+1?></td>
                                    <td><?=$tk['ten_dang_nhap'] ?></td>
                                    <td><?=$tk['email'] ?></td>
                                    <td><img src="../uploads/<?=$tk['hinh_anh'] ?>" class="img-fluid w-10 custom-img-height"></td>
                                    <td><?=$tk['sdt'] ?></td>
                                    <td><?=$tk['dia_chi'] ?></td>
                                    <td><?=$tk['vai_tro'] == 1 ? 'Admin' : 'User' ?></td>
                                    <td>
                                     
                                        <!-- Delete link with icon -->
                                        <a onclick="return khoi_phuc()" href="index.php?act=khoi_phuc_tai_khoan&id_tk=<?=$tk['id_tai_khoan'] ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-undo"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        

        </div>

    </div>

</div>
<!-- end main page-fluid -->

<script>
function khoi_phuc() {
    return confirm('Bạn có chắc chắn muốn khôi phục tài khoản này không?');
}
</script>
