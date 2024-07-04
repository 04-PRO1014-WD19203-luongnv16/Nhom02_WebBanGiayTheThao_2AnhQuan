<?php
    include 'models/pdo.php';
    include 'models/taikhoan.php';
    include 'view/header.php';
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'dang_ky':
                    $dem_loi = 0;
                    $loi_ten = $loi_email = $loi_mat_khau = $loi_nhap_lai_mat_khau = "";
                if (isset($_POST['dang_ky_btn'])) {
                    $ten_dang_nhap = $_POST['ten_dang_nhap'];
                    $email = $_POST['email'];
                    $mat_khau = $_POST['mat_khau'];
                    $nhap_lai_mat_khau = $_POST['nhap_lai_mat_khau'];
                    $trang_thai = 0;
                    $vai_tro = 0;

                    // Validate
                    if (empty($ten_dang_nhap)) {
                        $loi_ten = "Không được để trống";
                        $dem_loi ++;
                    }
                    if (empty($email)) {
                        $loi_email = "Không được để trống";
                        $dem_loi ++;
                    }
                    if (empty($mat_khau)) {
                        $loi_mat_khau = "Hãy nhập lại mật khẩu";
                        $dem_loi ++;
                    }
                    if (empty($nhap_lai_mat_khau)) {
                        $loi_nhap_lai_mat_khau = "Không được để trống";
                        $dem_loi ++;
                    }
                    if ($mat_khau != $nhap_lai_mat_khau) {
                        $loi_nhap_lai_mat_khau = "Mật khẩu không trùng khớp";
                        $dem_loi ++;
                    }
                    if ($dem_loi == 0) {
                        dang_ky_user($ten_dang_nhap, $mat_khau, $email, $trang_thai, NULL, NULL, NULL, $vai_tro);
                        $thongbao = "Đăng ký tài khoản thành công";
                    } else {
                        $thongbao = "Lỗi nhập liệu, đăng ký không thành công";
                    }
                }
                include 'view/dangky.php';
                break;
            default:
                include 'view/main.php';
                break;
        }
    } else {
        include 'view/main.php';
    }
    include 'view/footer.php';
?>
