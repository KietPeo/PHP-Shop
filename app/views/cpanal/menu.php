<nav class="navbar navbar-expand-lg navbar-light " style="background:gray;">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= BASE_URL ?>/login/dashboard">ADMIN</a>
        <a class="navbar-brand" href="<?= BASE_URL ?>/login/logout">Đăng xuất</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav" style="font-size: 17px;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Danh Mục Bài Viết
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>/post">Thêm</a></li>
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>/post/list_category">Danh Sách</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Bài viết
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>/post/add_post">Thêm</a></li>
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>/post/list_post">Danh Sách</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Danh Mục Sản Phẩm
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>/product">Thêm</a></li>
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>/product/list_category">Danh Sách</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sản phẩm
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>/product/add_product">Thêm</a></li>
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>/product/list_product">Danh Sách</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Đơn Hàng
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>/order">Danh Sách</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>