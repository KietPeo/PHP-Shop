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
    <h1 style="text-align: center;" >Cập nhật Danh Mục Sản Phẩm</h1>
    <form action="<?=BASE_URL?>/product/update_category_product/<?=$cate['id_category_product']?>" method="post">


    <div class="mb-3">
        <label for="" class="form-label">Tên Danh Mục</label>
        <input type="text" value="<?=$cate['title_category_product']?>" name="title_category_product" class="form-control" id="" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Miêu tả </label>
        <textarea name="desc_category_product" rows="5" class="form-control" style="resize:none"><?=$cate['desc_category_product']?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật </button>

    
</form>
<?php } ?>
</div>