<?php
require_once '../auth.php';
require_once '../../app/config/database.php';

$makh = $user_data['MAKH'];
$database = new Database();
$conn = $database->getConnection();

$sql = "SELECT TT.MATHANHTOAN, DV.TEN AS TENDV, TT.SOTIEN, TT.NGAYTHANHTOAN, TT.HINHTHUCTHANHTOAN
        FROM THANHTOAN TT
        INNER JOIN LICHDAT LD ON TT.MALICH = LD.MALICH
        INNER JOIN DICHVU DV ON LD.MADV = DV.MADV
        WHERE TT.MAKH = :makh
        ORDER BY TT.NGAYTHANHTOAN DESC";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':makh', $makh);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(["status" => "success", "data" => $data]);
?>
