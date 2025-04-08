<?php

require_once '../../app/config/database.php';

$database = new Database();
$conn = $database->getConnection();

$sql = "SELECT MANV, TEN, DCHI, DTHOAI, DIEMDANHGIA AS DIEMTRUNGBINH, HINHANH FROM NHANVIEN
";
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "status" => "success",
    "data" => $result
]);
?>
