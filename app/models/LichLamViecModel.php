<?php
class LichLamViecModel
{
    public function checkAvailability($manv, $thoigianbatdau, $thoigianketthuc)
    {
        $database = new Database();
        $conn = $database->getConnection();

        // Kiểm tra lịch làm việc của nhân viên
        $sql = "SELECT * FROM LICHLAMVIEC 
                WHERE MANV = :manv 
                AND (
                    (:thoigianbatdau BETWEEN THOIGIANBATDAU AND THOIGIANKETTHUC)
                    OR
                    (:thoigianketthuc BETWEEN THOIGIANBATDAU AND THOIGIANKETTHUC)
                )";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':manv', $manv);
        $stmt->bindParam(':thoigianbatdau', $thoigianbatdau);
        $stmt->bindParam(':thoigianketthuc', $thoigianketthuc);
        
        $stmt->execute();

        return $stmt->rowCount() === 0; // Trả về true nếu không có trùng lặp
    }
}
?>
