<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#3F3F3F ; color: #fff; border-radius: 8px;">BIỂU ĐỒ THỐNG KÊ</h2>
<div id="piechart" class="mb-4"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Loại', 'Số lượng'],
            <?php
           
            $result = $pdo_thong_ke->list_thong_ke();
            if (!empty($result)) {

                foreach ($result as $u) {
                    echo "['$u[ten_loai]',  $u[so_luong]],";
                }
            }
            ?>
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'title': 'Tỉ lệ hàng hóa',
            'width': 650,
            'height': 500
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>
</div>
<a href="index.php" class="px-4 py-1 border border-black mt-8 ">Danh sách</a>


