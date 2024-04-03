<!DOCTYPE HTML>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <style>
        td {
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="codeCSS/sum_order.css">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
</head>
<body>
    <header>
        <h1>คำสั่งซื้อ</h1>
        <div>
            <i class="bi bi-house-door" style="font-size: 30px; margin-right: 10px;" onclick="window.location.href='tap.html'"></i>
            <i class="bi bi-basket" style="font-size: 30px;" onclick="window.location.href='cart.php'"></i>
        </div>
        <div class="clockTime">
            <div id="clock"></div>
        </div>
    </header><br>
    <div class="button-next-1">
        <div class="button-page" onclick="window.location.href='page1.php'">
            <i class="bi bi-1-circle-fill"></i>
        </div>
        <div class="button-page" onclick="window.location.href='page2.php'">
            <i class="bi bi-2-circle-fill"></i>
        </div>
        <div class="button-page" onclick="window.location.href='page3.php'">
            <i class="bi bi-3-circle-fill"></i>
        </div>
        <div class="button-page" onclick="window.location.href='page4.php'">
            <i class="bi bi-4-circle-fill"></i>
        </div>
        <div class="button-page" onclick="window.location.href='page5.php'">
            <i class="bi bi-5-circle-fill"></i>
        </div>
        <div class="button-page" onclick="window.location.href='sum_order.php'">
            <i class="bi bi-6-circle-fill"></i>
        </div>
    </div>
    <br>
    <div id="selected-items">
        <ul id="selected-list"></ul>
    </div>
    <div class="footer" style="display: flex; justify-content: space-between; align-items: center;">
        <h2>ราคา</h2>
        <i class="bi bi-download" style="font-size: 50px; margin-left: 970px;color: black;"></i>
        <div class="button" onclick="addToCart()">
            <h3 style="color: black; margin-right: 30px">เพิ่มสินค้าลงในตะกร้า</h3>
        </div>
    </div>

    <script>
        window.addEventListener('load', () => {
            const selectedBread = JSON.parse(localStorage.getItem('selectedBread')) || [];
            const selectedMeats = JSON.parse(localStorage.getItem('selectedMeats')) || [];
            const selectedVegetable = JSON.parse(localStorage.getItem('selectedVegetable')) || [];
            const selectedSauce = JSON.parse(localStorage.getItem('selectedSauce')) || [];
            const selectedTopping = JSON.parse(localStorage.getItem('selectedTopping')) || [];
            const selectedList = document.getElementById('selected-list');
            let breadText = '';
            let meatsText = '';
            let vegetableText = '';
            let sauceText = '';
            let ToppingText = '';

            selectedBread.forEach((bread, index) => {
                breadText += `${bread}`;
                if (index !== selectedBread.length - 1) {
                    breadText += ', ';
                }
            });

            selectedMeats.forEach((meat, index) => {
                meatsText += `${meat}`;
                if (index !== selectedMeats.length - 1) {
                    meatsText += ', ';
                }
            });

            selectedVegetable.forEach((vegetable, index) => {
                vegetableText += `${vegetable}`;
                if (index !== selectedVegetable.length - 1) {
                    vegetableText += ', ';
                }
            });

            selectedSauce.forEach((sauce, index) => {
                sauceText += `${sauce}`;
                if (index !== selectedSauce.length - 1) {
                    sauceText += ', ';
                }
            });

            selectedTopping.forEach((topping, index) => {
                ToppingText += `${topping}`;
                if (index !== selectedTopping.length - 1) {
                    ToppingText += ', ';
                }
            });

            selectedList.innerHTML = `ขนมปังที่เลือก: ${breadText}<br><br><br><br> เนื้อสัตว์ที่เลือก: ${meatsText}<br><br><br><br>
        ผักที่เลือก: ${vegetableText}<br><br><br><br>ซอสที่ที่เลือก: ${sauceText}<br><br><br><br>ท็อปปิ้งที่ที่เลือก: ${ToppingText}<br>`;

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
        });

        function addToCart() {
    const order = {
        breads: JSON.parse(localStorage.getItem('selectedBread')) || [],
        meats: JSON.parse(localStorage.getItem('selectedMeats')) || [],
        vegetables: JSON.parse(localStorage.getItem('selectedVegetable')) || [],
        sauces: JSON.parse(localStorage.getItem('selectedSauce')) || [],
        toppings: JSON.parse(localStorage.getItem('selectedTopping')) || []
    };

    let orders = JSON.parse(localStorage.getItem('orders')) || [];
    orders.push(order);
    localStorage.setItem('orders', JSON.stringify(orders));

    // ล้างสถานะการเลือกใน localStorage
    localStorage.removeItem('selectedBread');
    localStorage.removeItem('selectedMeats');
    localStorage.removeItem('selectedVegetable');
    localStorage.removeItem('selectedSauce');
    localStorage.removeItem('selectedTopping');

    // นำผู้ใช้ไปยังหน้าตะกร้าหลังจากเพิ่มสินค้าเรียบร้อย
    window.location.href = 'cart.php';
}

    </script>

</body>
</html>
