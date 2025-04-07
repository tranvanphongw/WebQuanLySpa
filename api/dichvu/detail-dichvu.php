<?php
require_once '../app/config/database.php';

$database = new Database();
$conn = $database->getConnection();

if (isset($_GET['MADV'])) {
    $madv = $_GET['MADV'];

    $sql = "SELECT DICHVU.MADV, DICHVU.TEN, DICHVU.MOTA, DICHVU.THOIGIANTHUCHIEN, DICHVU.GIATIEN, LOAIDICHVU.TENLOAI
            FROM DICHVU
            INNER JOIN LOAIDICHVU ON DICHVU.MALOAI = LOAIDICHVU.MALOAI
            WHERE DICHVU.MADV = :madv";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':madv', $madv, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo json_encode(["status" => "success", "data" => $result]);
    } else {
        echo json_encode(["status" => "error", "message" => "Không tìm thấy dịch vụ."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Thiếu mã dịch vụ (MADV)."]);
}
?>
