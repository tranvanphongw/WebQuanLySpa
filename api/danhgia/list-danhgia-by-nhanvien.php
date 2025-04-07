<?php
require_once '../../app/config/database.php';

if (!isset($_GET['MANV'])) {
    echo json_encode(["status" => "error", "message" => "Thiếu mã nhân viên."]);
    exit;
}

$manv = $_GET['MANV'];

$database = new Database();
$conn = $database->getConnection();

$sql = "SELECT DG.SOSAO, DG.BINHLUAN, DG.NGAYDANHGIA, KH.TEN AS TENKH
        FROM DANHGIA DG
        INNER JOIN KHACHHANG KH ON DG.MAKH = KH.MAKH
        WHERE DG.MANV = :manv
        ORDER BY DG.NGAYDANHGIA DESC";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':manv', $manv, PDO::PARAM_INT);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(["status" => "success", "data" => $data]);
?>
