<?php
require_once '../auth.php';
require_once '../../app/config/database.php';

$data = json_decode(file_get_contents("php://input"));
$makh = $user_data['MAKH'];

if (
    !isset($data->MANV) ||
    !isset($data->SOSAO) ||
    !isset($data->BINHLUAN)
) {
    echo json_encode(["status" => "error", "message" => "Thiếu dữ liệu đánh giá."]);
    exit;
}

$manv = $data->MANV;
$sosao = $data->SOSAO;
$binhluan = $data->BINHLUAN;

$database = new Database();
$conn = $database->getConnection();

// Kiểm tra khách hàng đã từng sử dụng dịch vụ với nhân viên đó chưa (và đã hoàn thành)
$sql_check = "SELECT 1 FROM LICHDAT 
              WHERE MAKH = :makh AND MANV = :manv AND MATRANGTHAI = 3"; // 3 = Hoàn thành
$stmt = $conn->prepare($sql_check);
$stmt->bindParam(':makh', $makh);
$stmt->bindParam(':manv', $manv);
$stmt->execute();

if ($stmt->rowCount() === 0) {
    echo json_encode(["status" => "error", "message" => "Bạn chưa từng sử dụng dịch vụ của nhân viên này hoặc chưa hoàn thành."]);
    exit;
}

// Thêm đánh giá
$sql_insert = "INSERT INTO DANHGIA (MAKH, MANV, SOSAO, BINHLUAN) 
               VALUES (:makh, :manv, :sosao, :binhluan)";
$stmt = $conn->prepare($sql_insert);
$stmt->bindParam(':makh', $makh);
$stmt->bindParam(':manv', $manv);
$stmt->bindParam(':sosao', $sosao);
$stmt->bindParam(':binhluan', $binhluan);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Đánh giá đã được gửi."]);
} else {
    echo json_encode(["status" => "error", "message" => "Gửi đánh giá thất bại."]);
}
?>
