<?php 
#doanh thu theo thánng
function doanh_thu_theo_thang() {
    $sql = "SELECT 
    DAY(ngay_tao_don) AS ngay, 
    SUM(tong_don_hang) AS doanh_thu
FROM 
    don_hang
WHERE 
    trang_thai_thanh_toan = 'Đã thanh toán' AND 
    MONTH(ngay_tao_don) = MONTH(CURDATE()) AND 
    YEAR(ngay_tao_don) = YEAR(CURDATE())
GROUP BY 
    DAY(ngay_tao_don)
ORDER BY 
    ngay";
    $doanh_thu_thang = pdo_query($sql);
    return $doanh_thu_thang;
}

#doanh thu theo năm
function doanh_thu_nam(){
    $sql ="SELECT 
    MONTH(ngay_tao_don) AS thang, 
    SUM(tong_don_hang) AS doanh_thu
FROM 
    don_hang
WHERE 
    trang_thai_thanh_toan = 'Đã thanh toán' AND 
    YEAR(ngay_tao_don) = YEAR(CURDATE())
GROUP BY 
    MONTH(ngay_tao_don)
ORDER BY 
    thang;
";
$doanh_thu_nam = pdo_query($sql);
return $doanh_thu_nam;
}

#doanh thu theo ngày
function doanh_thu_ngay(){
    $sql ="SELECT 
    HOUR(ngay_tao_don) AS gio, 
    SUM(tong_don_hang) AS doanh_thu
FROM 
    don_hang
WHERE 
    trang_thai_thanh_toan = 'Đã thanh toán' AND 
    DATE(ngay_tao_don) = CURDATE()
GROUP BY 
    HOUR(ngay_tao_don)
ORDER BY 
    gio;

";
$doanh_thu_ngay = pdo_query($sql);
return $doanh_thu_ngay;
}

#top 5 sp doanh thu cao nhất
function top_5_doanh_thu(){
    $sql = "SELECT 
    ctdh.ten_san_pham,
    ctdh.hinh_anh_san_pham,
    SUM(ctdh.so_luong * ctdh.tong_gia_bien_the) AS doanh_thu
FROM 
    chi_tiet_don_hang ctdh
JOIN 
    don_hang dh ON ctdh.id_don_hang = dh.id_don_hang
GROUP BY 
    ctdh.ten_san_pham, ctdh.hinh_anh_san_pham
ORDER BY 
    doanh_thu DESC
LIMIT 5;
";
$top_doanh_thu = pdo_query($sql);
return $top_doanh_thu;
}

#top 5 sản phẩm bán chạy
function top_5_ban_chay(){
    $sql = "SELECT 
    ctdh.ten_san_pham,
     ctdh.hinh_anh_san_pham,
    SUM(ctdh.so_luong) AS tong_so_luong
FROM 
    chi_tiet_don_hang ctdh
JOIN 
    don_hang dh ON ctdh.id_don_hang = dh.id_don_hang
GROUP BY 
    ctdh.ten_san_pham, ctdh.hinh_anh_san_pham
ORDER BY 
    tong_so_luong DESC
LIMIT 5;
";
$top_ban_chay = pdo_query($sql);
return $top_ban_chay;
}
?>
