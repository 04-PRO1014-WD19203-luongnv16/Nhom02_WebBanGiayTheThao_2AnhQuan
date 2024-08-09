<?php 
session_start();

include 'models/pdo.php';
include 'models/taikhoan.php';
include 'models/sanpham.php';
include 'models/danhmuc.php';
include 'models/giohang.php';
include 'models/size.php';
include 'models/hoadon.php';
include 'models/binhluan.php';
include 'models/giamgia.php';
include 'view/header.php';

if(isset($_GET['act'])){
   $act = $_GET['act'];
   switch ($act) {
       case 'dang_nhap':
           // Xử lý đăng nhập
           break;
       
       case 'dang_ky':
           // Xử lý đăng ký
           break;
       
       case 'dang_xuat':
           // Xử lý đăng xuất
           break;
       
       case 'cua_hang':
           // Xử lý hiển thị cửa hàng
           break;
       
       case 'chi_tiet_san_pham':
           // Xử lý chi tiết sản phẩm
           break;
       
       case 'them_vao_gio_hang':
           // Xử lý thêm vào giỏ hàng
           break;
       
       case 'view_gio_hang':
           // Xử lý hiển thị giỏ hàng
           break;
       
       case 'xoa_toan_bo_gio_hang':
           // Xử lý xóa toàn bộ giỏ hàng
           break;
       
       case 'thanh_toan':
           // Xử lý thanh toán
           break;
       
       case 'xac_nhan':
           // Xử lý xác nhận đơn hàng
           break;
       
       case 'trang_xac_nhan':
           // Xử lý hiển thị trang xác nhận
           break;
       
       case 'trang_online':
           // Xử lý thanh toán online
           break;
       
       case 'don_hang':
           // Xử lý hiển thị đơn hàng
           break;
       
       case 'chi_tiet_don':
           // Xử lý chi tiết đơn hàng
           break;

       default:
           // Xử lý mặc định
           break;
   }
}else{

}
include 'view/footer.php';
?>
<script>
    function xoa_toan_bo_gio_hang(){
        return confirm("Bạn muốn xóa toàn bộ giỏ hàng chứ?");
    }
    function yeu_cau_dn() {
        alert("Bạn phải đăng nhập để sử dụng chức năng này");
    }
</script>

