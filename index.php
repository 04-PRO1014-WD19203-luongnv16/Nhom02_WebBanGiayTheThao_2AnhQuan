<?php 
session_start();

include 'models/pdo.php';
include 'models/taikhoan.php';
include 'models/sanpham.php';
include 'models/danhmuc.php';
include 'models/giohang.php';
include 'models/size.php';
include 'models/hoadon.php';
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
            if (isset($_GET['id_ctsp'])) {
                $id_san_pham = $_GET['id_ctsp'];
                $one_san_pham = show_1_san_pham($id_san_pham);
                update_view($id_san_pham);
            }  
            include 'view/chitietsanpham.php';
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
                    if (isset($_GET['tang'])) {
                        $id_bien_the = $_GET['tang'];
                        tang_so_luong($id_bien_the);

                    }elseif(isset($_GET['giam'])){
                    $id_bien_the= $_GET['giam'];
                    giam_so_luong($id_bien_the);
                    }
                    $id_tai_khoan = $_SESSION['user']['id_tai_khoan'];
                    $gio_hang =   show_gio_hang($id_tai_khoan);
                    $dem_gio = dem_gio_hang($id_tai_khoan);
                    if($dem_gio >= 3){
                        $sale_of = 10;
                    }else{
                        $sale_of = 0;
                    }
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
        case 'thanh_toan':
         if(isset($_POST['thanh_toan_btn'])){
                $tong_gio_hang= $_POST['tong_gio_hang'];
                $sale_of= $_POST['sale_of'];
                $id_bien_the= $_POST['id_bien_the'];
                $size_name= $_POST['size_name'];
                $hinh_anh= $_POST['hinh_anh'];
                $so_luong= $_POST['so_luong'];
                $id_tai_khoan= $_POST['id_tai_khoan'];
               
                #lưu tạm vào ss
                $_SESSION['hoa_don'] = [
                    'tong_gio_hang' => $tong_gio_hang,
                    'sale_of' => $sale_of,
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
                        'hinh_anh' => $hinh_anh[$key]
                    ];
                }
                
            }
            include 'view/thanhtoan.php';
        break;
         case 'xac_nhan':
          if (isset($_POST['dat_hang_btn'])) {
                    $bill = $_SESSION['hoa_don'];
                    $tong_gio_hang = $bill['tong_gio_hang'];
                    $ten = isset($_POST['ten_dang_nhap']) ? $_POST['ten_dang_nhap'] : '';
                    $dia_chi = isset($_POST['dia_chi']) ? $_POST['dia_chi'] : '';
                    $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
                    $email = isset($_POST['email']) ? $_POST['email'] : '';
                    $id_tai_khoan = $_SESSION['user']['id_tai_khoan'];
                    $ngay_tao_don = date('Y-m-d H:i:s'); // Điền giá trị thích hợp
                    $phuong_thuc_thanh_toan = isset($_POST['thanh_toan']) && $_POST['thanh_toan'] == 0 ? "Thanh toán khi nhận hàng" : "Thanh toán online";
                    $trang_thai_thanh_toan = isset($_POST['thanh_toan']) && $_POST['thanh_toan'] == 1 ? "Đã thanh toán" : "Chưa thanh toán";
                    $ma_hoa_don = 'DHSH2AQ' . substr(uniqid(), -10);
                    $trang_thai_don = 0;
            
                    // Lưu dữ liệu đơn hàng vào session
                    $_SESSION['thanh_toan'] = array(
                        'id_tai_khoan' => $id_tai_khoan,
                        'tong_gio_hang' => $tong_gio_hang,
                        'ten' => $ten,
                        'ma_hoa_don' => $ma_hoa_don,
                        'email' => $email,
                        'sdt' => $sdt,
                        'dia_chi' => $dia_chi,
                        'trang_thai_thanh_toan' => $trang_thai_thanh_toan,
                        'ngay_tao_don' => $ngay_tao_don,
                        'phuong_thuc_thanh_toan' => $phuong_thuc_thanh_toan,
                        'trang_thai_don' => $trang_thai_don,
                        'bill' => $bill
                    );
            
                    // Xử lý thanh toán
                    if (isset($_POST['thanh_toan']) && $_POST['thanh_toan'] == 1) {
                        // Chuyển đến trang thanh toán online
                        header('Location:index.php?act=trang_online');
                        exit();
                    } else {
                        // Thêm thông tin đơn hàng vào cơ sở dữ liệu
                        them_hoa_don($id_tai_khoan, $tong_gio_hang, $ten, $ma_hoa_don, $email, $sdt, $dia_chi, 0, $trang_thai_thanh_toan, $ngay_tao_don, $phuong_thuc_thanh_toan, $trang_thai_don);
                        $id_chi_tiet_don_hang = tim_id();
            
                        # Lấy ra chi tiết các biến thể
                        foreach ($bill['bien_the'] as $bien_the) {
                            $id_bien_the = $bien_the['id_bien_the'];
                            $so_luong = $bien_the['so_luong'];
                            $hinh_anh = $bien_the['hinh_anh'];
                            $size_name = $bien_the['size_name'];
                            $ten_san_pham = $bien_the['ten_san_pham'];
                            // Thêm chi tiết đơn hàng
                            them_hoa_don_chi_tiet($id_chi_tiet_don_hang, $id_bien_the, $ten_san_pham, $so_luong, $hinh_anh, $size_name, $tong_gio_hang);
                            cap_nhat_so_luong($id_bien_the, $so_luong);
                            xoa_toan_bo_gio_hang($id_tai_khoan, $id_bien_the);
                        }
            
                        header('Location: index.php?act=trang_xac_nhan');
                        exit();
                    }
                }
                header('Location: index.php?act=trang_xac_nhan');
          break;
           case 'trang_xac_nhan':
             if(isset($_SESSION['user'])){
                        $id_tai_khoan = $_SESSION['user']['id_tai_khoan'];
                    }
                    $id_don_hang = tim_id_don();
                    $hoa_don =show_hoa_don($id_don_hang,$id_tai_khoan);
                    include 'view/xacnhanhoadon.php';
         break;
           case 'trang_online':
         include 'view/atm_momo.php';
         break;
         case 'don_hang':
         if(isset($_SESSION['user'])){
                        $id_tai_khoan = $_SESSION['user']['id_tai_khoan'];
                    }
                    if(isset($_GET['da_nhan'])){
                        $id_don_hang = $_GET['da_nhan'];
                        update_da_nhan($id_don_hang);
                    }
                    if(isset($_GET['huy_don'])){
                        $id_don_hang = $_GET['huy_don'];
                        update_huy_don($id_don_hang);
                    }
                    $hoa_don =show_all_hoa_don_user($id_tai_khoan);
                    include 'view/donhang.php';
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
