<h1 style="text-align: center;">Liệt Kê Chi Tiet Đơn hàng</h1>
<table class="table table-hover" style="font-size: medium;">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên người đặt</th>
            <th scope="col">số điện thoại</th>
            <th scope="col">Email</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Ghi chú</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        $total = 0;
        foreach ($order_details as $key => $ord) {
            $i++;
        ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $ord['name'] ?></td>
                <td><?= $ord['sdt'] ?></td>
                <td><?= $ord['email'] ?></td>
                <td><?= $ord['diachi'] ?></td>
                <td><?= $ord['noidung'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<table class="table table-hover" style="font-size: medium;">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Mã Đơn hàng</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Đơn giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Thành tiền</th>
            <th scope="col">Quản lý</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        $total = 0;
        foreach ($order_details as $key => $ord) {
            $total += $ord['product_quanlity'] * $ord['price_product'];
            $i++;
            // var_dump($ord['product_quanlity']);
        ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $ord['order_code'] ?></td>
                <td><?= $ord['title_product'] ?></td>
                <td><img src="<?= BASE_URL ?>/public/uploads/product/<?= $ord['image_product'] ?>" height="100px" width="100px" alt=""></td>
                <td><?= number_format($ord['price_product'], 0, ',', '.') . 'đ' ?></td>
                <td><?= $ord['product_quanlity'] ?></td>
                <td><?= number_format($ord['price_product'] * $ord['product_quanlity'], 0, ',', '.') . 'đ' ?></td>
                <td><? echo '' ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="6">Tổng tiền :<?= number_format($total, 0, ',', '.') . 'd' ?></td>
        </tr>
    </tbody>
</table>