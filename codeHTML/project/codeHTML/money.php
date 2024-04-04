<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="codeCSS/money.css">
</head>
<body>
    <header>
        <h1>ชำระเงิน</h1>
        <div style="display: flex;">
            <i class="bi bi-house-door" style="font-size: 30px; margin-right: 10px;" onclick="window.location.href='tap.html'"></i>
        </div>
        <div class="clockTime">
            <div id="clock"></div>
        </div>
    </header>
    <center>
    <p><i class="bi bi-cash" style="font-size: 200px; color:#028940"></i></p>
    </center>
    <script>
        var selectedButton = null;

        function selectButton(button) {
            if (selectedButton) {
                selectedButton.classList.remove('selected');
            }
            button.classList.add('selected');
            selectedButton = button;
        }

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
