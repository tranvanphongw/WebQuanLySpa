<?php
require_once '../app/config/database.php';

$database = new Database();
$conn = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

if (
    isset($data->MADV) &&
    isset($data->TEN) &&
    isset($data->MOTA) &&
    isset($data->THOIGIANTHUCHIEN) &&
    isset($data->GIATIEN) &&
    isset($data->MALOAI)
) {
    $sql = "UPDATE DICHVU 
            SET TEN = :ten, MOTA = :mota, THOIGIANTHUCHIEN = :thoigian, GIATIEN = :giatien, MALOAI = :maloai 
            WHERE MADV = :madv";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ten', $data->TEN);
    $stmt->bindParam(':mota', $data->MOTA);
    $stmt->bindParam(':thoigian', $data->THOIGIANTHUCHIEN, PDO::PARAM_INT);
    $stmt->bindParam(':giatien', $data->GIATIEN);
    $stmt->bindParam(':maloai', $data->MALOAI, PDO::PARAM_INT);
    $stmt->bindParam(':madv', $data->MADV, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Cập nhật dịch vụ thành công."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Không thể cập nhật dịch vụ."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Thiếu dữ liệu đầu vào."]);
}
?>
