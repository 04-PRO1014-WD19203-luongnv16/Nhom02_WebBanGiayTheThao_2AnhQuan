<?php 
#show danh mục
function tat_ca_danh_muc(){
    $sql = "SELECT *FROM danh_muc WHERE trang_thai = 0";
    $tat_ca_danh_muc = pdo_query($sql);
    return $tat_ca_danh_muc;
}
//commit dm 1
#show 1 danh mục
function show_1_danh_muc($id_danh_muc){
    $sql = "SELECT *FROM danh_muc WHERE trang_thai = 0 AND id_danh_muc = '$id_danh_muc'";
    $one_danh_muc = pdo_query_one($sql);
    return $one_danh_muc;
}

#show danh mục đã xóa
function tat_ca_danh_muc_da_xoa(){
    $sql = "SELECT *FROM danh_muc WHERE trang_thai = 1";
    $tat_ca_danh_muc_da_xoa = pdo_query($sql);
    return $tat_ca_danh_muc_da_xoa;
}

#thêm mới danh mục
function them_moi_danh_muc($ten_danh_muc){
    $sql = "INSERT INTO danh_muc(ten_danh_muc,trang_thai) VALUES('$ten_danh_muc','0')";
    pdo_execute($sql);
}

#xóa danh mục
function xoa_danh_muc($id_danh_muc){
    $sql = "UPDATE danh_muc SET trang_thai = 1 WHERE id_danh_muc = '$id_danh_muc'";
    pdo_execute($sql);
}

#khôi phục  danh mục
function khoi_phuc_danh_muc($id_danh_muc){
    $sql = "UPDATE danh_muc SET trang_thai = 0 WHERE id_danh_muc = '$id_danh_muc'";
    pdo_execute($sql);
}

#sửa danh mục
function sua_danh_muc($id_danh_muc,$ten_danh_muc){
    $sql = "UPDATE danh_muc SET ten_danh_muc = '$ten_danh_muc' WHERE id_danh_muc = '$id_danh_muc'";
    pdo_execute($sql);
}

#check danh mục
function check_danh_muc($ten_danh_muc){
    $sql = "SELECT *FROM danh_muc WHERE ten_danh_muc = '$ten_danh_muc'";
    $check = pdo_query_one($sql);
    return $check;
}

#khôi phục toàn bộ danh mục
function khoi_phuc_toan_bo_danh_muc(){
    $sql = "UPDATE danh_muc SET trang_thai = 0";
    pdo_execute($sql);
}
?>
