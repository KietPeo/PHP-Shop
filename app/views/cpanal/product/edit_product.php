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
    foreach ($productbyid as $key => $pro) {
        echo $pro['id_product'];
?>    
    <h1 style="text-align: center;" >Cập nhật Sản Phẩm</h1>
    <form action="<?=BASE_URL?>/product/update_product/<?=$pro['id_product']?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="" class="form-label">Tên Sản Phẩm</label>
        <input type="text" value="<?=$pro['title_product']?>" name="title_product" class="form-control">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Ảnh Sản Phẩm</label>
        <input type="file" value="<?=$pro['image_product']?>" name="image_product" class="form-control">
        <p><img src="<?=BASE_URL?>/public/uploads/product/<?=$pro['image_product']?>" height="100px" width="100px"></p>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Giá Sản Phẩm</label>
        <input type="number" value="<?=$pro['price_product']?>" name="price_product" class="form-control">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Số lượng Sản Phẩm</label>
        <input type="number" value="<?=$pro['quanlity_product']?>" name="quanlity_product" class="form-control">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Mô tả </label>
        <textarea value="<?=$pro['desc_product']?>" name="desc_product" rows="5" style="resize: none;" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Danh mục sản phẩm </label>
        <select class="form-control"name="category_product"  >
           <?php 
                foreach ($category as $key => $cate) {
            ?>
           <option <?php if ($pro['id_category_product'] == $cate['id_category_product']) {
                echo 'selected';} ?> value="<?php echo $cate['id_category_product'] ?>">
                <?=$cate['title_category_product']?>
            </option>
            
            
            <?php }?>
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">sản phẩm Hot</label>
        <select class="form-control"name="product_hot"  >
            <?php 
                if($pro['product_hot']==0){
            ?>
            <option selected value="0">Không</option>
            <option value="1">có</option>
            <?php
                }else{
            ?>
                <option value="0">Không</option>
            <option selected value="1">có</option>
            <?php
                }
            ?>
            
        </select>
    </div>
        <button type="submit" class="btn btn-primary">cập nhật Sản Phẩm </button>
    </form>
    <?php }?>
</div>