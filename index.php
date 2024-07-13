<?php 
session_start();

include 'models/pdo.php';
include 'models/taikhoan.php';
include 'models/sanpham.php';
include 'models/danhmuc.php';
include 'models/giohang.php';
include 'models/size.php';
include 'view/header.php';

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'dang_nhap':
            // Your code for 'dang_nhap'
            break;
        case 'dang_ky':
            // Your code for 'dang_ky'
            break;
        case 'dang_xuat':
            // Your code for 'dang_xuat'
            break;
        case 'cua_hang':
            // Your code for 'cua_hang'
            break;
        case 'chi_tiet_san_pham':
            // Your code for 'chi_tiet_san_pham'
            break;
        case 'them_vao_gio_hang':
            // Your code for 'them_vao_gio_hang'
            break;
        case 'view_gio_hang':
            // Your code for 'view_gio_hang'
            break;
        case 'xoa_toan_bo_gio_hang':
            // Your code for 'xoa_toan_bo_gio_hang'
            break;
        default:
            $iddm = 0;
            $san_pham = tat_ca_san_pham($iddm);
            include 'view/main.php';
            break;
    }
} else {
    $iddm = 0;
    $san_pham = tat_ca_san_pham($iddm);
    include 'view/main.php';
}

include 'view/footer.php';
?>
<script>
    function xoa_toan_bo_gio_hang() {
        return confirm("Bạn muốn xóa toàn bộ giỏ hàng chứ?");
    }
</script>
