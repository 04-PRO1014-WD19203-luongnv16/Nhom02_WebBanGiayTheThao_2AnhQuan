<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

header('Content-type: text/html; charset=utf-8');


function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}



$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
$orderInfo = "Thanh toán Online";
$amount = $_SESSION['thanh_toan']['tong_gio_hang'] ;
$orderId = $_SESSION['thanh_toan']['ma_hoa_don'] ;
$id_tai_khoan =    $_SESSION['thanh_toan']['id_tai_khoan'];
$ten_dang_nhap =   $_SESSION['thanh_toan']['ten'];
$email =   $_SESSION['thanh_toan']['email'];
$sdt =   $_SESSION['thanh_toan']['sdt'];
$dia_chi =   $_SESSION['thanh_toan']['dia_chi'];
$ngay_tao_don =   $_SESSION['thanh_toan']['ngay_tao_don'];
$trang_thai_thanh_toan =  $_SESSION['thanh_toan']['trang_thai_thanh_toan'];
$phuong_thuc_thanh_toan =   $_SESSION['thanh_toan']['phuong_thuc_thanh_toan'];
$trang_thai_don =   $_SESSION['thanh_toan']['trang_thai_don'];
$bill = $_SESSION['thanh_toan']['bill'];
$redirectUrl = "http://localhost/Nhom02_WebBanGiayTheThao_2AnhQuan/index.php?act=trang_xac_nhan";
$ipnUrl = "http://localhost/Nhom02_WebBanGiayTheThao_2AnhQuan/view/atm_momo.php";

$extraData = isset($_POST["extraData"]) ? $_POST["extraData"] : "";


$requestId = time() . "";
$requestType = "payWithATM";
$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
//before sign HMAC SHA256 signature
$rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
$signature = hash_hmac("sha256", $rawHash, $secretKey);
$data = array('partnerCode' => $partnerCode,
    'partnerName' => "Test",
    "storeId" => "MomoTestStore",
    'requestId' => $requestId,
    'amount' => $amount,
    'orderId' => $orderId,
    'orderInfo' => $orderInfo,
    'redirectUrl' => $redirectUrl,
    'ipnUrl' => $ipnUrl,
    'lang' => 'vi',
    'extraData' => $extraData,
    'requestType' => $requestType,
    'signature' => $signature);
$result = execPostRequest($endpoint, json_encode($data));
$jsonResult = json_decode($result, true);  // decode json
them_hoa_don($id_tai_khoan, $amount, $ten_dang_nhap, $orderId, $email, $sdt, $dia_chi, 0, $trang_thai_thanh_toan, $ngay_tao_don, $phuong_thuc_thanh_toan, $trang_thai_don);
$id_chi_tiet_don_hang = tim_id();
            
# Lấy ra chi tiết các biến thể
foreach ($bill['bien_the'] as $bien_the) {
    $id_bien_the = $bien_the['id_bien_the'];
    $so_luong = $bien_the['so_luong'];
    $hinh_anh = $bien_the['hinh_anh'];
    $size_name = $bien_the['size_name'];
    $ten_san_pham = $bien_the['ten_san_pham'];
    // Thêm chi tiết đơn hàng
    them_hoa_don_chi_tiet($id_chi_tiet_don_hang, $id_bien_the, $ten_san_pham, $so_luong, $hinh_anh, $size_name, $amount);
    cap_nhat_so_luong($id_bien_the, $so_luong);
    xoa_toan_bo_gio_hang($id_tai_khoan, $id_bien_the);
}
// Chuyển hướng người dùng đến trang thanh toán MoMo
if (isset($jsonResult['payUrl']) && !empty($jsonResult['payUrl'])) {
    header('Location: ' . $jsonResult['payUrl']);
    exit();
} else {
    echo 'Error: ' . $result;
}


?>


