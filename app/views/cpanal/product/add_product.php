<?php 
if (!empty($_GET['msg'])) {
    $msg=unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo "<span style='color:blue;font-weight:bold'>$value</span>";
    }
}
?>
<div class="col-md-12" style="font-size: medium;">
    <h1 style="text-align: center;" >Thêm  Sản Phẩm</h1>
    <form action="<?=BASE_URL?>/product/insert_product" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="" class="form-label">Tên Sản Phẩm</label>
        <input type="text" name="title_product" class="form-control">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Ảnh Sản Phẩm</label>
        <input type="file" name="image_product" class="form-control">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Giá Sản Phẩm</label>
        <input type="number" name="price_product" class="form-control">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Số lượng Sản Phẩm</label>
        <input type="number" name="quanlity_product" class="form-control">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Mô tả </label>
        <textarea name="desc_product" rows="5" style="resize: none;" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Danh mục sản phẩm </label>
        <select class="form-control"name="category_product"  >
           <?php 
                foreach ($category as $key => $cate) {
            ?>
            <option value="<?=$cate['id_category_product']?>"><?=$cate['title_category_product']?></option>
            <?php }?>
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">sản phẩm Hot </label>
        <select class="form-control"name="product_hot"  >
            <option value="0">Không</option>
            <option value="1">Có</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Thêm Sản Phẩm </button>
    </form>
</div>