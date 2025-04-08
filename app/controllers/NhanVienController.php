<?php
class NhanVienController {
    public function index() {
        // Gọi API lấy danh sách nhân viên
        $apiUrl = 'http://localhost:8080/WebQuanLySpa/api/nhanvien/list-nhanvien.php';
        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);

        // Kiểm tra phản hồi API
        $nhanviens = [];
        if ($data && $data['status'] === 'success') {
            $nhanviens = $data['data'];
        }

        // Gửi dữ liệu qua view
        include 'app/views/nhanvien/index.php';
    }
}
