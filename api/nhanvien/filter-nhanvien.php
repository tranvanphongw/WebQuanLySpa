<?php
require_once '../auth.php';
require_once '../../app/config/database.php';

$diem_min = $_GET['diem_min'] ?? 0;

$database = new Database();
$conn = $database->getConnection();

// Xóa CHUYENMON khỏi truy vấn và lọc
$sql = "SELECT MANV, TEN, DCHI, DTHOAI, DIEMDANHGIA, HINHANH 
        FROM NHANVIEN 
        WHERE DIEMDANHGIA >= :diem_min";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':diem_min', $diem_min, PDO::PARAM_STR);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(["status" => "success", "data" => $data]);
?>
