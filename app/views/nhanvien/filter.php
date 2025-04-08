<?php
// app/controllers/NhanVienController.php (hoặc file tương ứng Controller của bạn)
require_once '../../app/config/database.php';

$database = new Database();
$conn = $database->getConnection();

$sql = "SELECT 
            NV.*, 
            ROUND(AVG(DG.SOSAO), 1) AS DIEMTRUNGBINH
        FROM NHANVIEN NV
        LEFT JOIN DANHGIA DG ON NV.MANV = DG.MANV
        GROUP BY NV.MANV";

$stmt = $conn->prepare($sql);
$stmt->execute();

$nhanviens = $stmt->fetchAll(PDO::FETCH_ASSOC);

require '../../app/views/nhanvien/index.php';
