<?php
foreach ($details_product as $key => $value) {
   $name_product = $value['title_product'];
   $name_catgory_product = $value['title_category_product'];
   $id_cate = $value['id_category_product'];
}



?>

<section>
   <?php
   foreach ($details_product as $key => $details) {
   ?>
      <div class="bg_in">
         <div class="wrapper_all_main">
            <div class="wrapper_all_main_right no-padding-left" style="width:100%;">
               <div class="breadcrumbs">
                  <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                     <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?= BASE_URL ?>">
                           <span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1" />
                     </li>
                     <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?= BASE_URL ?>/sanpham/danhmuc/<?= $id_cate ?>">
                           <span itemprop="name"><?= $name_catgory_product ?></span></a>
                        <meta itemprop="position" content="2" />
                     </li>
                     <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <span itemprop="item">
                           <strong itemprop="name">
                              <?= $name_product ?>
                           </strong>
                        </span>
                        <meta itemprop="position" content="3" />
                     </li>
                  </ol>
               </div>
               <div class="content_page">
                  <div class="content-right-items margin0">
                     <div class="title-pro-des-ct">
                        <h1> <?= $name_product ?></h1>
                     </div>
                     <div class="slider-galery ">
                        <div id="sync1" class="owl-carousel owl-theme">
                           <div class="item">
                              <img src="<?= BASE_URL ?>/public/uploads/product/<?= $details['image_product'] ?>" width="100%">
                           </div>
                        </div>
                        <div id="sync2" class="owl-carousel owl-theme">
                           <div class="item">
                              <img src="<?= BASE_URL ?>/public/uploads/product/<?= $details['image_product'] ?>" width="100%">
                           </div>
                        </div>
                     </div>
                     <div class="content-des-pro">
                        <form action="<?= BASE_URL ?>/giohang/themgiohang" method="post">
                           <input type="hidden" value="<?= $details['id_product'] ?>" name="product_id">
                           <input type="hidden" value="<?= $details['title_product'] ?>" name="product_title">
                           <input type="hidden" value="<?= $details['image_product'] ?>" name="product_image">
                           <input type="hidden" value="<?= $details['price_product'] ?>" name="product_price">
                           <!-- <input type="hidden" value="1" name="product_quanlity"> -->

                           <div class="content-des-pro_in">
                              <div class="pro-des-sum">
                                 <div class="price">

                                    <div class="status_pro">
                                       <span><b>Trạng thái:</b><?= $details["quanlity_product"] > 0 ? "Còn Hàng " : 'Hết Hàng' ?></span>
                                    </div>
                                    <!-- Hiển thị các size -->
                                 </div>
                                 <div class="color_price">
                                    <span class="title_price bg_green">Giá </span>
                                    <?= number_format($details['price_product'], 0, ',', '.') . "đ" ?>
                                    <span>vnđ</span>
                                    <div class="clear"></div>
                                 </div>
                              </div>
                              <div class="clear"></div>
                           </div>
                           <div class="content-pro-des">
                              <h3 style="text-align: center;">Mô tả ngắn </h3>
                              <div class="content_des">
                                 <?= $details['desc_product'] ?>
                              </div>
                           </div>
                           <div class="ct">
                              <div class="number_price">
                                 <div class="custom pull-left">
                                    <button onclick="var result = document.getElementById('qty'); var qty = result.value; if(!isNaN(qty) && qty > 0) result.value--; return false;" class="reduced items-count" type="button">-</button>
                                    <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="product_quanlity">
                                    <button onclick="var result = document.getElementById('qty'); var qty = result.value; if(!isNaN(qty)) result.value++; return false;" class="increase items-count" type="button">+</button>
                                    <div class="clear"></div>
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <div class="wp_a">
                                 <?php
                                 if ($details["quanlity_product"] > 0) {
                                 ?>
                                    <input type="submit" style="box-shadow: none;" class="btn btn-info btn-md" name="addcart" value="Mua hàng" id="">
                                 <?php
                                 } else {

                                 ?>
                                    <input type="submit" style="box-shadow: none;" disabled class="btn btn-info btn-md" name="addcart" value="Mua hàng" id="">

                                 <?php
                                 }
                                 ?>

                                 <div class="clear"></div>
                              </div>
                              <div class="clear"></div>
                           </div>

                        </form>
                     </div>
                     <div class="content-des-pro-suport">
                        <div class="box-setup">
                           <div class="title-setup">
                              <i class="fa fa-tasks" aria-hidden="true"></i> Dịch vụ &amp; Chú ý
                           </div>
                           <div class="info-setup">
                              <div class="row-setup">
                                 <p style="text-align:justify">Quý khách vui lòng liên hệ với nhân viên bán hàng theo số điện thoại Hotline sau :</p>
                                 <p><span style="color:#d50100">0932 023 992</span>&nbsp;để biết thêm chi tiết về Phụ kiện sản phẩm.</p>
                              </div>
                           </div>
                        </div>
                        <div class="info-prod prod-price freeship">
                           <span class="title">
                              <p>
                              </p>
                           </span>
                           <span class="row more"><a href="" title="">Xem thêm</a>
                           </span>
                        </div>
                        <div class="bx-contact">
                           <span class="title-cnt">Bạn cần hỗ trợ?</span>
                           <p>Chat với chúng tôi :</p>
                           <p><img alt="icon skype " src="image/icon skype.png" style="height:24px; width:24px" />&nbsp;<a href="skype:quangtran.123corp?chat">thietbivanphong.com</a></p>
                           <p><img alt="icon skype " src="image/icon skype.png" style="height:24px; width:24px" />&nbsp;<a href="skype:quangtran.123corp?chat">thietbivanphong.com</a></p>
                           <p><img alt="icon skype " src="image/icon skype.png" style="height:24px; width:24px" />&nbsp;<a href="skype:quangtran.123corp?chat">thietbivanphong.com</a></p>
                        </div>
                     </div>
                     <div class="clear"></div>
                  </div>
               </div>
            </div>
            <div class="wrapper_all_main_right">
               <div class="clear"></div>
               <div class="clear"></div>
            <?php } ?>

            <?php foreach ($data['cmt'] as $key => $comment) : ?>
               <div class="comment">
                  <p><strong>Người dùng:</strong> <?= $comment['custumer_id'] ?></p>
                  <p><strong>Nội dung bình luận:</strong> <?= $comment['content'] ?></p>
               </div>
               <hr>
            <?php endforeach; ?>

            <!-- Form để thêm bình luận mới -->
            <form action="<?= BASE_URL ?>/sanpham/luuBinhLuan/<?= $details['id_product'] ?>" method="POST">
               <?php if (isset($_SESSION['customer'])) : ?>
                  <input type="hidden" name="product_id" value="<?= $details['id_product'] ?>">
                  <input type="hidden" name="custumer" value="<?= $_SESSION['custumer_name'] ?>">
                  <label for="cmt-info">Nhập bình luận của bạn:</label>
                  <textarea name="cmt-info" id="cmt-info" cols="30" rows="5" required></textarea>
                  <button type="submit" class="btn btn-info">Gửi</button>
               <?php else : ?>
                  <p>Bạn cần đăng nhập để bình luận.</p>
               <?php endif; ?>
            </form>


            </div>
            <!--end:left-->
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>
      <script>
         jQuery(document).ready(function() {



            var div_fixed = jQuery('.product_detail_info').offset().top;

            jQuery(window).scroll(function() {

               if (jQuery(window).scrollTop() > div_fixed) {

                  jQuery('.tabs-animation').addClass('fix_top');

               } else {

                  jQuery('.tabs-animation').removeClass('fix_top');

               }

            });

            jQuery(window).load(function() {

               if (jQuery(window).scrollTop() > div_fixed) {

                  jQuery('.tabs-animation').addClass('fix_top');

               }

            });

         });
      </script>
</section>