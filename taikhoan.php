<?php
    // Đăng ký tài khoản
    function dang_ky_user($ten_dang_nhap, $mat_khau, $email, $trang_thai, $hinh_anh, $sdt, $dia_chi, $vai_tro) {
        $sql = "INSERT INTO tai_khoan(`ten_dang_nhap`, `mat_khau`, `email`, `trang_thai`, `hinh_anh`, `sdt`, `dia_chi`, `vai_tro`) VALUES('$ten_dang_nhap', '$mat_khau', '$email', '$trang_thai', NULL, NULL, NULL, '$vai_tro')";
        pdo_execute($sql);
    }
    //commit taikhoanphu
?>
