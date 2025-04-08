<?php
class LichDatModel {
    private $conn;
    private $table = 'LICHDAT';

    // Các thuộc tính của lịch đặt
    public $makh;
    public $manv;
    public $madv;
    public $thoigianbatdau;
    public $thoigianketthuc;
    public $matrangthai;

    // Constructor
    public function __construct($makh, $manv, $madv, $thoigianbatdau, $thoigianketthuc, $matrangthai) {
        $this->conn = Database::getConnection();
        $this->makh = $makh;
        $this->manv = $manv;
        $this->madv = $madv;
        $this->thoigianbatdau = $thoigianbatdau;
        $this->thoigianketthuc = $thoigianketthuc;
        $this->matrangthai = $matrangthai;
    }

    // Phương thức tạo lịch đặt
    public function createLichDat() {
        $query = "INSERT INTO " . $this->table . " (MAKH, MANV, MADV, THOIGIANBATDAU, THOIGIANKETTHUC, MATRANGTHAI) 
                  VALUES (:MAKH, :MANV, :MADV, :THOIGIANBATDAU, :THOIGIANKETTHUC, :MATRANGTHAI)";

        $stmt = $this->conn->prepare($query);

        // Bind các tham số
        $stmt->bindParam(':MAKH', $this->makh);
        $stmt->bindParam(':MANV', $this->manv);
        $stmt->bindParam(':MADV', $this->madv);
        $stmt->bindParam(':THOIGIANBATDAU', $this->thoigianbatdau);
        $stmt->bindParam(':THOIGIANKETTHUC', $this->thoigianketthuc);
        $stmt->bindParam(':MATRANGTHAI', $this->matrangthai);

        // Thực thi truy vấn
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
