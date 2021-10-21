<!DOCTYPE html>
<html lang="en-VN">
<head>
    <meta content="utf-8" http-equiv="encoding">
    <title>Giang - LTMT1 - CD193569</title>
    <link rel="stylesheet" href="src/site.css">
    <link rel="stylesheet" href="src/index.css">
</head>
<body>
    <div class="flex full-w full-h" style="position: absolute;top:0px; left:0px;">
        <div class="func_select">
            <h1>Chọn bài</h1>
            <button class="btn minimize_btn"><-</button>
            <div class="flex flex-dir-col" style="margin-bottom: 10px;">
                <button id="btn-buoi1" class="btn btn-blue text-bold" style="font-size: 1.2rem;">Buổi 1</button>
                <div class="collapse" trigger="btn-buoi1">
                    <button class="btn func_select_btn" value="PHP/LT1/Bai1.php">Bài 1: Kiểm tra lớn nhỏ</button><br/>
                    <button class="btn func_select_btn" value="PHP/LT1/Bai2.php">Bài 2: Kiểm tra chẵn lẻ</button><br/>
                    <button class="btn func_select_btn" value="PHP/LT1/Bai3.php">Bài 3: Xác định đối tượng</button><br/>
                    <button class="btn func_select_btn" value="PHP/LT1/Bai4.php">Bài 4: Xếp loại học tập</button><br/>
                    <button class="btn func_select_btn" value="PHP/LT1/Bai5.php">Bài 5: Kiểm tra thứ</button><br/>
                    <button class="btn func_select_btn" value="PHP/LT1/Bai6.php">Bài 6: Bảng cửu chương</button><br/>
                    <button class="btn func_select_btn" value="PHP/LT1/Bai7.php">Bài 7: Dãy số tự nhiên</button><br/>
                    <button class="btn func_select_btn" value="PHP/LT1/Bai8.php">Bài 8: In dãy số lẻ</button><br/>
                </div>
            </div>
            <div class="flex flex-dir-col" style="margin-bottom: 10px;">
                <button id="btn-buoi2" class="btn btn-blue text-bold" style="font-size: 1.2rem;">Buổi 2</button>
                <div class="collapse" trigger="btn-buoi2">
                    <a href="PHP/LT2/Bai1.php"><button class="btn func_select_btn">Bài 1: Thông tin cá nhân</button></a><br/>
                </div>
            </div>
        </div>
        <div class="func_show">
            <h1 id="func_show_about">Bài tập được chọn sẽ hiển thị tại đây</h1>
            <iframe id="func_show_iframe" src="" style="width:100%; height: 100%; border: none"></iframe>
        </div>
    </div>

    <script>
        const minbtn = document.getElementsByClassName("minimize_btn")[0];
        const func_select = document.getElementsByClassName("func_select")[0];

        const orginal_func_select_style = func_select.style;
        min = false;
        minbtn.style.left = func_select.offsetWidth - minbtn.offsetWidth -17 + "px";

        minbtn.onclick = function() {
            min = !min;
            if(min)
            {
                func_select.style.width = "0px";
                func_select.style.padding = "0px"; 
                func_select.style.left = "-2px";
                minbtn.style.left = "0px";
                minbtn.innerHTML = "->";
            }
            else
            {
                func_select.style = orginal_func_select_style;
                minbtn.style.left = func_select.offsetWidth - minbtn.offsetWidth -17 + "px";
                minbtn.innerHTML = "<-";
            }
        }
    </script>


    <script>
        ifr = document.getElementById("func_show_iframe");
        h = document.getElementById("func_show_about");
        btn = document.getElementsByClassName("func_select_btn");
        
        for (let i = 0; i < btn.length; i++) {
            btn[i].onclick = function() {
                ifr.src = btn[i].value;
                h.style.display = "none";
                console.log(btn[i].value);
            }
        } 
    </script>
    <script type="text/javascript" src="/src/site.js"></script>
</body>
</html> 