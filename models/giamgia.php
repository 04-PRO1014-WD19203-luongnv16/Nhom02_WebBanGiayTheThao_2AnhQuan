<?php
    // show mã
    function tat_ca_ma_giam_gia(){
        $sql = "SELECT *FROM giam_gia WHERE trang_thai = 0";
        $tat_ca_ma_giam_gia = pdo_query($sql);
        return $tat_ca_ma_giam_gia;
    }
    // xóa mã
    function xoa_ma_giam_gia($id_giam_gia){
        $sql = "UPDATE giam_gia SET trang_thai = 1 WHERE id_giam_gia = '$id_giam_gia'";
        pdo_execute($sql);
    }

    // #show mã đã xóa
    function tat_ca_ma_da_xoa(){
        $sql = "SELECT *FROM giam_gia WHERE trang_thai = 1";
        $tat_ca_ma_da_xoa = pdo_query($sql);
        return $tat_ca_ma_da_xoa;
    }

    // #khôi phục mã
    function khoi_phuc_ma($id_madx){
        $sql = "UPDATE giam_gia SET trang_thai = 0 WHERE id_giam_gia = '$id_madx'";
        pdo_execute($sql);
    }

    // #khôi phục toàn bộ mã
    function khoi_phuc_toan_bo_ma(){
        $sql = "UPDATE giam_gia SET trang_thai = 0";
        pdo_execute($sql);
    }

    #sửa mã
    function sua_ma($id_giam_gia, $ten_ma, $giam_gia, $ngay_bat_dau, $ngay_ket_thuc){
        $sql = "UPDATE giam_gia SET ten_giam_gia = '$ten_ma', giam_gia = '$giam_gia', `ngay_bat_dau` = '$ngay_bat_dau', `ngay_ket_thuc` = '$ngay_ket_thuc' WHERE id_giam_gia = '$id_giam_gia'";
        pdo_execute($sql);
    }

    #show_1_ma
    function show_1_ma($id_giam_gia){
    $sql = "SELECT *FROM giam_gia WHERE trang_thai = 0 AND id_giam_gia = '$id_giam_gia'";
    $one_ma = pdo_query_one($sql);
    return $one_ma;
    }

    #thêm mới mã
    function them_moi_ma($ten_ma, $giam_gia, $ngay_bat_dau, $ngay_ket_thuc){
        // $sql = "INSERT INTO size_bien_the(size_name,trang_thai) VALUES('$ten_size','0')";
        $sql = "INSERT INTO giam_gia (ten_giam_gia, giam_gia, ngay_bat_dau, ngay_ket_thuc, trang_thai) VALUES ('$ten_ma', '$giam_gia', '$ngay_bat_dau', '$ngay_ket_thuc', '0');";
        pdo_execute($sql);
    }

    #check mã
    function check_ma($ten_ma){
        $sql = "SELECT *FROM giam_gia WHERE ten_giam_gia = '$ten_ma'";
        $check = pdo_query_one($sql);
        return $check;
    }
?>
