<?php

class DichvuController {
    // Phương thức index() (action mặc định)
    public function index() {
        $this->showServiceCategories(); // Gọi phương thức hiển thị nhóm dịch vụ
    }

    // Hiển thị danh sách nhóm dịch vụ
    public function showServiceCategories() {
        $categories = $this->getServiceCategories();
        require_once 'app/views/dichvu/service_categories.php';  // Gọi view để hiển thị nhóm dịch vụ
    }

    // Lấy tất cả nhóm dịch vụ từ API
    private function getServiceCategories() {
        $apiUrl = 'http://localhost:8080/WebQuanLySpa/api/dichvu/list-dichvu.php';

        // Sử dụng cURL thay vì file_get_contents
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response === false) {
            die('Error with cURL: ' . curl_error($ch));
        }

        $data = json_decode($response, true);
        return $data['data'] ?? [];  // Trả về dữ liệu nhóm dịch vụ
    }

    // Lấy danh sách dịch vụ theo nhóm từ API
    private function getServicesByCategory($categoryId) {
        $apiUrl = 'http://localhost:8080/WebQuanLySpa/api/dichvu/list-dichvu.php?category_id=' . $categoryId;

        // Sử dụng cURL thay vì file_get_contents
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response === false) {
            die('Error with cURL: ' . curl_error($ch));
        }

        $data = json_decode($response, true);
        return $data['data'] ?? [];  // Trả về danh sách dịch vụ theo nhóm
    }
}
