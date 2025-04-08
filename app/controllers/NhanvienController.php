<?php
require_once 'app/config/database.php';
require_once 'app/views/models/NhanvienModel.php';

class NhanvienController {
    private $model;

    public function __construct() {
        $db = new Database();
        $conn = $db->getConnection();
        $this->model = new NhanvienModel($conn);
    }

    public function index() {
        $nhanviens = $this->model->getAll();
        require_once 'app/views/nhanvien/index.php';
    }

    public function detail($manv) {
        $nhanvien = $this->model->getById($manv);
        require_once 'app/views/nhanvien/detail.php';
    }

    public function filter() {
        $chuyenmon = $_GET['chuyenmon'] ?? null;
        $diem_min = $_GET['diem_min'] ?? 0;
        $result = $this->model->getByFilter($chuyenmon, $diem_min);
        require_once 'app/views/nhanvien/filter.php';
    }
}
