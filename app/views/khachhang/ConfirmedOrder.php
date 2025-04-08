<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đặt lịch - Spa Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        .confirmation-container {
            max-width: 700px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .success-icon {
            font-size: 80px;
            color: #28a745;
            margin-bottom: 20px;
        }

        .appointment-details {
            margin-top: 30px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .appointment-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #dee2e6;
        }

        .appointment-item:last-child {
            border-bottom: none;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
        }

        .btn-outline-secondary {
            padding: 10px 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="confirmation-container">
            <?php if (isset($successMessage)): ?>
                <div class="text-center">
                    <div class="success-icon">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <h2 class="mb-4">Đặt lịch thành công!</h2>
                    <p class="lead">Cảm ơn bạn đã đặt lịch tại Spa của chúng tôi.</p>

                    <div class="appointment-details">
                        <h5 class="mb-3">Chi tiết đặt lịch</h5>

                        <div class="appointment-item">
                            <strong>Ngày:</strong> <?php echo date('d/m/Y', strtotime($date)); ?>
                        </div>

                        <div class="appointment-item">
                            <strong>Thời gian:</strong> <?php echo $time; ?> (<?php echo $timeSlot; ?>)
                        </div>

                        <div class="appointment-item">
                            <strong>Dịch vụ:</strong> <?php echo $servicePackage; ?>
                        </div>

                        <?php if (!empty($customerNote)): ?>
                            <div class="appointment-item">
                                <strong>Ghi chú:</strong> <?php echo htmlspecialchars($customerNote); ?>
                            </div>
                        <?php endif; ?>

                        <div class="appointment-item">
                            <strong>Mã đặt lịch:</strong> #<?php echo $appointmentId; ?>
                        </div>
                    </div>

                    <p class="mt-4">Chúng tôi sẽ gửi thông tin xác nhận qua email và tin nhắn cho bạn.</p>

                    <div class="mt-4">
                        <a href="index.php" class="btn btn-outline-secondary me-2">Trở về trang chủ</a>
                        <a href="user-appointments.php" class="btn btn-primary">Xem lịch đặt của tôi</a>
                    </div>
                </div>
            <?php elseif (isset($errorMessage)): ?>
                <div class="text-center">
                    <div class="error-icon text-danger">
                        <i class="bi bi-exclamation-circle-fill"></i>
                    </div>
                    <h2 class="mb-4">Đã xảy ra lỗi</h2>
                    <p class="lead"><?php echo $errorMessage; ?></p>

                    <div class="mt-4">
                        <a href="datlich.php" class="btn btn-primary">Thử lại</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css"></script>
</body>

</html>