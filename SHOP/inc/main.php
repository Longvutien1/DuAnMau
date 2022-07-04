<?php

// header('location:index.php');
// home/index

?>

<section>
    <div class="top-slide">
        <div class="slide">
            <div class="chuyenSlide">
                <div><img class="slide1" src="image/0.jpg" style="max-width: 100%;"></div>
                <div><img class="slide1" src="image/1.jpg" style="max-width: 100%;"></div>
                <div><img class="slide1" src="image/2.jpg" style="max-width: 100%;"></div>
                <div><img class="slide1" src="image/3.jpg" style="max-width: 100%;"></div>
                <div><img class="slide1" src="image/4.jpg" style="max-width: 100%;"></div>
            </div>

        </div>
        <div id="sliderNav2" style="position: relative;">
            <div id="sliderPrev2">
                <span class="pre-banner1" id="pre1" onclick="pre()"> </span>
            </div>
            <div id="sliderNext2">
                <span class="next-banner1" id="next1" onclick="next()"></span>
            </div>
        </div>
    </div>

</section> <!-- banner -->
<!-- banner -->

<script>
    // ------------------------------------------banner------------------------------------

    var kichThuoc = document.getElementsByClassName("slide")[0].clientWidth;
    var chuyenSlide = document.getElementsByClassName("chuyenSlide")[0];
    // alert(kichThuoc);
    var img = chuyenSlide.getElementsByTagName("img");
    var max = kichThuoc * (img.length - 1);

    var chuyen = 0;

    function next() {
        chuyen += kichThuoc;
        if (chuyen > max) {
            chuyen = 0;
        }
        chuyenSlide.style.marginLeft = '-' + chuyen + 'px';
        chuyenSlide.style.transition = "all 1s ease-in-out";
    }


    function pre() {
        chuyen -= kichThuoc;
        if (chuyen < 0) {
            chuyen = max;
        }
        chuyenSlide.style.marginLeft = '-' + chuyen + 'px';
        chuyenSlide.style.transition = "all 1s ease-in-out";
    }

    setInterval(function() {
        next();
    }, 3000);
</script>
<section>
    <h1 class="text-3xl text-center mt-14 mb-4"><i>New Arrival</i></h1>
    <div>
        <ul class="text-center">
            <li class="inline-block px-4 py-4 ">ALL</li>
            <li class="inline-block px-4 py-4 ">WOMAN</li>
            <li class="inline-block px-4 py-4 ">MAN</li>
            <li class="inline-block px-4 py-4 ">KIDS</li>
            <li class="inline-block px-4 py-4 ">ACCESSORIES</li>
        </ul>
    </div>
</section>
<section class="w-9/12 m-auto mt-8">
    <div class="grid grid-cols-12 gap-8">
        <div class="col-span-3">
            <?php require 'home/danh_muc.php'; ?>
        </div>
        <div class="col-span-9">
            <?php require 'san_pham/list_san_pham.php'; ?>
            
        </div>
    </div>
</section>