<?php require_once 'app/views/shares/header.php'; ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh Toán Dịch Vụ | Spa Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Thanh Toán Dịch Vụ</h2>

    <form id="paymentForm">
        <div class="form-group">
            <label for="malich">Mã lịch</label>
            <input type="number" class="form-control" id="malich" name="malich" required>
        </div>

        <div class="form-group">
            <label for="makh">Mã khách hàng</label>
            <input type="number" class="form-control" id="makh" name="makh" required>
        </div>

        <div class="form-group">
            <label for="sotien">Số tiền thanh toán (VNĐ)</label>
            <input type="number" class="form-control" id="sotien" name="sotien" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="ngaythanhtoan">Ngày thanh toán</label>
            <input type="datetime-local" class="form-control" id="ngaythanhtoan" name="ngaythanhtoan" required>
        </div>

        <div class="form-group">
            <label for="hinhthucthanhtoan">Phương thức thanh toán</label>
            <select class="form-control" id="hinhthucthanhtoan" name="hinhthucthanhtoan">
                <option value="Tiền mặt">Tiền mặt</option>
                <option value="Chuyển khoản">Chuyển khoản</option>
                <option value="Online">Online</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Thanh toán</button>
    </form>

    <div id="paymentResponse" class="mt-3"></div>


</div>

<script>
    function loadPaymentList() {
        $.ajax({
            url: '/WebQuanLySpa/api/thanhtoan/list-thanhtoan.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    let rows = '';
                    response.data.forEach(function(item) {
                        rows += `<tr>
                            <td>${item.TEN}</td>
                            <td>${item.MALICH}</td>
                            <td>${item.SOTIEN}</td>
                            <td>${item.NGAYTHANHTOAN}</td>
                            <td>${item.HINHTHUCTHANHTOAN}</td>
                        </tr>`;
                    });
                    $('#paymentList tbody').html(rows);
                } else {
                    $('#paymentList tbody').html('<tr><td colspan="5">Không có dữ liệu</td></tr>');
                }
            },
            error: function() {
                $('#paymentList tbody').html('<tr><td colspan="5">Lỗi khi tải danh sách thanh toán</td></tr>');
            }
        });
    }

            $("#paymentForm").submit(function(e) {
                e.preventDefault();

                let paymentData = $(this).serializeArray();
                let data = {};
                paymentData.forEach(function(field) {
                    data[field.name] = field.value;
                });

                $.ajax({
                    url: '/WebQuanLySpa/api/thanhtoan/create-thanhtoan.php',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(data),
                    dataType: 'json',
                    success: function(response) {
                        $("#paymentResponse").html('<div class="alert alert-' + (response.status === 'success' ? 'success' : 'danger') + '">' + response.message + '</div>');
                        if (response.status === 'success') {
                            $('#paymentForm')[0].reset();
                            loadPaymentList();
                        }
                    },
                    error: function() {
                        $("#paymentResponse").html('<div class="alert alert-danger">Thanh toán thất bại. Vui lòng thử lại.</div>');
                    }
        });
    });

    $(document).ready(function() {
        loadPaymentList();
    });
</script>
</body>
</html> 