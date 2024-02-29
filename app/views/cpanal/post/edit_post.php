<?php 
if (!empty($_GET['msg'])) {
    $msg=unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo "<span style='color:blue;font-weight:bold'>$value</span>";
    }
}
?>
<div class="col-md-12" style="font-size: medium;">
  <?php 
  foreach ($postbyid as $key => $pos) {
      var_dump($pos['id_post'])
  ?>
    <h1 style="text-align: center;" >Thêm bài viết</h1>
        <form action="<?= BASE_URL ?>/post/update_post/<?= $pos['id_post'] ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="" class="form-label">Tên bài viết</label>
        <input type="text" value="<?=$pos['title_post']?>"  name="title_post" class="form-control">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Ảnh bài viết</label>
        <input type="file"   name="image_post" class="form-control">
        <p><img src="<?=BASE_URL?>/public/uploadds/post/"<?=$pos['image_post']?> alt=""></p>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Chi tiết bài viết </label>
        <textarea   name="content_post" rows="10" style="resize: none;" class="form-control"><?=$pos['content_post']?>
        </textarea>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Danh mục bài viết </label>
        <select class="form-control" value="<?=$pos['id_post']?>"  name="category_post"  >
           <?php 
                foreach ($category as $key => $cate) {
            ?>
            <option <?php if($cate['id_category_post']==$pos['id_category_post']){echo 'selected';} ?>
                value="<?=$cate['id_category_post']?>"><?=$cate['title_category_post']?>
            </option>
            <?php }?>
        </select>
    </div>
    <button type="submit" name="updatepost" class="btn btn-primary">Thêm bài viết </button>
    </form>
    <?php }?>
</div>