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
            
            break;
        case 'dang_ky':
            
            break;
        case 'dang_xuat':
             if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
            header('location:index.php');
        }
            break;
        case 'cua_hang':
            
            break;
        case 'chi_tiet_san_pham':
            
            break;
        case 'them_vao_gio_hang':
             if(isset($_POST['them_gio_btn'])){
        $id_bien_the = $_POST['id_bien_the'];
        $id_tai_khoan = $_POST['id_tai_khoan'];
        $so_luong = $_POST['so_luong'];
        $id_san_pham = $_POST['id_san_pham'];

        // Kiểm tra nếu size chưa được chọn
        if (empty($_POST['gia_size'])) {
            $thongbao = "Vui lòng chọn size trước khi thêm vào giỏ hàng.";
            // Lấy thông tin sản phẩm và size để hiển thị lại trang chi tiết
            $one_san_pham = show_1_san_pham($id_san_pham);
            $size = tat_ca_size();
            include 'view/chitietsanpham.php';
           
        } else {
            // Size đã được chọn, tiếp tục xử lý thêm vào giỏ hàng
            $gia_size = $_POST['gia_size'];
            $tong_gia = $gia_size * $so_luong;
            $check = kiem_tra_ton_tai_san_pham_trong_gio_hang($id_bien_the, $id_tai_khoan);
            if($check !== false){
                $so_luong_cu = $check['so_luong'];
                $so_luong_moi = $so_luong_cu + $so_luong;
                $tong_gia = $gia_size * $so_luong_moi;
                cap_nhat_so_luong_gio_hang($id_bien_the, $id_tai_khoan, $so_luong_moi, $tong_gia);
            } else {
                them_vao_gio_hang($id_bien_the, $id_tai_khoan, $so_luong, $tong_gia);
            }
          
            header('location:index.php?act=view_gio_hang');
            exit; 
        }
    }     
            break;
        case 'view_gio_hang':
              if(isset($_SESSION['user']['id_tai_khoan'])){
                $id_tai_khoan = $_SESSION['user']['id_tai_khoan'];
                 $gio_hang =   show_gio_hang($id_tai_khoan);
            }
            include 'view/viewgiohang.php';
            break;
        case 'xoa_toan_bo_gio_hang':
              $id_bien_the = 0;
            if(isset($_GET['idxgh'])){
                $id_bien_the  =$_GET['idxgh'];
                
            }
            xoa_toan_bo_gio_hang($id_tai_khoan,$id_bien_the);
            $gio_hang =   show_gio_hang($id_tai_khoan);
            include 'view/viewgiohang.php';
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
