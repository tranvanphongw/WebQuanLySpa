<?php require_once 'app/views/shares/header.php'; ?>

<div class="container" style="margin-top: 50px;">
    <h2>Hồ sơ của bạn</h2>

    <div id="profile-card" class="card" style="display: none;">
        <div class="card-body">
            <p><strong>ID Khách hàng:</strong> <span id="makh"></span></p>
            <p><strong>Tên:</strong> <span id="ten"></span></p>
            <p><strong>Email:</strong> <span id="email"></span></p>

            <a href="/WebQuanLySpa/khachhang/editProfile" class="btn btn-primary">Chỉnh sửa hồ sơ</a>
        </div>
    </div>

    <div id="alert-error" class="alert alert-danger" style="display: none;"></div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const token = localStorage.getItem("token");

    if (!token) {
        showError("Bạn chưa đăng nhập!");
        return;
    }

    fetch("/WebQuanLySpa/api/khachhang/get-profile.php", {
        headers: {
            Authorization: "Bearer " + token
        }
    })
    .then(res => res.json())
    .then(res => {
        if (res.status === "success") {
            const { MAKH, TEN, EMAIL } = res.data;
            document.getElementById("makh").innerText = MAKH;
            document.getElementById("ten").innerText = TEN;
            document.getElementById("email").innerText = EMAIL;
            document.getElementById("profile-card").style.display = "block";
        } else {
            showError(res.message || "Không thể tải hồ sơ.");
        }
    })
    .catch(() => {
        showError("Không thể kết nối đến máy chủ.");
    });

    function showError(message) {
        const alertBox = document.getElementById("alert-error");
        alertBox.innerText = message;
        alertBox.style.display = "block";
    }
});
</script>

<?php require_once 'app/views/shares/footer.php'; ?>
