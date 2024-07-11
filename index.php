<?php 
session_start();
include 'models/pdo.php';
include 'models/taikhoan.php';
include 'view/header.php';
if(isset($_GET['act'])){
   $act=$_GET['act'];
   switch ($act) {
    case 'dang_nhap':
        # Kiểm tra nút đăng nhập
        if (isset($_POST['dang_nhap_btn'])) {
            $email = $_POST['email']; # Nếu được click thì gán email, mật khẩu
            $mat_khau = $_POST['mat_khau'];
            
            # Gọi hàm kiểm tra tài khoản
            $check = check_tai_khoan($email, $mat_khau);
            
            # Kiểm tra kết quả trả về của hàm check_tai_khoan
            if ($check !== false) {
                # Check email và mật khẩu nhập từ input có trùng với database không
                if ($check['email'] == $email && $check['mat_khau'] == $mat_khau) {
                    if ($check['trang_thai'] == 1) { # Kiểm tra trạng thái tài khoản
                        $thongbao = "Tài khoản của bạn đã bị khóa";
                    } elseif ($check['trang_thai'] == 0) { # Trạng thái = 0 nghĩa là tài khoản được phép sử dụng
                        $_SESSION['user'] = $check;
                        header('location:index.php');
                        exit(); # Đảm bảo dừng thực thi script sau khi chuyển hướng
                    }
                } else {
                    $thongbao = "Tài khoản hoặc mật khẩu không đúng";
                }
            } else {
                $thongbao = "Tài khoản hoặc mật khẩu không đúng";
            }
        }
        
        include 'view/dangnhap.php';
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
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
            header('location:index.php');
        }
         break;
    default:
    include 'view/main.php';
        break;
   } 
}else{
    include 'view/main.php';
}
include 'view/footer.php';
?>