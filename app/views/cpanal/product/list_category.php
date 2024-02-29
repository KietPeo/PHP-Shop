<?php 
if (!empty($_GET['msg'])) {
    $msg=unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo "<span style='color:blue;font-weight:bold'>$value</span>";
    }
}
?>
<h1 style="text-align: center;" >Liệt Kê Danh Mục Sản Phẩm</h1>
<table class="table table-hover" style="font-size: medium;">
    <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên Danh Mục</th>
      <th scope="col">Mô Tả</th>
      <th scope="col">Quản lý</th>
    </tr>
  </thead>
  <tbody>

    <?php 
    $i=0;
    foreach ($category as $key => $cate) {
      $i++;
    ?>

    <tr>
      <th scope="row"><?=$i?></th>
      <td><?=$cate['title_category_product']?></td>
      <td><?=$cate['desc_category_product']?></td>
      <td>
          <a href="<?=BASE_URL?>/product/delete_category/<?=$cate['id_category_product']?>">Xoá</a>||
        <a href="<?=BASE_URL?>/product/edit_category/<?=$cate['id_category_product']?>">Cập Nhật</a>
      </td>
    </tr>

    <?php } ?>

  </tbody>
</table>