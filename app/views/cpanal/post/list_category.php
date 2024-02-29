<?php
if (!empty($_GET['msg'])) {
  $msg = unserialize(urldecode($_GET['msg']));
  foreach ($msg as $key => $value) {
    echo "<span style='color:blue;font-weight:bold'>$value</span>";
  }
}
?>
<h1 style="text-align: center;">Liệt Kê Danh Mục Bài Viết</h1>
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
    $i = 0;
    foreach ($category as $key => $cate) {
      $i++;
    ?>

      <tr>
        <th scope="row"><?= $i ?></th>
        <td><?= $cate['title_category_post'] ?></td>
        <td><?= $cate['desc_category_post'] ?></td>
        <td>
          <a href="<?= BASE_URL ?>/post/delete_category/<?= $cate['id_category_post'] ?>">Xoá</a>||
          <a href="<?= BASE_URL ?>/post/edit_category/<?= $cate['id_category_post'] ?>">Cập Nhật</a>
        </td>
      </tr>

    <?php } ?>

  </tbody>
</table>