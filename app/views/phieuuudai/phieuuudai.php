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

    /* Phóng to ảnh popup */
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

<section style="background-color: #fff4ee; padding: 40px 10%;">
    <h1 style="font-size: 30px; font-weight: bold; margin-bottom: 10px;">PHIẾU ƯU ĐÃI</h1>
    <p style="color: #5e5e5e; margin-bottom: 30px;">
        Là một món quà tinh tế để trao tặng. Từ không gian cho đến dịch vụ ở Sả đều được chăm chút và thực hiện tỉ mỉ
        qua đôi tay của những kỹ thuật viên lành nghề.
        Các phiếu quà tặng đa dạng thiết kế, đủ đẹp và hữu ích để bạn có thể chọn lấy làm quà, mong rằng có thể góp phần
        cùng bạn bày tỏ tình cảm và sự chăm sóc đến những người thương quý.
    </p>
    <div class="branch-gallery">
    <a href="#modal1"><img src="public/uploads/phieuuudai1.png" alt="Ảnh Phiếu ưu đãi 1"></a>
    <a href="#modal2"><img src="public/uploads/phieuuudai2.png" alt="Ảnh Phiếu ưu đãi 2"></a>
    <a href="#modal3"><img src="public/uploads/phieuuudai3.png" alt="Ảnh Phiếu ưu đãi 3"></a>
</div>

<!-- Modal 1 -->
<div id="modal1" class="modal-img">
    <a href="#" class="modal-close">&times;</a>
    <img src="public/uploads/phieuuudai1.png" alt="Ảnh Phiếu ưu đãi 1 phóng to">
</div>

<!-- Modal 2 -->
<div id="modal2" class="modal-img">
    <a href="#" class="modal-close">&times;</a>
    <img src="public/uploads/phieuuudai2.png" alt="Ảnh Phiếu ưu đãi 2 phóng to">
</div>

<!-- Modal 3 -->
<div id="modal3" class="modal-img">
    <a href="#" class="modal-close">&times;</a>
    <img src="public/uploads/phieuuudai3.png" alt="Ảnh Phiếu ưu đãi 3 phóng to">
</div>
    <p style="color: #5e5e5e; margin-bottom: 30px;">
        Vui lòng chọn loại phiếu và điền thông tin vào biểu mẫu bên dưới. Sẽ sẽ liên lạc với bạn ngay nhé!
    </p>

    <!-- Loại phiếu -->
    <div style="margin-bottom: 20px;">
        <p style="font-weight: bold;">Loại Phiếu Ưu Đãi</p>
        <label style="margin-right: 20px;">
            <input type="radio" name="gift_type" checked>
            Phiếu quà tặng phong thư
        </label>
        <label>
            <input type="radio" name="gift_type">
            Phiếu quà tặng điện tử
        </label>
    </div>

    <!-- Form -->
    <form style="display: flex; flex-direction: column; gap: 20px;">

        <div style="display: flex; gap: 20px; flex-wrap: wrap;">
            <!-- Dịch vụ / Mệnh giá -->
            <select style="flex: 1; min-width: 250px; padding: 10px; border: 1px solid #511f35;">
                <option>Chọn dịch vụ</option>
                <option>Massage 4 tay</option>
                <option>Khoảnh khắc thư giãn</option>
                <option>Chăm sóc da mặt</option>
                <option>Massage cơ thể</option>
                <option>Chăm sóc chân</option>
                <option>Chăm sóc da toàn thân</option>
                <option>Thư giãn đặc biệt</option>
                <option>Bồng Lai Tiên Cảnh</option>
            </select>

            <!-- Màu phong thư -->
            <select style="flex: 1; min-width: 250px; padding: 10px; border: 1px solid #511f35;">
                <option>Chọn màu sắc của phong thư</option>
                <option>Màu da</option>
                <option>Màu hồng</option>
                <option>Màu xanh lá</option>
            </select>
        </div>

        <h2 style="font-size: 22px; color: #332621; margin-top: 20px;">Thông tin người mua</h2>

        <!-- Họ tên + SĐT -->
        <div style="display: flex; gap: 20px; flex-wrap: wrap;">
            <input type="text" placeholder="Họ và tên"
                style="flex: 1; min-width: 250px; padding: 10px; border: 1px solid #511f35;">
            <input type="text" placeholder="Số điện thoại"
                style="flex: 1; min-width: 250px; padding: 10px; border: 1px solid #511f35;">
        </div>

        <!-- Email -->
        <input type="email" placeholder="Email" style="width: 100%; padding: 10px; border: 1px solid #511f35;">

        <!-- Yêu cầu -->
        <textarea placeholder="Yêu cầu"
            style="width: 100%; height: 150px; padding: 10px; border: 1px solid #511f35;"></textarea>

        <!-- Button -->
        <div style="text-align: right;">
            <button type="submit"
                style="background-color: #511f35; color: white; padding: 10px 30px; border: none; border-radius: 4px; font-weight: bold;">
                MUA NGAY
            </button>
        </div>

    </form>
</section>

<?php require_once 'app/views/shares/footer.php'; ?>