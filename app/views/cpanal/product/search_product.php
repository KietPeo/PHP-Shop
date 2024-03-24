<?php
if (!empty($_GET['msg'])) {
  $msg = unserialize(urldecode($_GET['msg']));
  foreach ($msg as $key => $value) {
    echo "<span style='color:blue;font-weight:bold'>$value</span>";
  }
}
?>
<h1 style="text-align: center;">Liệt Kê Sản Phẩm</h1>
  <form style="margin-top: 10px ; margin-left:  40px;" class="search_form" method="get" action="<?= BASE_URL ?>/sanpham/timkiem_admin">
    <input class="searchTerm form-control w-50" name="search" placeholder="Nhập từ cần tìm..." required />
    <button class="searchButton btn btn-info mt-2 " type="submit">tìm kiếm</button>
  </form>
<table class="table table-hover" style="font-size: medium;">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên Sản Phẩm</th>
      <th scope="col">Ảnh Sản Phẩm</th>
      <th scope="col">Danh mục</th>
      <th scope="col">Giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Hot</th>
      <th scope="col">Quản lý</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $i = 0;
    foreach ($search as $key => $pro) {
      $i++;
    ?>

      <tr>

        <td hidden><?= $pro['desc_product'] ?></td>
        <th scope="row"><?= $i ?></th>
        <td><?= $pro['title_product'] ?></td>
        <td><img src="<?= BASE_URL ?>/public/uploads/product/<?= $pro['image_product'] ?>" height="100px" width="100px"></td>
        <td><?= $pro['title_category_product'] ?></td>
        <td><?php echo !empty($pro['price_product']) ? number_format((float)$pro['price_product'], 0, ',', '.') . 'đ' : ''; ?></td>
        <td><?= $pro['quanlity_product'] ?></td>
        <td>
          <?php
          if ($pro['product_hot']) {
            echo "Sản phẩm Hot";
          } else {
            echo "Không có";
          }
          ?>
        </td>
        <td>
          <a href="<?= BASE_URL ?>/product/delete_product/<?= $pro['id_product'] ?>">Xoá</a>||
          <a href="<?= BASE_URL ?>/product/edit_product/<?= $pro['id_product'] ?>">Cập Nhật</a>
        </td>
      </tr>

    <?php } ?>

  </tbody>
</table>