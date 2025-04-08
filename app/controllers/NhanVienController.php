<?php

class NhanvienController {
    private $apiBase = 'http://localhost:8080/WebQuanLySpa/api/nhanvien/';

    public function index() {
        $response = $this->fetchApi('http://localhost:8080/WebQuanLySpa/api/nhanvien/list-nhanvien.php');
        $data = json_decode($response, true);

        $nhanviens = $data['data'] ?? [];
        require_once 'app/views/nhanvien/index.php';
    }

    public function detail($manv) {
        $response = $this->fetchApi($this->apiBase . 'get-by-id.php?MANV=' . $manv);
        $data = json_decode($response, true);

        $nhanvien = $data['data'] ?? null;
        require_once 'app/views/nhanvien/detail.php';
    }

    public function filter() {
        $query = [];
        if (!empty($_GET['diem_min'])) {
            $query[] = 'diem_min=' . urlencode($_GET['diem_min']);
        }
        if (!empty($_GET['chuyenmon'])) {
            $query[] = 'chuyenmon=' . urlencode($_GET['chuyenmon']);
        }

        $url = $this->apiBase . 'filter.php';
        if ($query) {
            $url .= '?' . implode('&', $query);
        }

        $response = $this->fetchApi($url);
        $data = json_decode($response, true);

        $nhanviens = $data['data'] ?? [];
        require_once 'app/views/nhanvien/filter.php';
    }

    private function fetchApi($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if (isset($_COOKIE['PHPSESSID'])) {
            curl_setopt($ch, CURLOPT_COOKIE, 'PHPSESSID=' . $_COOKIE['PHPSESSID']);
        }

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return json_encode(['status' => 'error', 'message' => 'Lỗi CURL: ' . curl_error($ch)]);
        }

        curl_close($ch);
        return $response;
    }
}
