<?php
require_once '../app/config/database.php';

$database = new Database();
$conn = $database->getConnection();

if (isset($_GET['MADV'])) {
    $madv = $_GET['MADV'];

    $sql = "DELETE FROM DICHVU WHERE MADV = :madv";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':madv', $madv, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Xóa dịch vụ thành công."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Không thể xóa dịch vụ."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Thiếu mã dịch vụ (MADV)."]);
}
?>