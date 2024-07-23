<?php 
#them hoa don
function them_hoa_don($id_tai_khoan,$tong_gio_hang,$ten_dang_nhap,$ma_hoa_don,$email,$sdt,$dia_chi,$trang_thai_giao_hang,$trang_thai_thanh_toan,$ngay_tao_don,$phuong_thuc_thanh_toan,$trang_thai_don){
    $sql = "INSERT INTO don_hang(id_tai_khoan,tong_don_hang,ten_dang_nhap,ma_hoa_don,email,sdt,dia_chi,trang_thai_giao_hang,trang_thai_thanh_toan,ngay_tao_don,phuong_thuc_thanh_toan,trang_thai_hien)
            VALUES('$id_tai_khoan','$tong_gio_hang','$ten_dang_nhap','$ma_hoa_don','$email','$sdt','$dia_chi','$trang_thai_giao_hang','$trang_thai_thanh_toan','$ngay_tao_don','$phuong_thuc_thanh_toan','$trang_thai_don');
            
    ";
    pdo_execute($sql);
}

#lấy id đơn hàng vừa tạo
function tim_id(){
    $sql = "SELECT id_don_hang FROM don_hang ORDER BY id_don_hang DESC LIMIT 1";
    $tim = pdo_query_one($sql);
    return $tim['id_don_hang'] ;
}

#thêm hóa đơn chi tiết
function them_hoa_don_chi_tiet($id_don_hang,$id_chi_tiet_san_pham,$ten_san_pham,$so_luong,$hinh_anh_san_pham,$size_name,$tong_gio_hang){
$sql = "INSERT INTO chi_tiet_don_hang (id_don_hang, id_chi_tiet_san_pham,ten_san_pham,so_luong, hinh_anh_san_pham,size_name, tong_don_hang)
                VALUES ('$id_don_hang','$id_chi_tiet_san_pham','$ten_san_pham','$so_luong','$hinh_anh_san_pham','$size_name','$tong_gio_hang')";
pdo_execute($sql);
}

#lấy id đơn hàng
function tim_id_don(){
    $sql = "SELECT * FROM don_hang ORDER BY id_don_hang DESC LIMIT 1
";
$id_don_hang = pdo_query_one($sql);
return $id_don_hang['id_don_hang'];
}
#show hóa đơn theo id tk
function show_hoa_don($id_don_hang,$id_tai_khoan){
   $sql ="SELECT don_hang.* , chi_tiet_don_hang.ten_san_pham,chi_tiet_don_hang.hinh_anh_san_pham,chi_tiet_don_hang.size_name,chi_tiet_don_hang.tong_don_hang,chi_tiet_don_hang.so_luong
    FROM don_hang
    INNER JOIN chi_tiet_don_hang ON don_hang.id_don_hang = chi_tiet_don_hang.id_don_hang
     WHERE don_hang.id_don_hang = '$id_don_hang' AND don_hang.id_tai_khoan = '$id_tai_khoan'";
   $don_hang = pdo_query($sql);
   return $don_hang;
}

function show_all_hoa_don(){
    $sql ="SELECT * 
    FROM don_hang

    WHERE don_hang.trang_thai_hien = 0
    ";
   $don_hang = pdo_query($sql);
   return $don_hang;
}

#xác nhận đơn hàng bên admin
function xac_nhan_don($id_don_hang){
    $sql = "UPDATE don_hang SET trang_thai_giao_hang = 1 WHERE id_don_hang = '$id_don_hang'";
    pdo_execute($sql);
}

#hủy đơn hàng
function huy_don($id_don_hang){
    $sql = "UPDATE don_hang SET trang_thai_hien = 1 WHERE id_don_hang = '$id_don_hang'";
    pdo_execute($sql);
}

#đếm đơn hàng chưa xử lý
function dem_don_chu_xu_ly(){
    $sql = "SELECT COUNT(*) AS so_luong
    FROM don_hang
    WHERE trang_thai_giao_hang = 0;
    ";
    $so_luong_chua_xu_ly = pdo_query($sql);
    return $so_luong_chua_xu_ly[0]['so_luong'];
}

