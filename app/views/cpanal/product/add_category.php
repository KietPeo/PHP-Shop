<?php 
if (!empty($_GET['msg'])) {
    $msg=unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo "<span style='color:blue;font-weight:bold'>$value</span>";
    }
}
?>
<div class="col-md-12" style="font-size: medium;">
    <h1 style="text-align: center;" >Thêm Danh Mục Sản Phẩm</h1>
    <form action="<?=BASE_URL?>/product/insert_category" method="post">
    <div class="mb-3">
        <label for="" class="form-label">Tên Danh Mục</label>
        <input type="text" name="title_category_product" class="form-control" id="" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Miêu tả </label>
        <input type="text"name="desc_category_product" class="form-control" id="">
    </div>
    <button type="submit" class="btn btn-primary">Thêm </button>
    </form>
</div>