<?php 
session_start();
ob_start();
include '../models/pdo.php';
include '../models/danhmuc.php';
include '../models/size.php';
include '../models/sanpham.php';
include '../models/hoadon.php';
include '../models/thongke.php';
include '../models/taikhoan.php';
include '../models/binhluan.php';
include '../models/giamgia.php';
include 'view/header.php';

if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
        # Danh mục
        case 'danh_muc':
            break;
        case 'them_danh_muc':
            break;
        case 'xoa_danh_muc':
            break;
        case 'danh_muc_da_xoa':
            break;
        case 'khoi_phuc_danh_muc':
            break;
        case 'khoi_phuc_toan_bo_danh_muc':
            break;
        case 'sua_danh_muc':
            break;
        case 'update_danh_muc':
            break;

        # Size
        case 'size':
            break;
        case 'them_size':
            break;
        case 'xoa_size':
            break;
        case 'size_da_xoa':
            break;
        case 'khoi_phuc_size':
            break;
        case 'khoi_phuc_toan_bo_size':
            break;
        case 'sua_size':
            break;
        case 'update_size':
            break;

        # Sản phẩm
        case 'san_pham':

            break;

        # Giảm giá
        case 'giam_gia':

            break;

        # Tài khoản
        case 'tai_khoan':
            break;
        case 'them_tai_khoan':
            break;
        case 'xoa_tai_khoan':
            break;
        case 'tai_khoan_da_khoa':
            break;
        case 'khoi_phuc_tai_khoan':
            break;

        # Đơn hàng
        case 'don_hang':

            break;

        # Bình luận
        case 'binh_luan':
            break;
        case 'xem_binh_luan':
            break;
        case 'an_binh_luan':
            break;
        case 'binh_luan_da_xoa':
            break;

        default:





       
            include 'view/main.php';
       
            break;
    }
}else{






   
    include 'view/main.php';
}

include 'view/footer.php';
ob_end_flush();
?>
<script>
function xoa_danh_muc() {
    return confirm('Bạn muốn xóa danh mục này chứ?')
}
function khoi_phuc_danh_muc() {
    return confirm('Bạn muốn khôi phục danh mục này chứ?')
}
function khoi_phuc_toan_bo_danh_muc() {
    return confirm('Bạn muốn khôi phục toàn bộ danh mục không?')
}
function xoa_size() {
    return confirm('Bạn muốn xóa size này không?')
}
function khoi_phuc_size() {
    return confirm('Bạn muốn khôi phục size này không?')
}
function khoi_phuc_toan_bo_size() {
    return confirm('Bạn muốn khôi phục toàn bộ size không?')
}
function xoa_san_pham() {
    return confirm('Bạn muốn xóa sản phẩm này chứ?')
}
function khoi_phuc_san_pham() {
    return confirm('Bạn muốn khôi phục sản phẩm này chứ?')
}
</script>
