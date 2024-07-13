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
            
            break;
        case 'dang_xuat':
            
            break;
        case 'cua_hang':
            $iddm = 0;
            $danh_muc = tat_ca_danh_muc();
            if (isset($_GET['iddm'])) {
                $iddm = $_GET['iddm'];
                $san_pham = tat_ca_san_pham($iddm);
            }
            $san_pham = tat_ca_san_pham($iddm);
            include 'view/cuahang.php';
            break;
        case 'chi_tiet_san_pham':
            
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
