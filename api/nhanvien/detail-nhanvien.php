<?php
require_once '../auth.php';
require_once '../../app/config/database.php';

if (!isset($_GET['MANV'])) {
    echo json_encode(["status" => "error", "message" => "Thiếu mã nhân viên (MANV)"]);
    exit;
}

$manv = $_GET['MANV'];

$database = new Database();
$conn = $database->getConnection();

$sql = "SELECT MANV, TEN, DCHI, DTHOAI, CHUYENMON, DIEMDANHGIA, HINHANH FROM NHANVIEN WHERE MANV = :manv";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':manv', $manv, PDO::PARAM_INT);
$stmt->execute();

$nhanvien = $stmt->fetch(PDO::FETCH_ASSOC);

if ($nhanvien) {
    echo json_encode(["status" => "success", "data" => $nhanvien]);
} else {
    echo json_encode(["status" => "error", "message" => "Không tìm thấy nhân viên."]);
}
?>
