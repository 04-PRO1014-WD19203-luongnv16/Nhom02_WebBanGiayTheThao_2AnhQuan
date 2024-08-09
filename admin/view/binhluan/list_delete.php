<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Danh sách bình luận</h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Table column -->
        <div class="col-lg-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bình luận đã xóa</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên người bình luận</th>
                                    <th>Thời gian</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($binh_luan_da_xoa as $key => $bl) {
                                ?>
                                <tr>
                                    <td><?=$key+1?></td>
                                    <td><?= htmlspecialchars($bl['ten_dang_nhap']) ?></td>
                                    <td><?= htmlspecialchars($bl['date']) ?></td>
                                 
                                </tr>
                                <?php
                                }
                                ?>
                                <!-- Add more rows dynamically here using JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<script>
function xoa_binh_luan(id) {
    return confirm('Bạn có chắc chắn muốn ẩn bình luận này không?');
}
</script>
