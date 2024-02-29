<section>
         <div class="bg_in">
            <div class="wrapper_all_main">
               <div class="wrapper_all_main_right">
                  <!--breadcrumbs-->
                  <div class="breadcrumbs">
                     <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope
                           itemtype="http://schema.org/ListItem">
                           <a itemprop="item" href=".">
                           <span itemprop="name">Trang chủ</span></a>
                           <meta itemprop="position" content="1" />
                        </li>
                        <li itemprop="itemListElement" itemscope
                           itemtype="http://schema.org/ListItem">
                           <span itemprop="item">
                           <strong itemprop="name">
                          Tất cả tin tức
                           </strong>  
                           </span>
                           <meta itemprop="position" content="2" />
                        </li>
                     </ol>
                  </div>
                  <!--breadcrumbs-->
                  <div class="content_page">
                     <div class="box-title">
                        <div class="title-bar">
                           <h1>Tin tức</h1>
                        </div>
                     </div>
                     <div class="content_text">
                        <ul class="list_ul">
                           <?php
                            foreach ($list_post as $key => $post) {
                               ?>
                               <li class="lists">
                                 <div class="img-list">
                                    <a href="<?=BASE_URL?>/tintuc/chitiettin/1">
                                    <img src="<?=BASE_URL?>/public/uploads/post/<?=$post['image_post']?>" data-original="image/iphone.png" 
                                    alt="<?=$post['title_post']?>" class="img-list-in">
                                    </a>
                                 </div>
                                 <div class="content-list">
                                    <div class="content-list_inm">
                                       <div class="title-list">
                                          <h3>
                                             <a href="<?=BASE_URL?>/tintuc/chitiettin/1"><?=$post['title_post']?></a>
                                          </h3>
                                          
                                       </div>
                                       <div class="content-list-in">
                                          <p><?=$post['content_post']?></p>
                                       </div>
                                       <div class="xt"><a href="<?=BASE_URL?>/tintuc/chitiettin/1">Xem thêm</a></div>
                                    </div>
                                 </div>
                                 <div class="clear"></div>
                              </li>
                           <?php }?>
                        </ul>
                        <div class="clear"></div>
                        <div class="wp_page">
                           <div class="page">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
      </section>