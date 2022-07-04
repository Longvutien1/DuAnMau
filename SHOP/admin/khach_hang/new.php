

<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#3F3F3F ; color: #fff; border-radius: 8px;"> THÊM MỚI KHÁCH HÀNG</h2>
<form action="index.php?btn_add" method="post" enctype="multipart/form-data">
    <div class="grid grid-cols-2 gap-8">
        <div class="col-span-1">
            <div class="mb-4">
                <p>MÃ KHÁCH HÀNG</p>
                <input type="text" name="ma_kh" style=" border:1px solid black; width: 100%;height: 30px; padding: 8px;" placeholder="Auto Number">
            </div>
            <div class="mb-4">
                <p>MẬT KHẨU</p>
                <input type="password" name="mat_khau" style="border:1px solid black; width: 100%;height: 30px; padding: 4px;">
            </div>
            <div class="mb-4">
                <p>ĐỊA CHỈ EMAIL</p>
                <input type="email" name="email" style="border:1px solid black; width: 100%;height: 30px; padding: 4px;">
            </div>
            <div class="mb-4">
                <p>KÍCH HOẠT</p>
                <div class="p-1 border text-center border-black">
                    <input type="radio" name="kick_hoat" id="" value="Chưa kích hoạt" checked="checked">
                    <label for="Chưa kích hoạt">Chưa kích hoạt</label>
                    <input class="ml-4" type="radio" name="kick_hoat" id="" value="Kích hoạt">
                    <label for="Kích hoạt">Kích hoạt</label>
                </div>
            </div>
        </div>
        <!-- end cột 1 -->
        <div class="col-span-1">
            <div class="mb-4">
                <p>HỌ VÀ TÊN</p>
                <input type="text" name="ho_va_ten" style="border:1px solid black; width: 100%;height: 30px; padding: 4px;">
            </div>

            <div class="mb-4">
                <p>XÁC NHẬN MẬT KHẨU</p>
                <input type="password" name="xac_nhan_mat_khau" style="border:1px solid black; width: 100%;height: 32px;">
            </div>

            <div class="mb-4">
                <p>HÌNH ẢNH</p>
                <input type="file" name="hinh_anh" style="border:1px solid black; width: 100%;height: 30px;">
            </div>

            <div class="mb-4">
                <p>VAI TRÒ</p>
                <div class="p-1 border text-center border-black">
                    <input type="radio" name="vai_tro" id="" value="Khách hàng" checked="checked">
                    <label for="Khách hàng">Khách hàng</label>
                    <input class="ml-4" type="radio" name="vai_tro" id="" value="Nhân viên">
                    <label for="Nhân viên">Nhân viên</label>
                </div>
            </div>
        </div>
        <!-- end cột 2 -->
    </div>

    <div class="mb-4">
        <p style="color: red;">
            <?php
            if ($error != "") {
                echo $error;
            }
            ?>
        </p>
        <button name="btn_add" type="submit" class="px-4 py-1 border border-black mr-3">Thêm mới</button>
        <button name="btn_rs" class="px-4 py-1 border border-black mr-3">Nhập lại</button>
        <a href="index.php?list_btn" class="px-4 py-1 border border-black">Danh sách</a>
    </div>
</form>