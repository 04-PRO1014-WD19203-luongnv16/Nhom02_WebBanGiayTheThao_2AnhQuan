
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
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);  // Tăng thời gian timeout để xử lý lâu hơn
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        // Ghi log lỗi cURL nếu có
        file_put_contents('log.txt', "cURL Error: " . curl_error($ch) . "\n", FILE_APPEND);
        curl_close($ch);
        return false;
    }

    curl_close($ch);
    return $result;
}

$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa'; // Không dùng trong phiên bản này

$orderInfo = "Thanh toán Online";
$amount = $_SESSION['thanh_toan']['tong_gio_hang'];
$orderId = $_SESSION['thanh_toan']['ma_hoa_don'];
$redirectUrl = "http://localhost/Nhom02_WebBanGiayTheThao_2AnhQuan/index.php?act=trang_xac_nhan";
$ipnUrl = "http://localhost/Nhom02_WebBanGiayTheThao_2AnhQuan/view/atm_momo.php";

$extraData = isset($_POST["extraData"]) ? $_POST["extraData"] : "";

$requestId = time() . "";
$requestType = "payWithATM";

// Tạo dữ liệu yêu cầu không có chữ ký
$data = array(
    'partnerCode' => $partnerCode,
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
    'requestType' => $requestType
);

$result = execPostRequest($endpoint, json_encode($data));

if ($result === false) {
    echo 'Có lỗi xảy ra khi gửi yêu cầu. Vui lòng thử lại sau.';
    exit();
}

$jsonResult = json_decode($result, true);

// Ghi log dữ liệu nhận được để kiểm tra
file_put_contents('log.txt', print_r($jsonResult, true), FILE_APPEND);

// Chuyển hướng người dùng đến trang thanh toán MoMo
if (isset($jsonResult['payUrl']) && !empty($jsonResult['payUrl'])) {
    header('Location: ' . $jsonResult['payUrl']);
    exit();
} else {
    echo 'Error: ' . $result;
}
?>
