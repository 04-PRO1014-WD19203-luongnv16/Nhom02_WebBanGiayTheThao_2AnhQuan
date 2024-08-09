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
       if(isset($_POST['thanh_toan_btn'])){
                $tong_gio_hang= $_POST['tong_gio_hang'];  
                $id_bien_the= $_POST['id_bien_the'];
                $size_name= $_POST['size_name'];
                $hinh_anh= $_POST['hinh_anh'];
                $so_luong= $_POST['so_luong'];
                $gia_tong_bien_the =$_POST['tong_gia_i'];
                $id_tai_khoan= $_POST['id_tai_khoan'];
               
                #lưu tạm vào ss
                $_SESSION['hoa_don'] = [
                    'tong_gio_hang' => $tong_gio_hang,
                    'tai_khoan' => $id_tai_khoan,
                    'bien_the' => []
                ];
                
                foreach ($id_bien_the as $key => $id_bt) {
                    $ten_san_pham =tim_ten_san_pham($id_bt);
                    $size_value = $_POST['size_name'][$key];
                    $_SESSION['hoa_don']['bien_the'][] = [
                        'id_bien_the' => $id_bt,
                        'so_luong' => $so_luong[$key],
                       'ten_san_pham' => $ten_san_pham,
                        'size_name' => $size_name[$key],
                        'hinh_anh' => $hinh_anh[$key],
                        'gia_tong_bien_the' => $gia_tong_bien_the[$key],
                    ];
                }
                
            }
            include 'view/thanhtoan.php';
           break;
       
       case 'xac_nhan':
           // Xử lý xác nhận đơn hàng
           break;
       
       case 'trang_xac_nhan':
           // Xử lý hiển thị trang xác nhận
       if(isset($_SESSION['user'])){
                        $id_tai_khoan = $_SESSION['user']['id_tai_khoan'];
                    }
                    $id_don_hang = tim_id_don();
                    $hoa_don =show_hoa_don($id_don_hang);
                    if(isset($_SESSION['hoa_don'])){
                        unset($_SESSION['hoa_don']);
                    }
                    include 'view/xacnhanhoadon.php';
           break;
       
       case 'trang_online':
           // Xử lý thanh toán online
           break;
       
       case 'don_hang':
           // Xử lý hiển thị đơn hàng
           break;
       
       case 'chi_tiet_don':
           // Xử lý chi tiết đơn hàng
       if (isset($_GET['id_ctsp'])) {
                $id_san_pham = $_GET['id_ctsp'];
                $one_san_pham = show_1_san_pham($id_san_pham);
                $binh_luan = show_binh_luan_theo_san_pham($id_san_pham);
                update_view($id_san_pham);
            }  
       
            include 'view/chitietsanpham.php';
           break;

      case 'danh_gia':
           // Xử lý code đánh giá
           break;

      case 'binh_luan':
           // Xử lý code bình luận
           break;

      case 've_chung_toi':
           // Xử lý code về chúng tôi
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

