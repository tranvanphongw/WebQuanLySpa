<?php require_once 'app/views/shares/header.php'; ?>

<div class="container" style="margin-top: 100px;">
    <h2 class="text-center mb-4">Đăng ký</h2>

    <div id="alert-box" style="display: none;" class="alert alert-danger text-center"></div>

    <form id="register-form" class="mx-auto" style="max-width: 400px; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
        <div class="form-group">
            <label for="name">Họ và tên</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="form-control" 
                required 
                placeholder="Nhập họ tên"
                style="border-radius: 8px; box-shadow: inset 0 1px 5px rgba(0, 0, 0, 0.1);">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="form-control" 
                required 
                placeholder="Nhập email"
                style="border-radius: 8px; box-shadow: inset 0 1px 5px rgba(0, 0, 0, 0.1);">
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input 
                type="password" 
                name="password" 
                id="password" 
                class="form-control" 
                required 
                placeholder="Nhập mật khẩu"
                style="border-radius: 8px; box-shadow: inset 0 1px 5px rgba(0, 0, 0, 0.1);">
        </div>
        <div class="form-group">
            <label for="confirm_password">Xác nhận mật khẩu</label>
            <input 
                type="password" 
                name="confirm_password" 
                id="confirm_password" 
                class="form-control" 
                required 
                placeholder="Nhập lại mật khẩu"
                style="border-radius: 8px; box-shadow: inset 0 1px 5px rgba(0, 0, 0, 0.1);">
        </div>

        <button type="submit" class="btn btn-primary btn-block" style="border-radius: 8px; background-color: #007bff; border: none; font-size: 16px; padding: 10px; transition: background-color 0.3s;">
            Đăng ký
        </button>
    </form>

    <div class="text-center mt-3">
        <p>Đã có tài khoản? <a href="/WebQuanLySpa/khachhang/login">Đăng nhập</a></p>
    </div>
</div>

<script>
document.getElementById("register-form").addEventListener("submit", function(e) {
    e.preventDefault();

    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;
    const confirm = document.getElementById("confirm_password").value;

    const alertBox = document.getElementById("alert-box");
    alertBox.style.display = "none";

    if (password !== confirm) {
        showAlert("Mật khẩu xác nhận không khớp!", "danger");
        return;
    }

    fetch("/WebQuanLySpa/api/khachhang/register.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            TEN: name,
            EMAIL: email,
            MATKHAU: password
        })
    })
    .then(res => res.json())
    .then(res => {
        if (res.status === "success") {
            showAlert("Đăng ký thành công! Chuyển đến trang đăng nhập...", "success");
            setTimeout(() => {
                window.location.href = "/WebQuanLySpa/khachhang/login";
            }, 1500);
        } else {
            showAlert(res.message || "Đăng ký thất bại!", "danger");
        }
    })
    .catch(() => showAlert("Lỗi kết nối đến máy chủ!", "danger"));

    function showAlert(message, type) {
        alertBox.className = "alert alert-" + type;
        alertBox.innerText = message;
        alertBox.style.display = "block";
    }
});
</script>

<?php require_once 'app/views/shares/footer.php'; ?>
