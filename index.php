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
            $dem_loi = 0;
            $loi_ten = $loi_email = $loi_mat_khau =$loi_nhap_lai_mat_khau = "";
        if(isset($_POST['dang_ky_btn'])){
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];
            $nhap_lai_mat_khau = $_POST['nhap_lai_mat_khau'];
            $trang_thai = 0 ; //tài khoản đã kích hoạt.
            $vai_tro = 0; // 0 là vai trò user thường.

            // làm validate
        if(empty($ten_dang_nhap)){
            $loi_ten = "Không được để trống tên";
            $dem_loi ++;
        }
        if(empty($email)){
            $loi_email = "Không được để trống email";
            $dem_loi ++;
        }
        if(empty($mat_khau)){
            $loi_mat_khau = "Hãy nhập lại mật khẩu";
            $dem_loi ++;
        }
        if (empty($nhap_lai_mat_khau)) {
            $loi_nhap_lai_mat_khau = "Không được để trống nhập lại mật khẩu";
            $dem_loi++;
        }

        if($mat_khau != $nhap_lai_mat_khau){
            $loi_nhap_lai_mat_khau = "Mật khẩu không trùng khớp";
            $dem_loi ++;
        }
        if($dem_loi == 0){
            $check = check_ton_tai($email, $ten_dang_nhap) ;
        if($check !== false){
            if($check['email'] == $email ||  $check['ten_dang_nhap'] ==$ten_dang_nhap){
                $thongbao = "Tài khoản đã tồn tại";
            }else{
                dang_ky_user($ten_dang_nhap,$mat_khau,$email,$trang_thai,NULL,NULL,NULL,$vai_tro);
                $thongbao = "Đăng ký tài khoản thành công";
            }
        }else{
            dang_ky_user($ten_dang_nhap,$mat_khau,$email,$trang_thai,NULL,NULL,NULL,$vai_tro);
            $thongbao = "Đăng ký tài khoản thành công";
        }
          
            
        }else {
            $thongbao = "Lỗi nhập liệu, đăng ký không thành công.";
        }
        }
        include 'view/dangky.php';
            break;
        case 'dang_xuat':
            
            break;
        case 'cua_hang':
            
            break;
        case 'chi_tiet_san_pham':
            $id_bien_the =0;
            if (isset($_GET['id_ctsp'])) {
                $id_san_pham = $_GET['id_ctsp'];
                $one_san_pham = show_1_san_pham($id_san_pham);
            }
            
            // Kiểm tra nếu người dùng chọn một size mới
            if (isset($_GET['id_size'])) {
                $id_size = $_GET['id_size'];    
                $gia_size = tim_gia_bien_the($id_san_pham,$id_size);
                $so_luong =tim_so_luong_bien_the($id_san_pham,$id_size);
                $id_bien_the = tim_id_bien_the($id_san_pham,$id_size);             
            }
     
            $size = tat_ca_size();
            include 'view/chitietsanpham.php';
            break;
        case 'them_vao_gio_hang':
            
            break;
        case 'view_gio_hang':
            
            break;
        case 'xoa_toan_bo_gio_hang':
            
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
