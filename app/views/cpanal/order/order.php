<h1 style="text-align: center;">Liệt Kê Đơn hàng</h1>
<table class="table table-hover" style="font-size: medium;">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Mã Đơn hàng</th>
            <th scope="col">Ngày Đặt</th>
            <th scope="col">Tình trạng</th>
            <th scope="col">Quản lý</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($order as $key => $ord) {
            $i++;
        ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $ord['order_code'] ?></td>
                <td><?= $ord['order_date'] ?></td>
                <td><?php echo ($ord['order_status'] == 0 ? "Đơn hàng mới" : "Đã xử lý") ?></td>
                <td>
                    <a href="<?= BASE_URL ?>/order/order_details/<?= $ord['order_code'] ?>">Xem </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>