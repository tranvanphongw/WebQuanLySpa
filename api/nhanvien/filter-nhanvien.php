<?php
require_once '../auth.php';
require_once '../../app/config/database.php';

$chuyenmon = $_GET['chuyenmon'] ?? null;
$diem_min = $_GET['diem_min'] ?? 0;

$database = new Database();
$conn = $database->getConnection();

$sql = "SELECT MANV, TEN, DCHI, DTHOAI, CHUYENMON, DIEMDANHGIA, HINHANH 
        FROM NHANVIEN 
        WHERE DIEMDANHGIA >= :diem_min";

if ($chuyenmon) {
    $sql .= " AND CHUYENMON LIKE :chuyenmon";
}

$stmt = $conn->prepare($sql);
$stmt->bindParam(':diem_min', $diem_min, PDO::PARAM_STR);

if ($chuyenmon) {
    $chuyenmon = "%" . $chuyenmon . "%";
    $stmt->bindParam(':chuyenmon', $chuyenmon);
}

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(["status" => "success", "data" => $data]);
?>
