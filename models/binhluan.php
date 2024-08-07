<?php 
#thêm bình luận
function them_binh_luan($id_tai_khoan,$id_san_pham,$noi_dung,$date,$diem_danh_gia,$trang_thai,$id_don_hang){
    $sql = "INSERT INTO binh_luan(id_tai_khoan,id_san_pham,noi_dung,date,diem_danh_gia,trang_thai,id_don_hang) 
    VALUES('$id_tai_khoan','$id_san_pham','$noi_dung','$date',$diem_danh_gia,'$trang_thai','$id_don_hang') ";
    pdo_execute($sql);

}

#show bình luận theo sản phẩm
function show_binh_luan_theo_san_pham($id_san_pham){
    $sql = "SELECT binh_luan.*, tai_khoan.ten_dang_nhap ,tai_khoan.hinh_anh FROM binh_luan
    inner join tai_khoan ON tai_khoan.id_tai_khoan = binh_luan.id_tai_khoan
     WHERE id_san_pham = '$id_san_pham' AND binh_luan.trang_thai = 0";
    $binh_luan = pdo_query($sql);
    return $binh_luan;
}

#show tất cả bình luận
function show_binh_luan(){
    $sql = "SELECT binh_luan.*,tai_khoan.email, tai_khoan.ten_dang_nhap ,tai_khoan.hinh_anh FROM binh_luan
    inner join tai_khoan ON tai_khoan.id_tai_khoan = binh_luan.id_tai_khoan
    WHERE binh_luan.trang_thai = 0
    ";
    
    $binh_luan = pdo_query($sql);
    return $binh_luan;
}

#show tất cả bình luận đã xóa
function show_binh_luan_da_xoa(){
    $sql = "SELECT binh_luan.*,tai_khoan.email, tai_khoan.ten_dang_nhap ,tai_khoan.hinh_anh FROM binh_luan
    inner join tai_khoan ON tai_khoan.id_tai_khoan = binh_luan.id_tai_khoan
    WHERE binh_luan.trang_thai = 1
    ";
    
    $binh_luan = pdo_query($sql);
    return $binh_luan;
}
#ẩn bình luận
function an_binh_luan($id_binh_luan){
$sql = "UPDATE binh_luan SET trang_thai = 1 WHERE id_binh_luan = '$id_binh_luan'";
pdo_execute($sql);
}
#show chi tiết bình luận
function show_chi_tiet_binh_luan($id_binh_luan){
    $sql = "SELECT binh_luan.*, tai_khoan.ten_dang_nhap ,tai_khoan.hinh_anh FROM binh_luan
    inner join tai_khoan ON tai_khoan.id_tai_khoan = binh_luan.id_tai_khoan
     WHERE id_binh_luan = '$id_binh_luan'";
    $one_binh_luan = pdo_query_one($sql);
    return $one_binh_luan;
}

function lay_diem_danh_gia($id_san_pham) {
    $sql = "SELECT * FROM binh_luan WHERE id_san_pham = '$id_san_pham' AND trang_thai = 0";
    return pdo_query($sql); 
}

#kiểm tra đơn hàng đã được đánh giá hay chưa
function kiem_tra_binh_luan($id_don_hang) {
    $sql = "SELECT COUNT(*) AS so_binh_luan FROM binh_luan WHERE id_don_hang = '$id_don_hang'";
    $dem = pdo_query_one($sql);
    return $dem['so_binh_luan'] ;
}

?>