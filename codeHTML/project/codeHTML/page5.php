<!DOCTYPE html>
<html>
  <meta charset="UTF-8">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
  <link rel="stylesheet" href="codeCSS/page5.css">
    <body>
        <header>
            <h1>คำสั่งซื้อ</h1>
            <div style="display: flex;">
              <i class="bi bi-house-door" style="font-size: 30px; margin-right: 10px;" onclick="window.location.href='tap.html'"></i>
              <i class="bi bi-basket" style="font-size: 30px;" onclick="window.location.href='cart.html'"></i>
            </div>
          </header><br>
        <div class="button-next-1">
            <div class="button-page" onclick="window.location.href='page1.html'">
              <i class="bi bi-1-circle-fill"></i>
            </div>
            <div class="button-page" onclick="window.location.href='page2.html'">
              <i class="bi bi-2-circle-fill"></i>
            </div>
            <div class="button-page" onclick="window.location.href='page3.html'">
              <i class="bi bi-3-circle-fill"></i>
            </div>
            <div class="button-page" onclick="window.location.href='page4.html'">
              <i class="bi bi-4-circle-fill"></i>
            </div>
            <div class="button-page" onclick="window.location.href='page5.html'">
              <i class="bi bi-5-circle-fill"></i>
            </div>
            <div class="button-page" onclick="window.location.href='sum_order.html'">
              <i class="bi bi-6-circle-fill"></i>
            </div>
        </div>
        <br>
        <div class="button-next-next">
            <div class="button-next-page" onclick="window.location.href='sum_order.html'">ต่อไป
            </div>
            <h1 style="color: #FFC20D; margin-bottom: 5px;">เลือกขนมปัง</h1>
            <h4 style="margin-top: 5px;color:#D9D9D9;">เลือกได้มากกว่า 1 อย่าง</h4>
          </div>
         <form action="/submit_form" method="post">
        <div class="button-container">
            <div class="button-slide">
              <button type="button" name="topping" value="ไม่เพิ่ม"><img src="img/sauce/icon1.png"><br><br>ไม่เลือก</button>
        <input type="hidden" name="topping-quantity[]" value="0">
        <button type="button" name="topping" value="มอสซาเรลาชีส"><img src="img/topping/mozcheese.jpg" width="150" height="100"><br>มอสซาเรลาชีส<br>+20บาท</button>
        <input type="hidden" name="topping-quantity[]" value="1">
        <button type="button" name="topping" value="ชีสแผ่น"><img src="img/topping/cheese.jpg" width="150" height="100"><br>ชีสแผ่น<br>+20บาท</button>
        <input type="hidden" name="topping-quantity[]" value="1">
        <button type="button" name="topping" value="ไข่ดาว"><img src="img/topping/egg.jpg" width="150" height="100"><br>ไข่ดาว<br>+10บาท</button>
        <input type="hidden" name="topping-quantity[]" value="1">
        </div>
        </div>
        <br>
        <!--button type="button" id="add-button">Add to Cart</button>
        <button type="submit">Submit</button-->
      </form>

      <script>
        const buttons = document.querySelectorAll('button[name="topping"]');
        const hiddenInputs = document.querySelectorAll('input[name="topping-quantity[]"]');

        let selectedTopping = JSON.parse(localStorage.getItem('selectedTopping')) || [];
    
        buttons.forEach((button, index) => {
            button.addEventListener('click', () => {
                hiddenInputs[index].value = parseInt(hiddenInputs[index].value) + 1;
                button.classList.toggle('active');
    
                if (button.classList.contains('active')) {
                    selectedTopping.push(button.value);
                } else {
                    const indexToRemove = selectedTopping.indexOf(button.value);
                    if (indexToRemove !== -1) {
                        selectedTopping.splice(indexToRemove, 1);
                    }
                }
    
                localStorage.setItem('selectedTopping', JSON.stringify(selectedTopping));
            });
        });
        function updateSelectedItems() {
            const selectedTopping = document.querySelectorAll('.active');
            let selectedItemsText = '';
            selectedTopping.forEach((selectedTopping, index) => {
                const value = selectedTopping.getAttribute('value');
                selectedItemsText += `${value}`;

            });

            localStorage.setItem('selectedTopping', JSON.stringify(Array.from(selectedTopping).map(topping => topping.getAttribute('value'))));
        }



        // เพิ่มในส่วนที่จะเรียกใช้งานหน้าอื่น
        window.addEventListener('load', () => {
            const selectedTopping = JSON.parse(localStorage.getItem('selectedTopping')) || [];
            selectedTopping.forEach(topping => {
                const button = document.querySelector(`button[name="topping"][value="${topping}"]`);
                if (button) {
                    button.classList.add('active');
                    const index = Array.from(buttons).indexOf(button);
                    hiddenInputs[index].value = 1;
                }
            });
            updateSelectedItems();
        });
        // ตรวจสอบว่าเนื้อสัตว์ไหนถูกเลือกไว้แล้ว
        selectedTopping.forEach((topping) => {
            const button = document.querySelector(`button[name="topping"][value="${topping}"]`);
            if (button) {
                button.classList.add('active');
                const index = Array.from(buttons).indexOf(button);
                hiddenInputs[index].value = 1;
            }
        });
    </script>
    </body>
   
</html>