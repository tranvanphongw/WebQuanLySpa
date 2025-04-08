<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

require_once '../auth.php';
require_once '../../app/config/database.php';

try {
    $data = json_decode(file_get_contents("php://input"));

    if (!isset($user_data['MAKH'])) {
        throw new Exception("Bạn chưa đăng nhập.");
    }

    $makh = $user_data['MAKH'];

    if (!isset($data->MANV) || !isset($data->SOSAO) || !isset($data->BINHLUAN)) {
        throw new Exception("Thiếu dữ liệu đánh giá.");
    }

    $manv = $data->MANV;
    $sosao = $data->SOSAO;
    $binhluan = $data->BINHLUAN;

    $database = new Database();
    $conn = $database->getConnection();

    // ✅ Chỉ cho đánh giá nếu KH đã hoàn thành lịch hẹn
    $sql_check = "SELECT 1 FROM LICHDAT 
                  WHERE MAKH = :makh AND MANV = :manv AND MATRANGTHAI = 1";
    $stmt = $conn->prepare($sql_check);
    $stmt->bindParam(':makh', $makh);
    $stmt->bindParam(':manv', $manv);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        throw new Exception("Bạn chưa từng đặt lịch hoàn thành với nhân viên này.");
    }

    // ✅ Không cho đánh giá trùng
    $sql_dupe = "SELECT 1 FROM DANHGIA WHERE MAKH = :makh AND MANV = :manv";
    $stmt_dupe = $conn->prepare($sql_dupe);
    $stmt_dupe->bindParam(':makh', $makh);
    $stmt_dupe->bindParam(':manv', $manv);
    $stmt_dupe->execute();

    if ($stmt_dupe->rowCount() > 0) {
        throw new Exception("Bạn đã đánh giá nhân viên này rồi.");
    }

    // ✅ Thêm đánh giá
    $sql_insert = "INSERT INTO DANHGIA (MAKH, MANV, SOSAO, BINHLUAN) 
                   VALUES (:makh, :manv, :sosao, :binhluan)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bindParam(':makh', $makh);
    $stmt->bindParam(':manv', $manv);
    $stmt->bindParam(':sosao', $sosao);
    $stmt->bindParam(':binhluan', $binhluan);

    if (!$stmt->execute()) {
        throw new Exception("Không thể thêm đánh giá.");
    }

    // ✅ Cập nhật điểm trung bình
    $sql_avg = "UPDATE NHANVIEN 
                SET DIEMDANHGIA = (
                    SELECT ROUND(AVG(SOSAO), 1) FROM DANHGIA WHERE MANV = :manv
                )
                WHERE MANV = :manv";
    $stmt_avg = $conn->prepare($sql_avg);
    $stmt_avg->bindParam(':manv', $manv);
    $stmt_avg->execute();

    echo json_encode(["status" => "success", "message" => "Đánh giá đã được gửi."]);

} catch (Throwable $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
