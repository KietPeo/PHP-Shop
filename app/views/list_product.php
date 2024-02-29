<section>
   <div class="bg_in">
      <div class="breadcrumbs">
         <ol itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
               <a itemprop="item" href=".">
                  <span itemprop="name">Trang chủ</span></a>
               <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
               <a itemprop="item" href="sanpham.php">
                  <span itemprop="name">Tất cả sản phẩm</span></a>
               <meta itemprop="position" content="2" />
            </li>
         </ol>
      </div>
      <div class="module_pro_all">
         <div class="box-title">
            <div class="title-bar">
               <h1>Tất cả sản phẩm</h1>
            </div>
         </div>
         <div class="pro_all_gird">
            <div class="girds_all list_all_other_page ">
               <?php
               foreach ($list_product as $key => $product) {
               ?>
                  <form action="<?= BASE_URL ?>/giohang/themgiohang" method="post">
                     <div class="grids grids-list-product">
                        <div class="grids_in">
                           <div class="content">
                              <div class="img-right-pro">

                                 <a href="sanpham.php">
                                    <img class="lazy img-pro content-image" src="<?= BASE_URL ?>/public/uploads/product/<?= $product['image_product'] ?>" data-original="image/iphone.png" alt="Máy in Canon MF229DW" />
                                 </a>

                                 <div class="content-overlay"></div>
                              </div>
                              <div class="name-pro-right">
                                 <a href="<?= BASE_URL ?>/sanpham/chitietsanpham/<?= $product['id_product'] ?>">
                                    <?= $product['title_product'] ?>
                                 </a>
                              </div>
                              <div>
                                 <input type="submit" style="box-shadow: none;" class="btn btn-info btn-md" name="addcart" value="Đặt Hàng" id="">
                              </div>
                              <div class="price_old_new">
                                 <div class="price">
                                    <span class="news_price"><?= number_format($product['price_product'], 0, ',', '.') . "đ" ?></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               <?php } ?>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>


</section>