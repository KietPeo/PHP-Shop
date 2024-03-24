<section>
    <div class="bg_in">
        <div class="wrapper_all_main">
            <div class="wrapper_all_main_right">
                <!--breadcrumbs-->
                <div class="breadcrumbs">
                    <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href=".">
                                <span itemprop="name">Trang chủ</span></a>
                            <meta itemprop="position" content="1" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <span itemprop="item">
                                <strong itemprop="name">
                                    Tìm kiếm
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
                            <h1>Tìm kiếm</h1>
                        </div>
                    </div>
                    <div class="content_text">
                        <?php if (!empty($search)) { ?>
                            <ul class="list_ul">
                                <?php foreach ($search as $value) {
                                ?>

                                    <li class="lists">
                                        <div class="img-list">
                                            <a href="<?= BASE_URL ?>/sanpham/chitietsanpham/<?= $value['id_product'] ?>">
                                                <img src="<?= BASE_URL ?>/public/uploads/product/<?= $value['image_product'] ?>" data-original="<?= BASE_URL ?>/image/iphone.png" alt="<?= $value['title_product'] ?>" class="img-list-in">
                                            </a>
                                        </div>
                                        <div class="content-list">
                                            <div class="content-list_inm">
                                                <div class="title-list">
                                                    <h3>
                                                        <a href="<?= BASE_URL ?>/sanpham/chitietsanpham/<?= $value['id_product'] ?>"><?= $value['title_product'] ?></a>
                                                    </h3>
                                                </div>
                                                <div class="content-list-in">
                                                </div>
                                                <div class="xt"><a href="<?= BASE_URL ?>/sanpham/chitietsanpham/<?= $value['id_product'] ?>">Xem thêm</a></div>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } else{ ?>
                            <p>Không tìm thấy kết quả phù hợp.</p>
                            <?php }?>
                        <div class="clear"></div>
                        <div class="wp_page">
                            <div class="page">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>