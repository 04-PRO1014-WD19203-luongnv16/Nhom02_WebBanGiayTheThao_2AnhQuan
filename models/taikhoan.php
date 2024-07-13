<?php 
# đăng ký tài khoản
function dang_ky_user($ten_dang_nhap, $mat_khau, $email, $trang_thai, $hinh_anh, $sdt, $dia_chi, $vai_tro) {
    $sql = "INSERT INTO tai_khoan(`ten_dang_nhap`, `mat_khau`, `email`, `trang_thai`, `hinh_anh`, `sdt`, `dia_chi`, `vai_tro`) VALUES('$ten_dang_nhap', '$mat_khau', '$email', '$trang_thai', NULL, NULL, NULL, '$vai_tro')";
    pdo_execute($sql);
}

#check tài khoản
function check_tai_khoan($email,$mat_khau){
    $sql = "SELECT * FROM tai_khoan WHERE email = '$email' AND mat_khau = '$mat_khau'";
    $check =  pdo_query_one($sql);
     return $check;
}

function check_ton_tai($email, $ten_dang_nhap) {
    $sql = "SELECT * FROM tai_khoan WHERE email = '$email' OR ten_dang_nhap = '$ten_dang_nhap'";
    $check = pdo_query_one($sql);
    return $check;
}
?>


