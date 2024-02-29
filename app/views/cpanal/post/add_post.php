<?php 
if (!empty($_GET['msg'])) {
    $msg=unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo "<span style='color:blue;font-weight:bold'>$value</span>";
    }
}
?>
<div class="col-md-12" style="font-size: medium;">
    <h1 style="text-align: center;" >Thêm bài viết</h1>
    <form action="<?=BASE_URL?>/post/insert_post" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="" class="form-label">Tên bài viết</label>
        <input type="text" name="title_post" class="form-control">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Ảnh bài viết</label>
        <input type="file" name="image_post" class="form-control">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Chi tiết bài viết </label>
        <textarea name="content_post" rows="10" style="resize: none;" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Danh mục bài viết </label>
        <select class="form-control"name="category_post"  >
           <?php 
                foreach ($category as $key => $cate) {
            ?>
            <option value="<?=$cate['id_category_post']?>"><?=$cate['title_category_post']?></option>
            <?php }?>
        </select>
    </div>
    <button type="submit" name="addpost" class="btn btn-primary">Thêm bài viết </button>
    </form>
</div>