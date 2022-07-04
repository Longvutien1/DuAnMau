<?php 
 require_once '../inc_admin/side_bar.php';?>
<div class="main-content">

    <?php require_once '../inc_admin/header_admin.php'; ?>
    <main>
        <div class="row" style="background-color: #fff; border-radius: 8px; padding: 40px;">

            <div>
               
                <?php 
                    include_once $VIEW_PAGE;
                ?>
            </div>

        </div>
    </main>
    <?php require_once '../inc_admin/footer_admin.php' ?>
</div>

</body>

</html>