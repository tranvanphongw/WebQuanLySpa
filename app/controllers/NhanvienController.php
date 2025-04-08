<?php

class NhanvienController {
    private $apiBase = 'http://localhost:8080/WebQuanLySpa/api/nhanvien/';

    public function index() {
        $response = file_get_contents($this->apiBase . 'list-nhanvien.php');
        $data = json_decode($response, true);

        $nhanviens = $data['data'] ?? [];
        require_once 'app/views/nhanvien/index.php';
    }

    public function detail($manv) {
        $response = file_get_contents($this->apiBase . 'get-by-id.php?MANV=' . $manv);
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

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        $nhanviens = $data['data'] ?? [];
        require_once 'app/views/nhanvien/filter.php';
    }
}
