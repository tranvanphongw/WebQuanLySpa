<?php require_once 'app/views/shares/header.php'; ?>

<style>
    .branch-section {
        padding: 60px 20px;
        text-align: center;
        background-color: #fff;
    }

    .branch-title {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #3c3c3c;
    }

    .branch-subtitle {
        font-size: 18px;
        color: #777;
        margin-bottom: 30px;
    }

    .branch-gallery {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
        margin-bottom: 30px;
    }

    .branch-gallery img {
        width: 200px;
        height: 130px;
        object-fit: cover;
        border-radius: 12px;
    }

    .branch-info {
        max-width: 800px;
        margin: 0 auto;
        font-size: 16px;
        line-height: 1.6;
        color: #444;
    }

    .branch-name {
        font-size: 20px;
        font-weight: bold;
        color: #222;
        margin: 20px 0 10px;
    }

    .branch-contact {
        margin: 10px 0;
        font-weight: 500;
    }

    .map-btn {
        margin-top: 15px;
        padding: 10px 20px;
        background-color: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        display: inline-block;
    }

    .map-btn:hover {
        background-color: #218838;
    }

    .modal-img {
        display: none;
        position: fixed;
        z-index: 999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        justify-content: center;
        align-items: center;
    }

    .modal-img img {
        max-width: 90%;
        max-height: 90%;
        border-radius: 10px;
        box-shadow: 0 0 20px #000;
    }

    .modal-img:target {
        display: flex;
    }

    .modal-close {
        position: absolute;
        top: 20px;
        right: 30px;
        font-size: 30px;
        color: white;
        text-decoration: none;
        font-weight: bold;
    }
</style>

<section class="branch-section">
    <h2 class="branch-title">Cơ sở</h2>
    <p class="branch-subtitle">Hãy tới những cơ sở dưới đây của chúng tôi để tận hưởng cuộc sống</p>

    <!-- Gallery 1 -->
    <div class="branch-gallery">
        <a href="#coso1"><img src="public/uploads/coso1.jpg" alt="Ảnh cơ sở 1"></a>
        <a href="#coso2"><img src="public/uploads/coso2.jpg" alt="Ảnh cơ sở 2"></a>
        <a href="#coso3"><img src="public/uploads/coso3.jpg" alt="Ảnh cơ sở 3"></a>
    </div>

    <!-- Modal ảnh 1–3 -->
    <div id="coso1" class="modal-img">
        <a href="#" class="modal-close">&times;</a>
        <img src="public/uploads/coso1.jpg" alt="Cơ sở 1 phóng to">
    </div>
    <div id="coso2" class="modal-img">
        <a href="#" class="modal-close">&times;</a>
        <img src="public/uploads/coso2.jpg" alt="Cơ sở 2 phóng to">
    </div>
    <div id="coso3" class="modal-img">
        <a href="#" class="modal-close">&times;</a>
        <img src="public/uploads/coso3.jpg" alt="Cơ sở 3 phóng to">
    </div>

    <!-- Thông tin -->
    <div class="branch-info">
        <h3 class="branch-name">📍Mayu Japanese Esthetic Spa District 1</h3>
        <p>
            Không gian thư giãn chuẩn Nhật giữa lòng Quận 1, nơi chăm sóc sắc đẹp và sức khỏe toàn diện.
            Với thiết kế tinh tế, dịch vụ chu đáo và liệu trình độc quyền, Mayu mang đến trải nghiệm làm đẹp đậm chất
            Nhật Bản.
            Hãy ghé thăm để cảm nhận sự khác biệt trong từng khoảnh khắc thư giãn.
        </p>

        <p class="branch-contact">📞 0923 066 866</p>

        <a class="map-btn" href="https://byvn.net/0RgW" target="_blank">
            Xem chỉ đường Google Maps
        </a>
    </div>
    <!-- Gallery 2 -->
    <div class="branch-gallery">
        <a href="#coso4"><img src="public/uploads/coso4.jpg" alt="Ảnh cơ sở 4"></a>
        <a href="#coso5"><img src="public/uploads/coso5.jpg" alt="Ảnh cơ sở 5"></a>
        <a href="#coso6"><img src="public/uploads/coso6.jpg" alt="Ảnh cơ sở 6"></a>
    </div>

    <!-- Modal ảnh 4–6 -->
    <div id="coso4" class="modal-img">
        <a href="#" class="modal-close">&times;</a>
        <img src="public/uploads/coso4.jpg" alt="Cơ sở 4 phóng to">
    </div>
    <div id="coso5" class="modal-img">
        <a href="#" class="modal-close">&times;</a>
        <img src="public/uploads/coso5.jpg" alt="Cơ sở 5 phóng to">
    </div>
    <div id="coso6" class="modal-img">
        <a href="#" class="modal-close">&times;</a>
        <img src="public/uploads/coso6.jpg" alt="Cơ sở 6 phóng to">
    </div>
    <!-- Thông tin -->
    <div class="branch-info">
        <h3 class="branch-name">📍Mayu Japanese Esthetic Spa District 2</h3>
        <p>
            Điểm đến lý tưởng cho những ai yêu thích sự tinh tế và yên bình giữa lòng Thảo Điền.
            Không gian sang trọng, dịch vụ đẳng cấp cùng đội ngũ chuyên viên tận tâm mang lại trải nghiệm thư giãn trọn
            vẹn.
            Mayu cam kết chăm sóc sắc đẹp từ tâm, giúp bạn tìm lại sự cân bằng và năng lượng tích cực mỗi ngày.
        </p>

        <p class="branch-contact">📞 0923 061 117</p>

        <a class="map-btn" href="https://byvn.net/TT7N" target="_blank">
            Xem chỉ đường Google Maps
        </a>
    </div>
</section>

<?php require_once 'app/views/shares/footer.php'; ?>