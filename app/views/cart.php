<?php
if (!isset($_SESSION['shopping_cart']) || count($_SESSION['shopping_cart']) === 0) {
   $disableSubmit = true; // Thiết lập biến disableSubmit thành true để ẩn nút "Gửi đơn hàng"
} else {
   $disableSubmit = false; // Nếu giỏ hàng tồn tại và có sản phẩm, cho phép hiển thị nút "Gửi đơn hàng"
}
?>
<section>
   <div class="bg_in">
      <div class="content_page cart_page">
         <div class="breadcrumbs">
            <ol itemscope itemtype="http://schema.org/BreadcrumbList">
               <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                  <a itemprop="item" href="<?= BASE_URL ?>">
                     <span itemprop="name">Trang chủ</span></a>
                  <meta itemprop="position" content="1" />
               </li>
               <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                  <span itemprop="item">
                     <strong itemprop="name">
                        Giỏ hàng
                     </strong>
                  </span>
                  <meta itemprop="position" content="2" />
               </li>
            </ol>
         </div>
         <div class="box-title">
            <div class="title-bar">
               <h1>Giỏ hàng của bạn</h1>
            </div>
         </div>

         <div class="content_text">
            <div class="container_table">
               <table class="table table-hover table-condensed">
                  <thead>
                     <tr class="tr tr_first">
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <!-- <th>Mã sản phẩm</th> -->
                        <th>Giá</th>
                        <th style="width:100px;">Số lượng</th>
                        <th>Thành tiền</th>
                        <th style="width:50px; text-align:center;"></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     if (isset($_SESSION['shopping_cart'])) {
                        // var_dump($_SESSION['shopping_cart']) 
                     ?>
                        <form action='<?php echo BASE_URL ?>/giohang/updategiohang' method="POST">
                           <?php
                           $total = 0;
                           foreach ($_SESSION['shopping_cart'] as $key => $value) {
                              $subtotal = $value['product_quanlity'] * $value['product_price'];
                              $total += $subtotal;
                           ?>
                              <tr class="tr">
                                 <td data-th="Hình ảnh">
                                    <div class="col_table_image col_table_hidden-xs">
                                       <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $value['product_image'] ?>" alt="" class="img-responsive" />
                                    </div>
                                 </td>
                                 <td data-th="Sản phẩm">
                                    <div class="col_table_name">
                                       <h4 class="nomargin"><?php echo $value['product_title'] ?></h4>
                                    </div>
                                 </td>

                                 <td data-th="Giá"><span class="color_red font_money">
                                       <?php echo number_format($value['product_price'], 0, ',', '.') . 'đ' ?>
                                    </span></td>
                                 <td data-th="Số lượng">
                                    <div class="clear margintop5">
                                       <div class="floatleft">
                                          <input type="number" min="1" class="inputsoluong" name="qty[<?php echo $value['product_id'] ?>]" value="<?php echo $value['product_quanlity'] ?>">
                                       </div>


                                    </div>
                                    <div class="clear"></div>
                                 </td>
                                 <td data-th="Thành tiền" class="text_center"><span class="color_red font_money">
                                       <?php echo number_format($subtotal, 0, ',', '.') . 'đ' ?>
                                    </span></td>
                                 <td class="actions aligncenter">
                                    <button type="submit" style="box-shadow: none;" name="delete_cart" value="<?php echo $value['product_id'] ?>" class="btn btn-danger  btn-custom-size">Xóa</button>
                                 </td>
                              </tr>

                           <?php }
                           ?>
                           <tr>
                              <td colspan="7" class="textright_text">
                                 <div class="sum_price_all">
                                    <button type="submit" style="box-shadow: none;margin-left: 1050px; margin-bottom: 5px; " name="update_cart" value="<?php echo $value['product_id'] ?>" class="btn btn-success btn-custom-size">Update</button>
                                    <span class="text_price">Tổng tiền thành toán</span>:
                                    <span class="text_price color_red"><?php echo number_format($total, 0, ',', '.') . 'đ' ?></span>
                                 </div>
                              </td>
                           </tr>
                        </form>

                     <?php } else {
                     ?>
                        <tr>
                           <td colspan="7" class="text-danger">
                              <div class="sum_price_all">
                                 <span class="text_price">Giỏ hàng trống !</span>
                              </div>
                           </td>
                        </tr>
                     <?php } ?>

                  </tbody>
                  <tfoot>
                     <tr class="tr_last">
                        <td colspan="7">
                           <a href="." class="btn_df btn_table floatleft"><i class="fa fa-long-arrow-left"></i> Tiếp tục mua hàng</a>
                           <div class="clear"></div>
                        </td>
                     </tr>
                  </tfoot>

               </table>
            </div>
            <div class="contact_form">
               <div class="contact_left">
                  <div class="ch-contacts-details">
                     <ul class="contact-list">
                        <li class="addr">
                           <strong class="title">Địa chỉ của chúng tôi</strong>
                           <p><em><strong>3tmobile</strong></em><br />
                           <p>Trung Tâm Bán Hàng:</p>
                           <p>CN1: 333B Minh Phụng, Phường 2, Quận 11, HCM</p>
                           <p>CN2: 548 Lý Thái Tổ, Phường 10, Quận 10, HCM</p>
                           <p>N3: 297 Quang Trung, Phường 10, Q. Gò Vấp, HCM</p>
                           <p> CN4: 72 Đinh Tiên Hoàng, Phường 01, Q. Bình Thạnh, HCM</p>
                           <p> Hotline: 0888 70 8284 - 0936 11 7080 (zalo)</p>
                           </p>
                        </li>
                     </ul>
                     <div class="hiring-box">
                        <strong class="title">Chào bạn!</strong>
                        <p>Mọi thắc mắc bạn hãy gửi về mail của chúng tôi <strong>3tmobile@webextrasite.com</strong> chúng tôi sẽ giải đáp cho bạn.</p>
                        <p><a href="." class="arrow-link"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Về trang chủ</a></p>
                     </div>
                  </div>
               </div>
               <div class="contact_right">
                  <div class="form_contact_in">
                     <div class="box_contact">
                        <form name="FormDatHang" autocomplete="off" method="post" action="<?= BASE_URL ?>/giohang/dathang">
                           <div class="content-box_contact">
                              <div class="row">
                                 <div class="container">
                                    <label for="name">Họ và tên: <span style="color:red;">*</span></label>
                                    <input type="text" name="name" required class="clsip" value="<?= isset($_SESSION['custumer_name']) ? $_SESSION['custumer_name'] : '' ?>">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row">
                                 <div class="container">
                                    <label for="sdt">Số điện thoại: <span style="color:red;">*</span></label>
                                    <input type="text" name="sdt" required onkeydown="return checkIt(event)" class="clsip" value="<?= isset($_SESSION['custumer_phone']) ? $_SESSION['custumer_phone'] : '' ?>">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row">
                                 <div class="container">
                                    <label for="diachi">Địa chỉ: <span style="color:red;">*</span></label>
                                    <input type="text" name="diachi" required class="clsip" value="<?= isset($_SESSION['custumer_address']) ? $_SESSION['custumer_address'] : '' ?>">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row">
                                 <div class="container">
                                    <label for="email">Email: <span style="color:red;">*</span></label>
                                    <input type="text" name="email" onchange="return KiemTraEmail(this);" required class="clsip" value="<?= isset($_SESSION['custumer_email']) ? $_SESSION['custumer_email'] : '' ?>">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row">
                                 <div class="container">
                                    <label for="noidung">Nội dung: <span style="color:red;">*</span></label>
                                    <textarea type="text" name="noidung" class="clsipa"></textarea>
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="row btnclass">
                                 <div class="container">
                                    <?php if (!$disableSubmit) { ?> <!-- Kiểm tra nếu không cần ẩn nút "Gửi đơn hàng" -->
                                       <input type="submit" class="btn-gui" name="" id="" value="Gửi đơn hàng">
                                    <?php } ?>
                                    <input type="reset" class="btn-gui" value="Nhập lại">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                              <!---row---->
                              <div class="clear"></div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="clear"></div>