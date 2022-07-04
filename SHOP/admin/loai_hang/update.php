<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#3F3F3F ; color: #fff; border-radius: 8px;"> SỬA LOẠI HÀNG</h2>
<form action="index.php" method="POST">
    <div class="mb-4">
        <p>Mã Loại</p>
        <input type="text" name="ma_loai" style="background-color: #D1D1D1; border:1px solid black; width: 100%;height: 30px; padding: 8px;" value="<?php if (isset($ma_loai)) {
                                                                                                                                                        echo $ma_loai;
                                                                                                                                                    } ?>" placeholder="Auto Number" readonly>
    </div>
    <div class="mb-4">
        <p>Tên Loại</p>
        <input type="text" name="ten_loai" style="border:1px solid black; width: 100%;height: 30px;" value="<?php if (isset($ten_loai)) {
                                                                                                                echo $ten_loai;
                                                                                                            } ?>">
    </div>

    <p style="color: red;">
            <?php
            if ($error != "") {
                echo $error;
            }
            ?>
        </p>
    <div class="mb-4">
        <button name="cap_nhat" class="px-4 py-1 border border-black mr-3" type="submit">Cập nhật</button>
        <button name="btn_rs" class="px-4 py-1 border border-black mr-3">Nhập lại</button>
        <a href="index.php?list_btn" style="border-radius: 4px; border: 1px solid #3f3f3f" class=" py-1 px-4 ">Danh sách</a>
    </div>
</form>

