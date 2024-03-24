<?php
// Thêm đoạn mã PHP để lặp qua dữ liệu và tạo các dòng cho biểu đồ
$rows = [];
foreach ($dashboard as $item) {
    $rows[] = [$item['title_product'], (int)$item['soluong']];
}
?>

<meta charset="UTF-8">
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load('visualization', '1.0', {
        'packages': ['corechart']
    });
    google.setOnLoadCallback(drawVisualization);

    function drawVisualization() {
        var data = new google.visualization.DataTable();
        var rows = <?php echo json_encode($rows); ?>; // Chuyển đổi mảng PHP sang mảng JavaScript
        data.addColumn("string", "Tên Hàng Hóa");
        data.addColumn('number', "Số Lượng Bán");
        data.addRows(rows);
        var options = {
            title: "THỐNG KÊ SỐ LƯỢNG BÁN",
            'width': 500,
            "height": 500,
            "backgroundColor": "#fffffff",
            is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
<div class="thongke">
    <label for="">Tháng </label>
    <input type="text">
    <label for="">Năm</label>
    <input type="text">
    <div style="width: 50%; float: left;" class="shadow p-3 mb-5 bg-body-tertiary rounded" id="chart_div"></div>
</div>
