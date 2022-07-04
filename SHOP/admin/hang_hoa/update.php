
<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#3F3F3F ; color: #fff; border-radius: 8px;">CHỈNH SỬA HÀNG HÓA</h2>
<form action="index.php" method="POST" enctype="multipart/form-data">
    <div class="grid grid-cols-3 gap-8">
        <div class="col-span-1">
            <div class="mb-4">
                <p>MÃ HÀNG HÓA</p>
                <input type="text" name="ma_hh" style="background-color: #D1D1D1; border:1px solid black; width: 100%;height: 30px; padding: 8px;" placeholder="Auto Number" readonly value="<?php if (isset($ma_hh)) {
                                                                                                                                                                                                    echo $ma_hh;
                                                                                                                                                                                                } ?>">
            </div>
            <div class="mb-4">
                <p>GIẢM GIÁ</p>
                <input type="text" name="giam_gia" style="border:1px solid black; width: 100%;height: 30px; padding: 4px;" value="<?php if (isset($giam_gia)) {
                                                                                                                                        echo $giam_gia;
                                                                                                                                    } ?>">
            </div>
            <div>
                <p>HÀNG ĐẶC BIỆT</p>
                <div class="p-1 border text-center border-black">
                    <input type="radio" name="hangDacBiet" id="" value="Đặc biệt" <?php
                                                                                    if (isset($dac_biet)) {
                                                                                        if ($dac_biet == 1) {
                                                                                            echo "checked='checked'";
                                                                                        }
                                                                                    }
                                                                                    ?>>
                    <label for="Đặc biệt">Đặc biệt</label>
                    <input class="ml-4" type="radio" name="hangDacBiet" id="" value="Bình thường" <?php
                                                                                                    if (isset($dac_biet)) {
                                                                                                        if ($dac_biet == 0) {
                                                                                                            echo "checked='checked'";
                                                                                                        }
                                                                                                    }
                                                                                                    ?>>
                    <label for="Bình thường">Bình thường</label>
                </div>
            </div>
        </div>
        <!-- end cột 1 -->
        <div class="col-span-1">
            <div class="mb-4">
                <p>TÊN HÀNG HÓA</p>
                <input type="text" name="ten_hh" style="border:1px solid black; width: 100%;height: 30px; padding: 4px;" value="<?php if (isset($ten_hh)) {
                                                                                                                                    echo $ten_hh;
                                                                                                                                } ?>">
            </div>

            <div class="mb-4">
                <p>HÌNH ẢNH</p>
                <input type="file" name="productImage" id="input" style="border:1px solid black; width: 100%;height: 32px;" placeholder="Product Image">
            </div>

            <div class="mb-4">
                <p>NGÀY NHẬP</p>
                <input type="date" name="ngay_nhap" style="border:1px solid black; width: 100%;height: 30px;" value="<?php if (isset($ngay_nhap)) {
                                                                                                                            echo $ngay_nhap;
                                                                                                                        } ?>">
            </div>
        </div>
        <!-- end cột 2 -->
        <div class="col-span-1">
            <div class="mb-4">
                <p>ĐƠN GIÁ</p>
                <input type="number" name="don_gia" style="border:1px solid black; width: 100%;height: 30px;" value="<?php if (isset($don_gia)) {
                                                                                                                            echo $don_gia;
                                                                                                                        } ?>">
            </div>
            <div class="mb-4">
                <p>LOẠI HÀNG</p>
                <select name="loai_hang" id="" class="border border-black" style=" width: 100%;height: 30px;">
                    <option value="<?php if (isset($ma_loai)) echo $ma_loai; ?>"><?php if (isset($ten_loai)) echo $ten_loai; ?></option>
                    <?php
                    $result2 = $pdo_hang_hoa->list_loai_hang();
                    if (!empty($result2)) {
                        foreach ($result2 as $u2) :

                    ?>
                            <option value="<?php echo $u2['ma_loai'] == $ma_loai ? $ma_loai : $u2['ma_loai'] ?>"><?php echo $u2['ten_loai'] ?></option>
                    <?php
                        endforeach;
                    }
                    ?>
                </select>
            </div>
            <div class="mb-4">
                <p>SỐ LƯỢT XEM</p>
                <input type="text" name="so_luot_xem" style="background-color: #D1D1D1;padding: 4px; border:1px solid black; width: 100%;height: 30px;" value="<?php if (isset($so_luot_xem)) {
                                                                                                                                                                    echo $so_luot_xem;
                                                                                                                                                                } ?>" readonly>
            </div>
        </div>
        <!-- end cột 3 -->
    </div>

    <div>
        <p>MÔ TẢ</p>
        <!-- <textarea  id="" cols="30" rows="5" style="width: 100%; border:1px solid #3f3f3f ;padding: 5px;"></textarea> -->
        <textarea name="mo_ta">  <?php if(isset($mo_ta)) echo $mo_ta?> </textarea>
        <script>
            tinymce.init({
                selector: 'textarea',
                plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
                toolbar_mode: 'floating',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
            });
        </script>
    </div>
    <div class="mb-4">
        <p style="color: red;">
            <?php
            if ($error != "") {
                echo $error;
            }
            ?>
        </p>
        <input type="submit" name="btn_update" class="px-4 py-1 border border-black mr-3" value="Sửa">
        <a href="index.php?list_btn" style="border-radius: 4px; border: 1px solid #3f3f3f" class=" py-1 px-4 ">Danh sách</a>

    </div>
</form>