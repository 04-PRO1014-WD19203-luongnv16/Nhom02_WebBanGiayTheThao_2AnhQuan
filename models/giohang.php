<?php 
#kiểm tra sản phẩm đã tồn tại trong gh chưa
function kiem_tra_ton_tai_san_pham_trong_gio_hang($id_bien_the, $id_tai_khoan) {
    $sql = "SELECT * FROM gio_hang WHERE id_bien_the = '$id_bien_the' AND id_tai_khoan = '$id_tai_khoan'";
    $check =pdo_query_one($sql);
    return $check;
}

#hàm cập nhật số lượng sp vào giỏ hàng

function cap_nhat_so_luong_gio_hang($id_bien_the, $id_tai_khoan, $so_luong_moi,$tong_gia) {
    $sql = "UPDATE gio_hang SET so_luong = '$so_luong_moi' ,tong_gia = '$tong_gia' WHERE id_bien_the = '$id_bien_the' AND id_tai_khoan = '$id_tai_khoan'";
    pdo_execute($sql);
}
#thêm sản phẩm vào giỏ hàng
function them_vao_gio_hang($id_bien_the,$id_tai_khoan,$so_luong,$tong_gia){
$sql = "INSERT INTO  gio_hang(id_bien_the,id_tai_khoan,so_luong,tong_gia) VALUES('$id_bien_the','$id_tai_khoan','$so_luong','$tong_gia')";
pdo_execute($sql);
}

#show giỏ hàng 
function show_gio_hang($id_tai_khoan){
$sql = "SELECT gio_hang.*, san_pham.ten_san_pham ,san_pham.mo_ta, size_bien_the.size_name ,anh_san_pham.hinh_anh ,chi_tiet_san_pham.gia_ban ,chi_tiet_san_pham.sale FROM gio_hang 
            INNER JOIN chi_tiet_san_pham ON gio_hang.id_bien_the = chi_tiet_san_pham.id_chi_tiet
            INNER JOIN san_pham ON san_pham.id_san_pham = chi_tiet_san_pham.id_san_pham
            INNER JOIN size_bien_the ON  chi_tiet_san_pham.id_size = size_bien_the.id_size
            INNER JOIN anh_san_pham ON san_pham.id_san_pham = anh_san_pham.id_san_pham
            WHERE gio_hang.id_tai_khoan = '$id_tai_khoan'";
        $gio_hang = pdo_query($sql);
        return $gio_hang;
}

#đếm giỏ hàng
function dem_gio_hang($id_tai_khoan){
    $sql = "SELECT COUNT(*) AS so_luong 
            FROM gio_hang 
            WHERE id_tai_khoan = '$id_tai_khoan'";
    $result = pdo_query_one($sql);
    return $result['so_luong'];
}

#xóa toàn bộ giỏ hàng
function xoa_toan_bo_gio_hang($id_tai_khoan,$id_bien_the){
   if($id_bien_the != 0){
    $sql = "DELETE FROM gio_hang WHERE id_tai_khoan = '$id_tai_khoan' AND id_bien_the = '$id_bien_the'";
   }else {
    $sql = "DELETE FROM gio_hang WHERE id_tai_khoan = '$id_tai_khoan'";
   }
    pdo_execute($sql);
}

#tăng số lượng
function tang_so_luong($id_bien_the){
    $sql = "UPDATE gio_hang SET so_luong = so_luong + 1 WHERE id_bien_the = '$id_bien_the'";
    pdo_execute($sql);
}

#giảm số lượng
function giam_so_luong($id_bien_the){
    $sql = "UPDATE gio_hang SET so_luong = so_luong - 1 WHERE id_bien_the = '$id_bien_the'";
    pdo_execute($sql);
}


?>
