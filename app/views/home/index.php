<?php require_once 'app/views/shares/header.php'; ?>

<style>
    body {
        background-color: rgb(182, 156, 130);
        font-family: 'Segoe UI', sans-serif;
        color: #3b2e2e;
    }

    h1,
    h2,
    h5 {
        color: #3b1f1f;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-weight: bold;
        color: #7a5047;
    }

    .card-text {
        color: #5a4c3b;
    }

    .btn-primary {
        background-color: #a37e58;
        border: none;
    }

    .btn-primary:hover {
        background-color: #8e6c4d;
    }

    .carousel-inner {
        border-radius: 12px;
        overflow: hidden;
    }

    .container {
        padding-top: 30px;
        padding-bottom: 60px;
    }
</style>

<div class="container">
    <h1 class="text-center mb-4">..........<strong>.........</strong></h1>

    <h1 class="text-center mb-3">Chào mừng đến với <strong>SpaManagement</strong></h1>
    <p class="text-center mb-5">
        Chúng tôi cung cấp các dịch vụ chăm sóc sắc đẹp và sức khỏe hàng đầu.
        Hãy đến với chúng tôi để trải nghiệm những dịch vụ tốt nhất cho bạn.
    </p>

    <!-- Ảnh Banner -->
    <div id="bannerCarousel" class="carousel slide mb-5" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="public/uploads/spa-banner.jpg" class="d-block w-100" alt="Banner Spa 1"
                    style="max-height: 400px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="public/uploads/spa-banner1.jpg" class="d-block w-100" alt="Banner Spa 2"
                    style="max-height: 400px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="public/uploads/spa-banner2.jpg" class="d-block w-100" alt="Banner Spa 3"
                    style="max-height: 400px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="public/uploads/spa-banner3.jpg" class="d-block w-100" alt="Banner Spa 4"
                    style="max-height: 400px; object-fit: cover;">
            </div>
        </div>
        <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Trước</span>
        </a>
        <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Sau</span>
        </a>
    </div>

    <!-- Carousel Dịch vụ -->
    <div id="serviceCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-flex justify-content-center gap-4">
                    <div class="card mx-2" style="width: 18rem;">
                        <img src="public/uploads/massage_thai_co_truyen.jpg" class="card-img-top" alt="Dịch vụ 1">
                        <div class="card-body">
                            <h5 class="card-title">Massage Cổ Truyền</h5>
                            <p class="card-text">Thư giãn cơ thể, giảm mệt mỏi và tăng cường tuần hoàn máu.</p>
                        </div>
                    </div>
                    <div class="card mx-2" style="width: 18rem;">
                        <img src="public/uploads/xonghoi.jpg" class="card-img-top" alt="Dịch vụ 2">
                        <div class="card-body">
                            <h5 class="card-title">Xông Hơi Thư Giãn</h5>
                            <p class="card-text">Xông hơi giúp thanh lọc cơ thể, giải tỏa stress và thư giãn tối đa.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="d-flex justify-content-center gap-4">
                    <div class="card mx-2" style="width: 18rem;">
                        <img src="public/uploads/cham_soc_da_mat.jpg" class="card-img-top" alt="Dịch vụ 3">
                        <div class="card-body">
                            <h5 class="card-title">Chăm sóc da mặt</h5>
                            <p class="card-text">Dưỡng ẩm, làm sạch sâu và phục hồi làn da tươi trẻ, rạng rỡ.</p>
                        </div>
                    </div>
                    <div class="card mx-2" style="width: 18rem;">
                        <img src="public/uploads/service1.jpg" class="card-img-top" alt="Dịch vụ 4">
                        <div class="card-body">
                            <h5 class="card-title">Gội đầu dưỡng sinh</h5>
                            <p class="card-text">Giảm căng thẳng, thư giãn và kích thích tuần hoàn máu da đầu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#serviceCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Trước</span>
        </a>
        <a class="carousel-control-next" href="#serviceCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Sau</span>
        </a>
    </div>
</div>

<?php require_once 'app/views/shares/footer.php'; ?>