<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/admin">Trang Quản Lý</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/index.php" target="_blank">Xem Trang</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sản phẩm
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?option=product">Tất cả sản phẩm</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?option=category">Danh mục sản phẩm</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bài viết
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?option=post">Tất cả bài viết</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?option=topic">Chủ đề</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?option=menu">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?option=order">Đơn hàng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?option=contact">Liên hệ</a>
            </li>
        </ul>
        <ul class="user">
            <li><a href="#"><i class="fas fa-user "></i> <?php echo $_SESSION['user_fullname'];?></a> </li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a> </li>
        </ul>
    </div>
</nav>