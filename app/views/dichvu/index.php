<?php require_once 'app/views/shares/header.php'; ?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Gói Dịch Vụ Spa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">
  <div class="container px-4 py-5">
    <div class="row g-4">
      <!-- Sidebar -->
      <aside class="col-md-3">
        <h2 class="h5 fw-bold text-warning mb-4">TREATMENT</h2>
        <ul class="list-unstyled">
          <li><button class="btn btn-link text-dark text-decoration-none" onclick="showTab('goi-dac-biet')">GÓI ĐẶC BIỆT</button></li>
          <li><button class="btn btn-link text-dark text-decoration-none" onclick="showTab('massage-4-tay')">Massage 4 tay</button></li>
          <li><button class="btn btn-link text-dark text-decoration-none" onclick="showTab('thu-gian')">Khoảnh khắc thư giãn</button></li>
          <li><button class="btn btn-link text-dark text-decoration-none" onclick="showTab('cham-soc-da')">Chăm sóc da mặt</button></li>
          <li><button class="btn btn-link text-dark text-decoration-none" onclick="showTab('massage-co-the')">Massage cơ thể</button></li>
          <li><button class="btn btn-link text-dark text-decoration-none" onclick="showTab('cham-soc-chan')">Chăm sóc chân</button></li>
          <li><button class="btn btn-link text-dark text-decoration-none" onclick="showTab('da-toan-than')">Chăm sóc da toàn thân</button></li>
          <li><button class="btn btn-link text-dark text-decoration-none" onclick="showTab('thu-gian-dac-biet')">Thư giãn đặc biệt</button></li>
          <li><button class="btn btn-link text-dark text-decoration-none" onclick="showTab('la-siesta')">Bồng Lai Tiên Cảnh</button></li>
        </ul>
      </aside>

      <!-- Main Content Tabs -->
      <section class="col-md-9">
        <div id="goi-dac-biet" class="tab-content">
          <div class="list-group">
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">1. Gói Thư Giãn Cao Cấp – 90’</h3>
              <ul class="list-group list-group-flush mb-1">
                <li class="list-group-item border-0 px-0">Massage đá nóng toàn thân (60')</li>
                <li class="list-group-item border-0 px-0">Chăm sóc da mặt cơ bản (30')</li>
              </ul>
              <p class="text-end fw-bold text-warning">1.460.000 VNĐ</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">2. Gói Mây Mộng – 90’</h3>
              <ul class="list-group list-group-flush mb-1">
                <li class="list-group-item border-0 px-0">Massage đá nóng toàn thân (60')</li>
                <li class="list-group-item border-0 px-0">Chăm sóc chân (30')</li>
              </ul>
              <p class="text-end fw-bold text-warning">1.460.000 VNĐ</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">3. Gói Tái Tạo Năng Lượng – 2 giờ 15’</h3>
              <p class="small mb-2">Liệu trình chăm sóc da mặt và chân giúp loại bỏ độc tố, tái tạo năng lượng và làm dịu tinh thần.</p>
              <ul class="list-group list-group-flush mb-1">
                <li class="list-group-item border-0 px-0">Chăm sóc bàn chân toàn diện (75')</li>
                <li class="list-group-item border-0 px-0">Chăm sóc nâng cơ mặt (60')</li>
              </ul>
              <p class="text-end fw-bold text-warning">2.105.000 VNĐ</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">4. Gói Ngày An Lành – 4 giờ 05’</h3>
              <p class="small mb-2">Gói dịch vụ toàn diện gồm 5 liệu trình từ xông hơi, massage, đến làm đẹp chuyên sâu.</p>
              <ul class="list-group list-group-flush mb-1">
                <li class="list-group-item border-0 px-0">Xông hơi (20')</li>
                <li class="list-group-item border-0 px-0">Chăm sóc chân (30')</li>
                <li class="list-group-item border-0 px-0">Liệu pháp thư giãn (90')</li>
                <li class="list-group-item border-0 px-0">Tẩy tế bào chết toàn thân (45')</li>
                <li class="list-group-item border-0 px-0">Làm đẹp da mặt chuyên sâu (60')</li>
              </ul>
              <p class="text-end fw-bold text-warning">4.070.000 VNĐ</p>
            </div>
          </div>
        </div>

        <div id="massage-4-tay" class="tab-content d-none">
          <div class="list-group">
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">Massage Bốn Tay – 60'</h3>
              <p class="small mb-4">Một liệu pháp thư giãn xa xỉ cho cơ thể bạn. Hai chuyên gia trị liệu, bốn bàn tay, 10 ngón tay thực hiện các chuyển động đồng bộ được biên đạo, áp dụng cảm giác chạm vào da, mang lại sự thư giãn hoàn toàn. Cơ thể rơi vào trạng thái nghỉ ngơi tối ưu, giải tỏa các cơn đau nhức và căng cơ, cải thiện lưu thông máu, giảm căng thẳng và lo lắng, và dẫn đến cải thiện toàn diện tâm trạng. Đây là liệu pháp mạnh mẽ, đặc biệt phù hợp nếu bạn thấy khó buông bỏ trong quá trình trị liệu spa. Đội ngũ đã hoàn thiện kỹ thuật khiến liệu pháp massage bốn tay của chúng tôi trở nên đặc biệt.</p>
              <p class="text-end fw-bold text-warning">1.845.000 VNĐ</p>
            </div>
          </div>
        </div>

        <div id="thu-gian" class="tab-content d-none">
          <div class="list-group">
            <div class="list-group-item py-4">
              <h5 class="big mb-3">Nếu thời gian của bạn có hạn, chúng tôi có một số liệu trình ngắn giúp bạn tận dụng tối đa thời gian của mình.</h3>
              <p class="big mb-3">Chọn liệu trình phù hợp nhất với bạn:</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">1. Massage đầu, cổ, lưng & vai - 45'</h3>
              <p class="text-end fw-bold text-warning">740.000 VNĐ</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">2. Massage tay, đầu, cổ & vai - 30'</h3>
              <p class="text-end fw-bold text-warning">465.000 VNĐ</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">3. Massage chân - 30'</h3>
              <p class="text-end fw-bold text-warning">465.000 VNĐ</p>
            </div>
          </div>
        </div>

        <div id="cham-soc-da" class="tab-content d-none">
          <div class="list-group">
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">1. Chăm sóc da mặt cơ bản - 45'</h3>
              <p class="small mb-2">Liệu pháp chăm sóc da mặt phục hồi bao gồm làm sạch sâu, tẩy tế bào chết, massage mặt nhẹ nhàng và cuối cùng là liệu pháp dưỡng ẩm bằng các sản phẩm chăm sóc da tốt nhất giúp làn da của bạn được tươi mới và nuôi dưỡng.</p>
              <p class="text-end fw-bold text-warning">740.000 VNĐ</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">2. Giấc mơ làn da tự nhiên - 60'</h3>
              <p class="small mb-2">Liệu pháp chăm sóc da mặt này được mô tả như một trải nghiệm thực sự. Sử dụng mặt nạ sữa chua tự nhiên, liệu pháp chăm sóc da mặt toàn diện này giúp làm sạch, làm dịu, nuôi dưỡng và cân bằng làn da, giúp da rạng rỡ và tươi sáng.</p>
              <p class="text-end fw-bold text-warning">1.000.000 VNĐ</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">3. Vẻ đẹp mềm mại - 60'</h3>
              <p class="small mb-2">Bắt đầu bằng việc làm sạch da và massage, sau đó đắp mặt nạ kem mỏng, mịn, mượt. Massage đầu kích thích các dây thần kinh và mạch máu bên dưới da đồng thời làm dịu căng cơ. Sau đó, mặt nạ kem được gỡ bỏ và khuôn mặt của bạn được dưỡng ẩm, giúp da mềm mại và mịn màng như lụa.</p>
              <p class="text-end fw-bold text-warning">1.175.000 VNĐ</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">4. Nâng lông vũ - 60'</h3>
              <p class="small mb-2">Trải nghiệm sự thư giãn hoàn toàn với kỹ thuật căng da mặt thủ công của Việt Nam. Sau đó, mặt nạ đất sét được đắp lên để hút dầu thừa từ lỗ chân lông trong khi vẫn giữ được độ ẩm và độ ẩm. Phương pháp điều trị da mặt này được thiết kế để giúp làn da của bạn trở nên nhẹ như lông vũ.</p>
              <p class="text-end fw-bold text-warning">1.175.000 VNĐ</p>
            </div>
          </div>
        </div>

        <div id="massage-co-the" class="tab-content d-none">
          <div class="list-group">
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">1. Liệu pháp thư giãn - 60' / 90'</h3>
              <p class="small mb-2">Áp dụng các kỹ thuật massage nhẹ nhàng với tinh dầu thơm địa phương, mục đích là để loại bỏ căng thẳng tổng thể, làm dịu các khớp bị sưng hoặc đau và cân bằng cảm xúc.</p>
              <p class="text-end fw-bold text-warning">930.000 VNĐ / 1.280.000 VNĐ</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">2. Liệu pháp giảm căng thẳng - 60' / 90'</h3>
              <p class="small mb-2">Sử dụng các kỹ thuật massage mạnh kết hợp với tinh dầu, phương pháp điều trị này nhắm vào các nhóm cơ chính để giảm đau nhức. Các chuyển động nhịp nhàng, êm ái cũng giúp cải thiện lưu thông máu và kích thích cảm giác khỏe mạnh và cân bằng tổng thể.</p>
              <p class="text-end fw-bold text-warning">1.000.000 VNĐ / 1.330.000 VNĐ</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">3. Massage đá nóng - 60' / 90'</h3>
              <p class="small mb-2">Massage đá nóng giúp xua tan căng thẳng và mệt mỏi thông qua việc sử dụng những viên đá mịn ấm áp đặt lên các vùng chính của cơ thể để làm nóng cơ, thúc đẩy cảm giác thư thái, khỏe mạnh và bình tĩnh.</p>
              <p class="text-end fw-bold text-warning">1.105.000 VNĐ / 1.460.000 VNĐ</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">4. Massage đá muối Himalaya - 60' / 90'</h3>
              <p class="small mb-2">Liệu pháp đặc biệt này sử dụng hỗn hợp tinh dầu nguyên chất và tinh thể đá muối tự nhiên được hình thành cách đây 250 triệu năm ở vùng biển cổ đại bên dưới dãy núi Himalaya. Kỹ thuật massage chữa bệnh kết hợp với đá muối ấm giúp cân bằng hệ thần kinh trung ương...</p>
              <p class="text-end fw-bold text-warning">1.145.000 VNĐ / 1.550.000 VNĐ</p>
            </div>
          </div>
        </div>

        <div id="cham-soc-chan" class="tab-content d-none">
          <div class="list-group">
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">1. Liệu pháp chân bằng tinh dầu - 60'</h3>
              <p class="small mb-2">Trải nghiệm quá trình chữa lành và khỏe mạnh toàn diện khi chuyên gia trị liệu tập trung vào các điểm áp lực ở bàn chân của bạn thông qua massage mô sâu bằng tinh dầu...</p>
              <p class="text-end fw-bold text-warning">840.000 VNĐ</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">2. Chữa bệnh chân - 60'</h3>
              <p class="small mb-2">Massage chân bằng đá nóng áp vào chân và bàn chân. Bàn chân thường phải chịu nhiều nhiệt và sự kết hợp giữa massage áp lực với hơi ấm của đá nóng mang lại cảm giác thư giãn...</p>
              <p class="text-end fw-bold text-warning">885.000 VNĐ</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">3. Trị liệu toàn bộ bàn chân - 75'</h3>
              <p class="small mb-2">Một gói chăm sóc toàn diện và là liệu pháp tuyệt vời cho đôi chân. Liệu pháp này kết hợp massage chân tập trung vào các điểm áp lực với tẩy tế bào chết khô và ướt...</p>
              <p class="text-end fw-bold text-warning">1.055.000 VNĐ</p>
            </div>
          </div>
        </div>

        <div id="da-toan-than" class="tab-content d-none">
          <div class="list-group">
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">1. Tẩy tế bào chết toàn thân - 45'</h3>
              <p class="small mb-2">Tẩy tế bào chết dưỡng ẩm toàn thân của cung cấp liệu pháp làm sạch sâu và tẩy tế bào chết. Các tế bào da chết được loại bỏ trong khi thúc đẩy sự phát triển của các tế bào mới khỏe mạnh...</p>
              <p class="text-end fw-bold text-warning">1.000.000 VNĐ</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">2. Quấn cơ thể bùn và sữa - 45'</h3>
              <p class="small mb-2">Tận dụng sức mạnh của vitamin và khoáng chất tự nhiên, liệu pháp quấn cơ thể này giúp cải thiện vẻ ngoài và cảm giác của làn da...</p>
              <p class="text-end fw-bold text-warning">1.000.000 VNĐ</p>
            </div>
          </div>
        </div>

        <div id="thu-gian-dac-biet" class="tab-content d-none">
          <div class="list-group">
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">Phòng xông hơi - 20'</h3>
              <p class="small mb-2">Dịch vụ xông hơi thư giãn giúp cơ thể loại bỏ độc tố, giảm căng thẳng và thư giãn hoàn toàn...</p>
              <p class="text-end fw-bold text-warning">225.000 VNĐ</p>
              <p class="small text-muted mt-2">(Chi nhánh Spa: Hàng Bè, Mã Mây)</p>
            </div>
          </div>
        </div>

        <div id="la-siesta" class="tab-content d-none">
          <div class="list-group">
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">1. Gói Rừng – 2 giờ 00’</h3>
              <p class="small mb-2">Lấy cảm hứng từ thiên nhiên Việt Nam, sử dụng các sản phẩm hữu cơ từ rừng, chăm sóc từ đầu đến chân.</p>
              <ul class="list-group list-group-flush mb-1">
                <li class="list-group-item border-0 px-0">Tẩy tế bào chết toàn thân (45')</li>
                <li class="list-group-item border-0 px-0">Massage chân (30')</li>
                <li class="list-group-item border-0 px-0">Chăm sóc da mặt cơ bản (45')</li>
              </ul>
              <p class="text-end fw-bold text-warning">2.095.000 VNĐ</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">2. Gói Đại Dương – 2 giờ 45’</h3>
              <p class="small mb-2">Sử dụng muối biển khoáng chất và đá muối Himalaya giúp thanh lọc cơ thể và dưỡng da chuyên sâu.</p>
              <ul class="list-group list-group-flush mb-1">
                <li class="list-group-item border-0 px-0">Massage đá muối Himalaya (60')</li>
                <li class="list-group-item border-0 px-0">Tẩy tế bào chết toàn thân (45')</li>
                <li class="list-group-item border-0 px-0">Giấc mơ làn da tự nhiên (60')</li>
              </ul>
              <p class="text-end fw-bold text-warning">3.085.000 VNĐ</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">3. Gói Trái Đất – 3 giờ 20’</h3>
              <p class="small mb-2">Kết hợp thảo mộc, tinh dầu, bùn khoáng giúp thư giãn, làm sạch và tái tạo làn da.</p>
              <ul class="list-group list-group-flush mb-1">
                <li class="list-group-item border-0 px-0">Phòng xông hơi (20')</li>
                <li class="list-group-item border-0 px-0">Massage giảm căng thẳng (90')</li>
                <li class="list-group-item border-0 px-0">Tẩy tế bào chết toàn thân (45')</li>
                <li class="list-group-item border-0 px-0">Quấn cơ thể bằng bùn và sữa (45')</li>
              </ul>
              <p class="text-end fw-bold text-warning">3.430.000 VNĐ</p>
            </div>
            <div class="list-group-item py-4">
              <h3 class="h5 fw-bold text-warning mb-2">4. Gói Bầu Trời – 3 giờ 35’</h3>
              <p class="small mb-2">Liệu trình mang đến cảm giác thư thái như trên mây với các bước chăm sóc toàn thân chuyên sâu.</p>
              <ul class="list-group list-group-flush mb-1">
                <li class="list-group-item border-0 px-0">Phòng xông hơi (20')</li>
                <li class="list-group-item border-0 px-0">Massage toàn thân bằng đá nóng (60')</li>
                <li class="list-group-item border-0 px-0">Trị liệu toàn bộ bàn chân (75')</li>
                <li class="list-group-item border-0 px-0">Nâng Lông Vũ (60')</li>
              </ul>
              <p class="text-end fw-bold text-warning">3.455.000 VNĐ</p>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <script>
    function showTab(id) {
      document.querySelectorAll('.tab-content').forEach(el => el.classList.add('d-none'));
      document.getElementById(id).classList.remove('d-none');
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>

<?php require_once 'app/views/shares/footer.php'; ?>