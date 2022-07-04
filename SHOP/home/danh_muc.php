
<ul>
    <li class="border text-white pl-4 text-xl py-2" style="background-color: #3f3f3f;">CATEGORY</li>
    <?php
    $pdo_loai_hang = new procedure_loai_hang();
    
        $result = $pdo_loai_hang->list_loai_hang();
    if (!empty($result)) {
        foreach ($result as $u) :
    ?>
        <li class="xam border px-4  py-2"><a href="?name_category=<?php echo $u['ten_loai']?>"><?php echo $u['ten_loai']?></a></li>
    <?php endforeach;
    } ?>
    
    <li class="border px-4  py-2" style="background-color: #3f3f3f;">
        <form action="" method="GET">
            <input class="w-full p-1 outline-none" type="text" name="search_loai" placeholder="Từ khóa tìm kiếm">
        </form>
    </li>
</ul>


<ul>
    <li class="border text-white pl-4 text-xl py-2 mt-8" style="background-color: #3f3f3f;">TOPS 10 FAVORITE</li>
    <?php
   
    $pdo_top10 = new procedure_hang_hoa();
    
    $result = $pdo_top10->select_hh_top_10();
    if (!empty($result)) {
        foreach ($result as $u) :
    ?>
        <li class="border px-4  py-2 flex gap-4">
            <a href="index.php?chi_tiet_sp&ma_hh=<?php echo $u['ma_hh'] ?>"><img src="admin/anh/<?php echo $u['hinh'] ?>" alt="" width="120"></a>
          
            <div>
                <a href="index.php?chi_tiet_sp&ma_hh=<?php echo $u['ma_hh'] ?>"><?php echo $u['ten_hh']?></a>
                <p class="text-gray-400 text-lg font-semibold line-through">$<?php echo $u['don_gia']?>.00</p>
                <p class="text-yellow-500 text-lg font-semibold">$
                            <?php echo $u['don_gia'] - ($u['don_gia']*$u['giam_gia'] / 100) ?>
                            .00</p>
            </div>
        </li>
    <?php endforeach;
    } ?>
    
    <li class="border px-4  py-2" style="background-color: #3f3f3f;">
        <p class="p-3"></p>
    </li>
</ul>