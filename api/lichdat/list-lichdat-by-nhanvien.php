<?php
require_once '../auth.php';
require_once '../../app/config/database.php';

$manv = $user_data['MANV']; // cần token của nhân viên
$database = new Database();
$conn = $database->getConnection();

$sql = "SELECT LD.MALICH, KH.TEN AS TENKH, DV.TEN AS TENDV, LD.THOIGIANBATDAU, LD.THOIGIANKETTHUC, TT.TENTRANGTHAI
        FROM LICHDAT LD
        INNER JOIN KHACHHANG KH ON LD.MAKH = KH.MAKH
        INNER JOIN DICHVU DV ON LD.MADV = DV.MADV
        INNER JOIN TRANGTHAILICHDAT TT ON LD.MATRANGTHAI = TT.MATRANGTHAI
        WHERE LD.MANV = :manv
        ORDER BY LD.THOIGIANBATDAU DESC";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':manv', $manv);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(["status" => "success", "data" => $data]);
?>
