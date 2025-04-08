<?php

class DichvuController {

    public function index() {
        $this->showServiceCategories(); // Gọi phương thức hiển thị nhóm dịch vụ
    }
    // Hiển thị danh sách nhóm dịch vụ
    public function showServiceCategories() {
        $categories = $this->getServiceCategories();
        require_once 'app/views/dichvu/service_categories.php';
    }

    // Lấy tất cả nhóm dịch vụ từ API
    private function getServiceCategories() {
        $apiUrl = 'http://localhost:8080/WebQuanLySpa/api/dichvu/list-dichvu.php';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
    
        if($response === false) {
            die('Error with cURL: ' . curl_error($ch));
        }
    
        $data = json_decode($response, true);
        
        // Kiểm tra nếu có dữ liệu trước khi trả về
        if (isset($data['data']) && is_array($data['data'])) {
            return $data['data']; // Trả về danh sách dịch vụ nếu có
        }
    
        return []; // Trả về mảng rỗng nếu không có dữ liệu
    }
    

    // Hiển thị danh sách dịch vụ theo nhóm
    public function showServicesByCategory($categoryId) {
        $services = $this->getServicesByCategory($categoryId);
        require_once 'app/views/dichvu/services.php';
    }

    // Lấy danh sách dịch vụ theo nhóm từ API
    private function getServicesByCategory($categoryId) {
        $apiUrl = 'http://localhost/WebQuanLySpa/api/dichvu/list-dichvu.php?category_id=' . $categoryId;

        // Sử dụng cURL thay vì file_get_contents
        $ch = curl_init(); // Khởi tạo cURL
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        if($response === false) {
            die('Error with cURL: ' . curl_error($ch)); // Hiển thị lỗi nếu cURL thất bại
        }

        return json_decode($response, true)['data'] ?? [];
    }
}
