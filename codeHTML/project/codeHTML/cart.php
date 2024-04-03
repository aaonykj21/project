<!DOCTYPE HTML>
<html lang="th">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="codeCSS/cart.css">
</head>

<body>
  <header>
    <h1>ตะกร้า</h1>
    <div class="clockTime">
      <div id="clock"></div>
  </div>
  </header>
  <summary>
    <div class="summary-font">
      <h3>สรุปออเดอร์</h3>
      <p>ยอดรวม</p>
      <div class="button_summary" id="paymentButton">
        <div class="button-font">
          <p>ชำระเงิน
            <i class="bi bi-arrow-right-short" style="margin-left: 10px;"></i>
          </p>
        </div>
      </div>
      <div class="button_again" onclick="window.location.href='page1.php'">
        <div class="button-font">
          <p>สั่งออเดอร์</p>
        </div>
      </div>
    </div>
  </summary>
  <div id="overlayContent" class="overlay-content" style="display: none;">
    <div id="paymentText" >Payment</div>
    <button class="close-button" id="closeButton" style="display: none;">
      <i class="bi bi-x-lg"></i>
  </button>
  <script>
     document.getElementById('paymentButton').addEventListener('click', function () {
      var overlay = document.createElement('div');
      overlay.classList.add('overlay');
      document.body.appendChild(overlay);

      var overlayContent = document.createElement('div');
      overlayContent.classList.add('overlay-content');
      overlay.appendChild(overlayContent);

      var paymentText = document.createElement('p');
      paymentText.innerText = 'Payment';
      overlayContent.appendChild(paymentText);

      var closeButton = document.createElement('button');
      closeButton.classList.add('close-button');
      closeButton.innerHTML = '<i class="bi bi-x-lg"></i>'; // ใช้ไอคอนของ Bootstrap Icons
      overlayContent.appendChild(closeButton);

      overlay.addEventListener('click', function () {
        document.body.removeChild(overlay);
      });

      closeButton.addEventListener('click', function () {
        document.body.removeChild(overlay);
      });
    });
    function updateClock() {
  var now = new Date();
  var hours = now.getHours();
  var minutes = now.getMinutes();
  var seconds = now.getSeconds();

  hours = hours < 10 ? '0' + hours : hours;
  minutes = minutes < 10 ? '0' + minutes : minutes;
  seconds = seconds < 10 ? '0' + seconds : seconds;

  var timeString = hours + ':' + minutes + ':' + seconds;
  document.getElementById('clock').innerHTML = timeString;
}

setInterval(updateClock, 1000); // อัพเดทเวลาทุกๆ 1 วินาที
updateClock(); // เรียกใช้ฟังก์ชันเพื่อแสดงเวลาครั้งแรกทันทีเมื่อหน้าเว็บโหลด

  </script>
</body>

</html>
