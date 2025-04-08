<?php
// Cấu hình CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

require_once $_SERVER['DOCUMENT_ROOT'] . '/WebQuanLySpa/app/config/database.php';

$database = new Database();
$conn = $database->getConnection();

// Lấy dữ liệu từ frontend (POST request)
$data = json_decode(file_get_contents("php://input"), true);

// Kiểm tra dữ liệu có đầy đủ không
if (empty($data['makh']) || empty($data['manv']) || empty($data['madv']) || empty($data['thoigianbatdau'])) {
    echo json_encode(['status' => 'error', 'message' => 'Thiếu thông tin bắt buộc.']);
    exit();
}

// Lấy các tham số từ frontend
$makh = $data['makh'];  // Mã khách hàng
$manv = $data['manv'];  // Mã nhân viên
$madv = $data['madv'];  // Mã dịch vụ
$thoigianbatdau = $data['thoigianbatdau'];  // Thời gian bắt đầu

// Lấy thời gian thực hiện của dịch vụ
$sql = "SELECT THOIGIANTHUCHIEN FROM DICHVU WHERE MADV = :madv";
$stmt = $conn->prepare($sql);
$stmt->execute([':madv' => $madv]);
$service = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$service) {
    echo json_encode(['status' => 'error', 'message' => 'Dịch vụ không tồn tại.']);
    exit();
}

// Tính toán thời gian kết thúc (theo thời gian thực hiện dịch vụ)
$thoigianbatdau = new DateTime($thoigianbatdau);
$thoigianbatdau->add(new DateInterval('PT' . $service['THOIGIANTHUCHIEN'] . 'M')); // Thêm thời gian thực hiện dịch vụ vào thời gian bắt đầu
$thoigianketthuc = $thoigianbatdau->format('Y-m-d H:i:s');

// Chèn thông tin vào bảng LICHDAT
$sql = "INSERT INTO LICHDAT (MAKH, MANV, MADV, THOIGIANBATDAU, THOIGIANKETTHUC, MATRANGTHAI)
        VALUES (:makh, :manv, :madv, :thoigianbatdau, :thoigianketthuc, 1)";  // Trạng thái = 1 (Chờ xác nhận)
$stmt = $conn->prepare($sql);
$result = $stmt->execute([
    ':makh' => $makh,
    ':manv' => $manv,
    ':madv' => $madv,
    ':thoigianbatdau' => $data['thoigianbatdau'],
    ':thoigianketthuc' => $thoigianketthuc
]);

// Kiểm tra và trả kết quả
if ($result) {
    echo json_encode(['status' => 'success', 'message' => 'Đặt lịch thành công.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Có lỗi khi đặt lịch.']);
}
?>
