<div class="container">
<h1 style="text-align: center;">Đơn hàng của bạn</h1>
<table class="table table-hover" style="font-size: medium;">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Mã Đơn hàng</th>
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Số lượng </th>
            <th scope="col">Tình trạng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($order as $key => $ord) {
        ?>
            <tr>
                <th scope="row"><?= $key + 1 ?></th>
                <td><?= $ord['order_code'] ?></td>
                <td><?= $ord['product_id'] ?></td>
                <td><?= $ord['product_quanlity'] ?></td>
                <td><?php echo ($ord['order_status'] == 0 ? "Chưa xử lý" : "Đã xử lý") ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>