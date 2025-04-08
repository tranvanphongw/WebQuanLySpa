<?php
class DatLichController
{
    // Phương thức hiển thị trang đặt lịch
    public function index()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!isset($_SESSION['customer_id'])) {
            // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
            header('Location: /WebQuanLySpa/khachhang/login');
            exit;
        }

        // Nếu đã đăng nhập, load view đặt lịch
        require_once 'app/views/khachhang/datlich.php';
    }

    // Phương thức xử lý dữ liệu đặt lịch
    public function store()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!isset($_SESSION['customer_id'])) {
            echo json_encode(['status' => 'error', 'message' => 'Bạn cần đăng nhập để đặt lịch.']);
            return;
        }

        // Lấy dữ liệu từ form
        $makh = $_SESSION['customer_id'];  // Mã khách hàng từ session
        $manv = $_POST['manv'];
        $madv = $_POST['madv'];
        $thoigianbatdau = $_POST['thoigianbatdau'];
        $thoigianketthuc = $_POST['thoigianketthuc'];

        // Kiểm tra dữ liệu có hợp lệ không
        if (empty($manv) || empty($madv) || empty($thoigianbatdau) || empty($thoigianketthuc)) {
            echo json_encode(['status' => 'error', 'message' => 'Thiếu thông tin.']);
            return;
        }

        // Tạo đối tượng Lịch Đặt
        $lichdat = new LichDatModel($makh, $manv, $madv, $thoigianbatdau, $thoigianketthuc, 1); // Trạng thái "Đang chờ"

        // Lưu vào cơ sở dữ liệu
        if ($lichdat->createLichDat()) {
            echo json_encode(['status' => 'success', 'message' => 'Đặt lịch thành công!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Lỗi khi đặt lịch.']);
        }
    }
}
?>
