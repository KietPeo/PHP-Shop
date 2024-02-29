<section style="background-color: whitesmoke;">
   <div class="bg_in">
      <div class="module_pro_all">
         <div class="box-title">
            <div class="title-bar">
               <h1>Sản phẩm HOT</h1>
               <a class="read_more" href="<?= BASE_URL ?>/sanpham/sanphamhot">
                  Xem thêm
               </a>
            </div>
         </div>
         <div class="pro_all_gird">
            <div class="girds_all list_all_other_page ">
               <?php
               foreach ($product_home as $key => $product) {
                  if ($product['product_hot'] == 1) {
               ?>
                     <form action="<?= BASE_URL ?>/giohang/themgiohang" method="post">
                        <input type="hidden" value="<?= $product['id_product'] ?>" name="product_id">
                        <input type="hidden" value="<?= $product['title_product'] ?>" name="product_title">
                        <input type="hidden" value="<?= $product['image_product'] ?>" name="product_image">
                        <input type="hidden" value="<?= $product['price_product'] ?>" name="product_price">
                        <input type="hidden" value="1" name="product_quanlity">
                        <div class="grids">
                           <div class="grids_in">
                              <div class="content">
                                 <div class="img-right-pro">
                                    <a href="sanpham.php">
                                       <img class="lazy img-pro content-image" src="<?= BASE_URL ?>/public/uploads/product/<?= $product['image_product'] ?>" data-original="image/iphone.png" alt="<?= $product['title_product'] ?>" />
                                    </a>
                                    <div class="content-overlay"></div>
                                    <div class="content-details fadeIn-top">
                                    </div>
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
               <?php
                  }
               }
               ?>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>

      <div class="module_pro_all">
         <div class="box-title">
            <div class="title-bar">
               <h1>Sản phẩm mới nhất</h1>
               <a class="read_more" href="<?= BASE_URL ?>/sanpham/sanphammoi">
                  Xem them
               </a>
            </div>
         </div>
         <div class="pro_all_gird">
            <div class="girds_all list_all_other_page ">
               <?php
               foreach ($product_new as $key => $new) {
               ?>
                  <form action="<?= BASE_URL ?>/giohang/themgiohang" method="post">
                     <input type="hidden" value="<?= $new['id_product'] ?>" name="product_id">
                     <input type="hidden" value="<?= $new['title_product'] ?>" name="product_title">
                     <input type="hidden" value="<?= $new['image_product'] ?>" name="product_image">
                     <input type="hidden" value="<?= $new['price_product'] ?>" name="product_price">
                     <input type="hidden" value="1" name="product_quanlity">
                     <div class="grids">
                        <div class="grids_in">
                           <div class="content">
                              <div class="img-right-pro">
                                 <a href="<?= BASE_URL ?>">
                                    <img class="lazy img-pro content-image" src="<?= BASE_URL ?>/public/uploads/product/<?= $new['image_product'] ?>" />
                                 </a>
                                 <div class="content-overlay"></div>
                                 <div class="content-details fadeIn-top">
                                 </div>
                              </div>
                              <div class="name-pro-right">
                                 <a href='<?= BASE_URL ?>/sanpham/chitietsanpham/<?= $new['id_product'] ?>'>
                                    <h3><?= $new['title_product'] ?></h3>
                                 </a>
                              </div>
                              <div>
                                 <input type="submit" style="box-shadow: none;" class="btn btn-info btn-md" name="addcart" value="Đặt Hàng" id="">
                              </div>
                              <div class="price_old_new">
                                 <div class="price">
                                    <span class="news_price"><?= number_format($new['price_product'], 0, ',', '.') . "đ" ?></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               <?php
               }
               ?>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
         <div class="module_pro_all">
            <div class="box-title">
               <div class="title-bar">
                  <h1>Sản phẩm Giá Tăng dần</h1>
                  <a class="read_more" href="<?= BASE_URL ?>/sanpham/sanphammoi">
                     Xem them
                  </a>
               </div>
            </div>
            <div class="pro_all_gird">
               <div class="girds_all list_all_other_page ">
                  <?php
                  foreach ($product_up as $key => $up) {
                  ?>
                     <form action="<?= BASE_URL ?>/giohang/themgiohang" method="post">
                        <input type="hidden" value="<?= $up['id_product'] ?>" name="product_id">
                        <input type="hidden" value="<?= $up['title_product'] ?>" name="product_title">
                        <input type="hidden" value="<?= $up['image_product'] ?>" name="product_image">
                        <input type="hidden" value="<?= $up['price_product'] ?>" name="product_price">
                        <input type="hidden" value="1" name="product_quanlity">
                        <div class="grids">
                           <div class="grids_in">
                              <div class="content">
                                 <div class="img-right-pro">
                                    <a href="<?= BASE_URL ?>">
                                       <img class="lazy img-pro content-image" src="<?= BASE_URL ?>/public/uploads/product/<?= $up['image_product'] ?>" />
                                    </a>
                                    <div class="content-overlay"></div>
                                    <div class="content-details fadeIn-top">
                                    </div>
                                 </div>
                                 <div class="name-pro-right">
                                    <a href='<?= BASE_URL ?>/sanpham/chitietsanpham/<?= $up['id_product'] ?>'>
                                       <h3><?= $up['title_product'] ?></h3>
                                    </a>
                                 </div>
                                 <div>
                                    <input type="submit" style="box-shadow: none;" class="btn btn-info btn-md" name="addcart" value="Đặt Hàng" id="">
                                 </div>
                                 <div class="price_old_new">
                                    <div class="price">
                                       <span class="news_price"><?= number_format($up['price_product'], 0, ',', '.') . "đ" ?></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  <?php
                  }
                  ?>
                  <div class="clear"></div>
               </div>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
         <!--  -->
         <div class="module_pro_all">
            <div class="box-title">
               <div class="title-bar">
                  <h1>Sản phẩm Giá giảm dần</h1>
                  <a class="read_more" href="<?= BASE_URL ?>/sanpham/sanphammoi">
                     Xem them
                  </a>
               </div>
            </div>
            <div class="pro_all_gird">
               <div class="girds_all list_all_other_page ">
                  <?php
                  foreach ($product_down as $key => $down) {
                  ?>
                     <form action="<?= BASE_URL ?>/giohang/themgiohang" method="post">
                        <input type="hidden" value="<?= $down['id_product'] ?>" name="product_id">
                        <input type="hidden" value="<?= $down['title_product'] ?>" name="product_title">
                        <input type="hidden" value="<?= $down['image_product'] ?>" name="product_image">
                        <input type="hidden" value="<?= $down['price_product'] ?>" name="product_price">
                        <input type="hidden" value="1" name="product_quanlity">
                        <div class="grids">
                           <div class="grids_in">
                              <div class="content">
                                 <div class="img-right-pro">
                                    <a href="<?= BASE_URL ?>">
                                       <img class="lazy img-pro content-image" src="<?= BASE_URL ?>/public/uploads/product/<?= $down['image_product'] ?>" />
                                    </a>
                                    <div class="content-overlay"></div>
                                    <div class="content-details fadeIn-top">
                                    </div>
                                 </div>
                                 <div class="name-pro-right">
                                    <a href='<?= BASE_URL ?>/sanpham/chitietsanpham/<?= $down['id_product'] ?>'>
                                       <h3><?= $down['title_product'] ?></h3>
                                    </a>
                                 </div>
                                 <div>
                                    <input type="submit" style="box-shadow: none;" class="btn btn-info btn-md" name="addcart" value="Đặt Hàng" id="">
                                 </div>
                                 <div class="price_old_new">
                                    <div class="price">
                                       <span class="news_price"><?= number_format($down['price_product'], 0, ',', '.') . "đ" ?></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  <?php
                  }
                  ?>
                  <div class="clear"></div>
               </div>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>

</section>
<div class="clear"></div>