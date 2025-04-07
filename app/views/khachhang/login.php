<?php require_once 'app/views/shares/header.php'; ?>

<div class="container" style="margin-top: 100px;">
    <h2 class="text-center mb-4">Đăng nhập</h2>
    
    <div id="alert-box" style="display: none;" class="alert alert-danger text-center"></div>

    <form id="login-form" class="mx-auto" style="max-width: 400px; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
        <div class="form-group">
            <label for="email">Email:</label>
            <input 
                type="email" 
                class="form-control" 
                id="email" 
                name="email" 
                required 
                placeholder="Nhập email của bạn"
                style="border-radius: 8px; box-shadow: inset 0 1px 5px rgba(0, 0, 0, 0.1);">
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input 
                type="password" 
                class="form-control" 
                id="password" 
                name="password" 
                required 
                placeholder="Nhập mật khẩu"
                style="border-radius: 8px; box-shadow: inset 0 1px 5px rgba(0, 0, 0, 0.1);">
        </div>

        <button type="submit" class="btn btn-primary btn-block" style="border-radius: 8px; background-color: #007bff; border: none; font-size: 16px; padding: 10px; transition: background-color 0.3s;">
            Đăng nhập
        </button>
    </form>
    
    <div class="text-center mt-3">
        <a href="/WebQuanLySpa/khachhang/register">Chưa có tài khoản? Đăng ký ngay</a>
    </div>
</div>

<script>
document.getElementById("login-form").addEventListener("submit", function(e) {
    e.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    fetch("/WebQuanLySpa/api/khachhang/login.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ EMAIL: email, MATKHAU: password })
    })
    .then(res => res.json())
    .then(res => {
        if (res.status === "success") {
            // Lưu token vào localStorage
            localStorage.setItem("token", res.token);

            // Chuyển sang trang hồ sơ (có thể dùng token để gọi get-profile)
            window.location.href = "/WebQuanLySpa/khachhang/profile";
        } else {
            showError(res.message);
        }
    })
    .catch(() => showError("Đăng nhập thất bại, vui lòng thử lại sau."));

    function showError(message) {
        const alertBox = document.getElementById("alert-box");
        alertBox.style.display = "block";
        alertBox.innerText = message;
    }
});
</script>

<?php require_once 'app/views/shares/footer.php'; ?>
