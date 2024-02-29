<?php 
if (!empty($_GET['msg'])) {
    $msg=unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo "<span style='color:blue;font-weight:bold'>$value</span>";
    }
}
?>
    <h1 style="text-align: center;" >Liệt Kê Sản Phẩm</h1>
    <table class="table table-hover"style="font-size: medium;">
      <thead>
        <tr >
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
      $i=0;
      foreach ($product as $key => $pro) {
        $i++;
        ?>

<tr>
  <th scope="row"><?=$i?></th>
  <td><?=$pro['title_product']?></td>
  <td><img src="<?=BASE_URL?>/public/uploads/product/<?=$pro['image_product']?>" height="100px" width="100px"></td>
  <td><?=$pro['title_category_product']?></td>
  <td><?php echo !empty($pro['price_product']) ? number_format((float)$pro['price_product'], 0, ',', '.') . 'đ' : ''; ?></td>
  <td><?=$pro['quanlity_product']?></td>
  <td>
    <?php 
      if($pro['product_hot']){
        echo "Sản phẩm Hot";
      }else{
        echo "Không có";
      }
    ?>
  </td>
  <td>
    <a href="<?=BASE_URL?>/product/delete_product/<?=$pro['id_product']?>">Xoá</a>||
    <a href="<?=BASE_URL?>/product/edit_product/<?=$pro['id_product']?>">Cập Nhật</a>
  </td>
</tr>

<?php } ?>

</tbody>
</table>
