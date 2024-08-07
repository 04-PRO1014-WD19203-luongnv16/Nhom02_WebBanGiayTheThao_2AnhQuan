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

#show tất cả tài khoản
function show_tai_khoan(){
    $sql ="SELECT *FROM tai_khoan WHERE trang_thai = 0";
    $all_tai_khoan = pdo_query($sql);
    return $all_tai_khoan;
}

function show_tai_khoan_bi_khoa(){
    $sql ="SELECT *FROM tai_khoan WHERE trang_thai = 1";
    $all_tai_khoan_khoa = pdo_query($sql);
    return $all_tai_khoan_khoa;
}

#thêm tài khoản admin
function them_tai_khoan($ten_dang_nhap, $mat_khau, $email, $trang_thai, $hinh_anh, $sdt, $dia_chi, $vai_tro) {
    $sql = "INSERT INTO tai_khoan(`ten_dang_nhap`, `mat_khau`, `email`, `trang_thai`, `hinh_anh`, `sdt`, `dia_chi`, `vai_tro`)
     VALUES('$ten_dang_nhap', '$mat_khau', '$email', '$trang_thai', '$hinh_anh', NULL, NULL, '$vai_tro')";
    pdo_execute($sql);
}

#block tài khoản
function block_tai_khoan($id_tai_khoan){
    $sql = "UPDATE tai_khoan SET trang_thai = 1 WHERE id_tai_khoan = '$id_tai_khoan'";
    pdo_execute($sql);
}

#khôi phục tài khoản
function khoi_phuc_tai_khoan($id_tai_khoan){
    $sql = "UPDATE tai_khoan SET trang_thai = 0 WHERE id_tai_khoan = '$id_tai_khoan'";
    pdo_execute($sql);
}
?>


