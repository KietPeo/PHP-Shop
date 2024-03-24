<!DOCTYPE html>
<html lang="en-CA">

<head>
    <title>Truong Gia Kiet</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="cleartype" content="on" />
    <link rel="icon" href="template/Default/img/favicon.ico" type="image/x-icon" />
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />
    <!--rieng-->
    <meta property='og:title' name="title" content='' />
    <meta property='og:url' content='' />
    <meta property='og:image' content='' />
    <meta property='og:description' itemprop='description' name="description" content='' />
    <!--rieng-->
    <!--tkw-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta property="og:type" content="article" />
    <meta property="article:section" content="" />
    <meta property="og:site_name" content='' />
    <meta property="article:publisher" content="" />
    <meta property="article:author" content="" />
    <meta property="fb:app_id" content="1639622432921466" />
    <meta vary="User-Agent" />
    <meta name="geo.region" content="VN-SG" />
    <meta name="geo.placename" content="Ho Chi Minh City" />
    <meta name="geo.position" content="10.823099;106.629664" />
    <meta name="ICBM" content="10.823099, 106.629664" />
    <link rel="icon" type="image/png" href="template/Default/img/favicon.png">
    <!--tkw-->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/public/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/public/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/font-awesome.min.css" type="text/css" />

    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/public/css/product.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer type="text/javascript" src="<?= BASE_URL ?>/public/js/jquery.avatarme-1.0.min.js"></script>
    <script defer src="<?= BASE_URL ?>/public/js/jquery.scrollto.js"></script>
</head>

<body>

    <header>
        <div class="header_top_menu">
            <div class="header_top_menu_all">
                <div class="header_top" style="background-color:blanchedalmond">
                    <div class="bg_in">
                        <div class="logo">
                            <a href="<?= BASE_URL ?>"><img src="<?= BASE_URL ?>/public/images/logohere.jpeg" width="250" height="90" alt="logohere.jpeg" /></a>
                        </div>
                        <nav class="menu_top">
                            <form style="margin-top: 10px ; margin-left:  40px;" class="search_form" method="get" action="<?=BASE_URL?>/sanpham/timkiem">
                                <input class="searchTerm" name="search" placeholder="Nhập từ cần tìm..." required />
                                <button class="searchButton" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </nav>
                        <div class="cart_wrapper">
                            <div class="cols_50">
                                <ul style="margin-top: 15px; margin-left:50px">
                                    <?php if (!isset($_SESSION['customer'])) { ?> 
                                        <li class=''><a href='<?= BASE_URL ?>/user/dangnhap' style="font-size: 18px" >Đăng Nhập</a></li>
                                    <?php } else { ?>
                                        <form autocomplete="off" name="FormDatHang" method="post" action="<?= BASE_URL ?>/user/change">
                                            <input type="hidden" id="selected_option" name="selected_option" value="">
                                            <li class=''>
                                                <label for="user_options">Xin Chào <?= $_SESSION['custumer_name'] ?></label>
                                                <select id="user_options" onchange="handleUserOption()">
                                                    <option value="" disabled selected hidden>Chọn tùy chọn</option>
                                                    <option value="0">Trang Profile</option>
                                                    <option value="1">Thay Đổi Mật Khẩu</option>
                                                </select>
                                                <a href="<?= BASE_URL ?>/user/dangxuat">Đăng Xuất</a>
                                            </li>
                                        </form>

                                        <script>
                                            function handleUserOption() {
                                                var selectedOption = document.getElementById("user_options").value;
                                                document.getElementById("selected_option").value = selectedOption;
                                                // Gửi form
                                                document.forms["FormDatHang"].submit();
                                            }
                                        </script>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="btn_menu_search">
                <div class="bg_in">
                    <div class="table_row_search">
                        <div class="menu_top_cate">
                            <div class="">
                                <div class="menu" id="menu_cate">
                                    <div class="menu_left">
                                        <i class="fa fa-bars" aria-hidden="true"></i> Danh mục sản phẩm
                                    </div>
                                    <div class="cate_pro">
                                        <div id='cssmenu_flyout' class="display_destop_menu">
                                            <ul>
                                                <?php
                                                foreach ($category as $key => $cate) {
                                                ?>
                                                    <li class='active has-sub'>
                                                        <a href='<?= BASE_URL ?>/sanpham/danhmuc/<?= $cate['id_category_product'] ?>'>
                                                            <span><?= $cate['title_category_product'] ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="search_top">
                            <div id='cssmenu'>
                                <ul>
                                    <li class='active'><a href='<?= BASE_URL ?>'>Trang chủ</a></li>
                                    <li class=''><a href='<?= BASE_URL ?>/index/lienhe'>Giới thiệu</a></li>

                                    <li class=''><a href='<?= BASE_URL ?>/sanpham/tatca'>Sản Phẩm</a>
                                        <ul>
                                            <?php
                                            foreach ($category as $key => $cate) {
                                            ?>
                                                <li class='active has-sub'>
                                                    <a href='<?= BASE_URL ?>/sanpham/danhmuc/<?= $cate['id_category_product'] ?>'>
                                                        <span>
                                                            <?= $cate['title_category_product'] ?>
                                                        </span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </li>

                                    <li class=''><a href='<?= BASE_URL ?>/tintuc/tatca'>Tin tức</a>
                                        <ul>
                                            <?php
                                            foreach ($category_post as $key => $cate_post) {
                                            ?>
                                                <li class='active has-sub'>
                                                    <a href='<?= BASE_URL ?>/tintuc/danhmuc/<?= $cate_post['id_category_post'] ?>'>
                                                        <span><?= $cate_post['title_category_post'] ?></span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li class=''><a href='<?= BASE_URL ?>/giohang'>Giỏ hàng</a></li>
                                    <li class=''><a href='<?= BASE_URL ?>/index/lienhe'>Liên Hệ</a></li>
                                    <?php if (isset($_SESSION['customer'])) { ?>
                                        <li class=''><a href='<?= BASE_URL ?>/giohang/donhang'>Đơn hàng</a></li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </header>
    <div class="clear"></div>