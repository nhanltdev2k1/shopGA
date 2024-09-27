<div class="sidebar-wrapper" data-sticky-sidebar-options='{"offsetTop": 72}'>
    <div class="header-bottom w-100 ml-0 position-relative d-lg-block d-none">
        <nav class="main-nav w-100">
            <ul class="menu no-superfish w-100">
                <li class="active">
                    <a href="home">Home</a>
                </li>
                <li>
                    <a href="about/website-overview">About Us</a>
                </li>
                <li>
                    <a href="product" class="sf-with-ul">Products Catalog</a>
                    <div class="megamenu megamenu-fixed-width">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="#" class="nolink">Catalog</a>
                                <ul class="submenu">
                                    <?php
                                    require('db.php');
                                    $tv1 = "SELECT * FROM loai_ma_sanpham ORDER BY id ASC";
                                    $tv_11 = mysqli_query($link, $tv1);
                                    while ($tv_21 = mysqli_fetch_array($tv_11)) {
                                        $id = $tv_21['id'];
                                        $thuocloai = $tv_21['thuocloai'];
                                        $name_url = strtolower($tv_21['name_url']);
                                    ?>
                                        <li><a href="category/<?php echo $name_url; ?>"><?php echo $thuocloai; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="col-lg-6 p-0">
                                <div class="menu-banner menu-banner-2">
                                    <figure>
                                        <img src="hinhmenu/banner/banner-menu_6_11zon.webp" alt="Menu banner" class="product-promo">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="news/">News - Events</a>
                </li>
                <li>
                    <a href="contact">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
</div>