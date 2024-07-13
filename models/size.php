<?php 
#show size
function tat_ca_size(){
    $sql = "SELECT *FROM size_bien_the WHERE trang_thai = 0";
    $tat_ca_size = pdo_query($sql);
    return $tat_ca_size;
}

#show_1_size
function show_1_size($id_size){
    $sql = "SELECT *FROM size_bien_the WHERE trang_thai = 0 and id_size = '$id_size'";
    $one_size = pdo_query_one($sql);
    return $one_size;
}

#sửa size
function sua_size($id_size,$ten_size){
    $sql = "UPDATE size_bien_the SET size_name = '$ten_size' WHERE id_size = '$id_size'";
    pdo_execute($sql);
}

// #show size đã xóa
function tat_ca_size_da_xoa(){
    $sql = "SELECT *FROM size_bien_the WHERE trang_thai = 1";
    $tat_ca_size_da_xoa = pdo_query($sql);
    return $tat_ca_size_da_xoa;
}

#thêm mới size
function them_moi_size($ten_size){
    $sql = "INSERT INTO size_bien_the(size_name,trang_thai) VALUES('$ten_size','0')";
    pdo_execute($sql);
}

#xóa size
function xoa_size($idsz){
    $sql = "UPDATE size_bien_the SET trang_thai = 1 WHERE id_size = '$idsz'";
    pdo_execute($sql);
}

// #khôi phục  size
function khoi_phuc_size($id_szdx){
    $sql = "UPDATE size_bien_the SET trang_thai = 0 WHERE id_size = '$id_szdx'";
    pdo_execute($sql);
}

// #sửa danh mục
// function sua_danh_muc($id_danh_muc,$ten_danh_muc){
//     $sql = "UPDATE danh_muc SET ten_danh_muc = '$ten_danh_muc' WHERE id_danh_muc = '$id_danh_muc'";
//     pdo_execute($sql);
// }

#check sizw
function check_size($ten_size){
    $sql = "SELECT *FROM size_bien_the WHERE size_name = '$ten_size'";
    $check = pdo_query_one($sql);
    return $check;
}

// #khôi phục toàn bộ sizw
function khoi_phuc_toan_bo_size(){
    $sql = "UPDATE size_bien_the SET trang_thai = 0";
    pdo_execute($sql);
}
?>