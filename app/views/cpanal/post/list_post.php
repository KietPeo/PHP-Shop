<h1 style="text-align: center;" >Liệt Kê bài viết</h1>
<?php 
if (!empty($_GET['msg'])) {
    $msg=unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo "<span style='color:blue;font-weight:bold'>$value</span>";
    }
}
?>
    <table class="table table-hover"style="font-size: medium;">
      <thead>
        <tr >
            <th scope="col">ID</th>
            <th scope="col">Tên bài viết</th>
            <th scope="col">Ảnh bài viết</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Quản lý</th>
          </tr>
        </thead>
        <tbody>
        <?php 
      $i=0;
      foreach ($post as $key => $pos) {
        $i++;
        ?>

<tr>
  <th scope="row"><?=$i?></th>
  <td><?=$pos['title_post']?></td>
  <td><img src="<?=BASE_URL?>/public/uploads/post/<?=$pos['image_post']?>" height="100px" width="100px"></td>
  <td><?=$pos['title_category_post']?></td>
  <td>
    <a href="<?=BASE_URL?>/post/delete_post/<?=$pos['id_post']?>">Xoá</a>||
    <a href="<?=BASE_URL?>/post/edit_post/<?=$pos['id_post']?>">Cập Nhật</a>
  </td>
</tr>

<?php } ?>

</tbody>
</table>
