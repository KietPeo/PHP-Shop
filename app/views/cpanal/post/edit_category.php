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
    foreach ($categorybyid as $key => $cate) {
    ?>
    <h1 style="text-align: center;" >Cập Nhật Danh Mục Bài Viết</h1>
    <form action="<?=BASE_URL?>/post/update_category/<?=$cate['id_category_post']?>" method="post">


    <div class="mb-3">
        <label for="" class="form-label">Tên Bài Viết</label>
        <input type="text" value="<?=$cate['title_category_post']?>" name="title_category_post" class="form-control" id="" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Miêu tả </label>
        <textarea name="desc_category_post" rows="5" class="form-control" style="resize:none"><?=$cate['desc_category_post']?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật </button>

    
</form>
<?php } ?>
</div>