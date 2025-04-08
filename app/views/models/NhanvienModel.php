<?php
class NhanvienModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $sql = "SELECT NV.*, 
                       ROUND(AVG(DG.SOSAO), 1) AS DIEMTRUNGBINH
                FROM NHANVIEN NV
                LEFT JOIN DANHGIA DG ON NV.MANV = DG.MANV
                GROUP BY NV.MANV";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($manv) {
        $sql = "SELECT NV.*, 
                       ROUND(AVG(DG.SOSAO), 1) AS DIEMTRUNGBINH
                FROM NHANVIEN NV
                LEFT JOIN DANHGIA DG ON NV.MANV = DG.MANV
                WHERE NV.MANV = :manv
                GROUP BY NV.MANV";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':manv', $manv, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByFilter($chuyenmon, $diem_min) {
        $sql = "SELECT NV.*, 
                       ROUND(AVG(DG.SOSAO), 1) AS DIEMTRUNGBINH
                FROM NHANVIEN NV
                LEFT JOIN DANHGIA DG ON NV.MANV = DG.MANV
                WHERE 1=1";

        if ($chuyenmon) {
            $sql .= " AND NV.CHUYENMON LIKE :chuyenmon";
        }

        $sql .= " GROUP BY NV.MANV
                  HAVING DIEMTRUNGBINH >= :diem_min OR DIEMTRUNGBINH IS NULL";

        $stmt = $this->conn->prepare($sql);

        if ($chuyenmon) {
            $chuyenmon = "%$chuyenmon%";
            $stmt->bindParam(':chuyenmon', $chuyenmon);
        }

        $stmt->bindParam(':diem_min', $diem_min);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
