<?php
require_once '../auth.php';
require_once '../../app/config/database.php';

$makh = $user_data['MAKH'];
$database = new Database();
$conn = $database->getConnection();

$sql = "SELECT LD.MALICH, DV.TEN AS TENDV, NV.TEN AS TENNV, LD.THOIGIANBATDAU, LD.THOIGIANKETTHUC, TT.TENTRANGTHAI
        FROM LICHDAT LD
        INNER JOIN DICHVU DV ON LD.MADV = DV.MADV
        INNER JOIN NHANVIEN NV ON LD.MANV = NV.MANV
        INNER JOIN TRANGTHAILICHDAT TT ON LD.MATRANGTHAI = TT.MATRANGTHAI
        WHERE LD.MAKH = :makh
        ORDER BY LD.THOIGIANBATDAU DESC";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':makh', $makh);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(["status" => "success", "data" => $data]);
?>