#đếm đơn đã  xử lý
function dem_don_da_xu_ly(){
    $sql = "SELECT COUNT(*) AS so_luong
    FROM don_hang
    WHERE trang_thai_giao_hang = 1;
    ";
    $so_luong_chua_xu_ly = pdo_query($sql);
    return $so_luong_chua_xu_ly[0]['so_luong'];
}

#đếm đơn đã  giao
function dem_don_da_giao(){
    $sql = "SELECT COUNT(*) AS so_luong
    FROM don_hang
    WHERE trang_thai_giao_hang = 2;
    ";
    $so_luong_chua_xu_ly = pdo_query($sql);
    return $so_luong_chua_xu_ly[0]['so_luong'];
}

#đếm đơn đã  hủy
function dem_don_da_huy(){
    $sql = "SELECT COUNT(*) AS so_luong
    FROM don_hang
    WHERE trang_thai_giao_hang = 3;
    ";
    $so_luong_chua_xu_ly = pdo_query($sql);
    return $so_luong_chua_xu_ly[0]['so_luong'];
}
#đếm sản phảm đã khóa 
function san_pham_da_khoa(){
    $sql = "SELECT COUNT(*) AS so_luong
FROM san_pham
WHERE trang_thai_san_pham = 1
";
$san_pham_da_xoa = pdo_query($sql);
return $san_pham_da_xoa[0]['so_luong'];
}

#sản phẩm hết hàng
function san_pham_het_hang(){
    $sql = "SELECT COUNT(*) AS so_luong
FROM chi_tiet_san_pham
WHERE so_luong_ton = 0;
";
$san_pham_da_het = pdo_query($sql);
return $san_pham_da_het[0]['so_luong'];
}

#doanh thu tháng
function doanh_thu(){
    $sql = "SELECT 
    DATE_FORMAT(ngay_tao_don, '%Y-%m') AS thang_nam, 
    SUM(tong_don_hang) AS tong_doanh_thu
FROM 
    don_hang
WHERE 
    trang_thai_thanh_toan = 'Đã thanh toán'
GROUP BY 
    DATE_FORMAT(ngay_tao_don, '%Y-%m')
ORDER BY 
    DATE_FORMAT(ngay_tao_don, '%Y-%m') DESC;
";
$doanh_thu = pdo_query($sql);
return $doanh_thu[0]['tong_doanh_thu'];

}

#doanh thu năm
function doanh_thu_nam_hien_tai(){
    $sql = "SELECT 
    DATE_FORMAT(ngay_tao_don, '%Y') AS nam, 
    SUM(tong_don_hang) AS tong_doanh_thu
FROM 
    don_hang
WHERE 
    trang_thai_thanh_toan = 'Đã thanh toán'
GROUP BY 
    DATE_FORMAT(ngay_tao_don, '%Y')
ORDER BY 
    DATE_FORMAT(ngay_tao_don, '%Y') DESC;
";

$doanh_thu = pdo_query($sql);

return $doanh_thu[0]['tong_doanh_thu'];
}

#show hóa đơn user
function show_all_hoa_don_user($id_tai_khoan){
    $sql = "SELECT dh.id_don_hang, dh.ngay_tao_don, dh.trang_thai_hien, dh.phuong_thuc_thanh_toan, dh.ma_hoa_don, dh.tong_don_hang,dh.trang_thai_giao_hang,
            SUM(ctdh.so_luong) AS tong_so_luong_san_pham
            FROM don_hang dh
            LEFT JOIN chi_tiet_don_hang ctdh ON dh.id_don_hang = ctdh.id_don_hang
            WHERE dh.trang_thai_hien = 0 AND dh.id_tai_khoan = '$id_tai_khoan'
            GROUP BY dh.id_don_hang, dh.ngay_tao_don, dh.trang_thai_hien, dh.phuong_thuc_thanh_toan, dh.ma_hoa_don, dh.tong_don_hang";
    
    $don_hang = pdo_query($sql);
    return $don_hang;
}

#trạng thái đã nhận
function update_da_nhan($id_don_hang){
    $sql = "UPDATE don_hang SET trang_thai_giao_hang = 2 WHERE id_don_hang = '$id_don_hang'";
    pdo_execute($sql);
}

#trạng thái hủy
function update_huy_don($id_don_hang){
    $sql = "UPDATE don_hang SET trang_thai_giao_hang = 3 WHERE id_don_hang = '$id_don_hang'";
    pdo_execute($sql);
}
?>
