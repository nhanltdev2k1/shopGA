<header class="header_wrap">
    <div class="top-header light_skin bg_dark d-none d-md-block">
        <div class="custom-container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="header_topbar_info">
                        <div class="header_offer">
                            <span>Free Ground Shipping Over $250</span>
                        </div>
                        <div class="download_wrap">
                            <span class="mr-3">Download App</span>
                            <ul class="icon_list text-center text-lg-left">
                                <li><a href="#"><i class="fab fa-apple"></i></a></li>
                                <li><a href="#"><i class="fab fa-android"></i></a></li>
                                <li><a href="#"><i class="fab fa-windows"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="lng_dropdown">
                            <select name="countries" class="custome_select">
                                <option value='en' data-image="hinhmenu/icon/eng.png" data-title="English">English
                                </option>
                                <option value='fn' data-image="hinhmenu/icon/fn.png" data-title="France">France</option>
                                <option value='us' data-image="hinhmenu/icon/us.png" data-title="United States">United
                                    States</option>
                            </select>
                        </div>
                        <div class="ml-3">
                            <select name="countries" class="custome_select">
                                <option value='USD' data-title="USD">USD</option>
                                <option value='EUR' data-title="EUR">EUR</option>
                                <option value='GBR' data-title="GBR">GBR</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle-header dark_skin">
        <div class="custom-container">
            <div class="nav_block">
                <a class="navbar-brand" href="index.html">
                    <img class="logo_light" src="hinhmenu/logo/okhotel-dark.webp" alt="logo" />
                    <img class="logo_dark" src="hinhmenu/logo/okhotel-white.webp" alt="logo" />
                </a>
                <div class="product_search_form rounded_input">
                    <form>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="custom_select">
                                    <select class="first_null">
                                        <option value="" selected="selected">Select type</option>
                                        <?php
                                        require('db.php');
                                        $tv1 = "SELECT * FROM loai_ma_sanpham ORDER BY id ASC";
                                        $tv_11 = mysqli_query($link, $tv1);
                                        while ($tv_21 = mysqli_fetch_array($tv_11)) {
                                            $name_url = strtolower($tv_21['name_url']);
                                            $thuocloai = $tv_21['thuocloai'];
                                        ?>
                                            <option value="category/<?php echo $name_url; ?>"><?php echo $thuocloai; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <input class="form-control" placeholder="Search Product..." required="" type="text">
                            <button type="submit" class="search_btn2"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a href="#" class="nav-link"><i class="linearicons-user"></i></a></li>
                    <li><a href="#" class="nav-link"><i class="linearicons-heart"></i><span
                                class="wishlist_count">0</span></a></li>
                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#"
                            data-toggle="dropdown"><i class="linearicons-bag2"></i><span
                                class="cart_count">0</span><span class="amount"><span
                                    class="currency_symbol">$</span>0.0</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase border-top border-bottom">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                    <div class="categories_wrap">
                        <button type="button" data-toggle="collapse" data-target="#navCatContent" aria-expanded="false"
                            class="categories_btn">
                            <i class="linearicons-menu"></i><span>All Categories </span>
                        </button>
                        <div id="navCatContent" class="nav_cat navbar collapse">
                            <ul>
                                <?php
                                require('db.php');
                                $tv1 = "SELECT * FROM loai_ma_sanpham ORDER BY id ASC";
                                $tv_11 = mysqli_query($link, $tv1);
                                while ($tv_21 = mysqli_fetch_array($tv_11)) {
                                    $name_url = strtolower($tv_21['name_url']);
                                    $thuocloai = $tv_21['thuocloai'];
                                ?>
                                    <li><a class="dropdown-item nav-link nav_item"
                                            href="category/<?php echo $name_url; ?>"><i class="fa fa-caret-right"></i>
                                            <span><?php echo $thuocloai; ?></span></a></li>
                                <?php } ?>
                            </ul>
                            <div class="more_categories">More Categories</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSidetoggle" aria-expanded="false">
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="pr_search_icon">
                            <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i
                                    class="linearicons-magnifier"></i></a>
                        </div>
                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                            <ul class="navbar-nav">
                                <li>
                                    <a data-toggle="dropdown" class="nav-link active" href="home">Home</a>
                                </li>
                                <li><a class="nav-link nav_item" href="about/website-information-overview/">About Us</a></li>
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-toggle nav-link" href="product" data-toggle="dropdown">Shop</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-9">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li class="dropdown-header">Shop Page Layout</li>
                                                            <?php
                                                            require('db.php');
                                                            $query = "SELECT * FROM loai_ma_sanpham ORDER BY id ASC  LIMIT 10";
                                                            $result = mysqli_query($link, $query);
                                                            $i = 0;
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                $name_url = strtolower($row['name_url']);
                                                                $thuocloai = $row['thuocloai'];
                                                                if ($i < 5) {
                                                                    echo "<li><a class='dropdown-item nav-link nav_item' href='category/$name_url'>$thuocloai</a></li>";
                                                                } elseif ($i >= 5) {
                                                                    $other_pages[] = "<li><a class='dropdown-item nav-link nav_item' href='category/$name_url'>$thuocloai</a></li>";
                                                                }
                                                                $i++;
                                                            }
                                                            ?>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li class="dropdown-header">Other Pages</li>
                                                            <?php
                                                            if (isset($other_pages)) {
                                                                echo implode("\n", $other_pages);
                                                            }
                                                            ?>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-3">
                                                <div class="header_banner">
                                                    <div class="header_banner_content">
                                                        <div class="shop_banner">
                                                            <div class="banner_img overlay_bg_40">
                                                                <img src="hinhmenu/banner/banner-product-okhotel.webp"
                                                                    alt="shop_banner" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="dropdown">
                                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Pages</a>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <?php
                                            require('db.php');
                                            $tv = "select * from gioi_thieu order by id asc limit 1,3";
                                            $tv_1 = mysqli_query($link, $tv);
                                            $a_tv_1 = mysqli_query($link, $tv);
                                            ?>
                                            <?php
                                            while ($tv_2 = mysqli_fetch_array($tv_1)) {
                                                $link_hinh = "HinhCTSP/$tv_2[hinhanh]";
                                                $id = "$tv_2[id]";
                                                $tieude_en = "$tv_2[tieude_en]";
                                                $tieude = "$tv_2[tieude]";
                                                $mota = "$tv_2[mota]";
                                                $ngay = "$tv_2[ngay]";
                                                $url = $tv_2['linkurl'];
                                                $link = str_replace("?", "", strtolower("about/$url"));
                                            ?>
                                                <li><a class="dropdown-item nav-link nav_item"
                                                        href="<?php echo "$link"; ?>"><?php echo $tieude; ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                                <li><a class="nav-link nav_item" href="news/">Blog</a></li>
                                <li><a class="nav-link nav_item" href="contact">Contact Us</a></li>
                            </ul>
                        </div>
                        <?php
                        require('db.php');
                        $query = "SELECT * FROM tin_thicong WHERE thuocloai = 2 AND id IN (3)";
                        $result = mysqli_query($link, $query);
                        $contact_info = [];

                        while ($row = mysqli_fetch_assoc($result)) {
                            $contact_info[$row['id']] = htmlspecialchars($row['mota']);
                        }
                        ?>
                        <div class="contact_phone contact_support">
                            <i class="linearicons-phone-wave"></i>
                            <span><?php echo $contact_info[3] ?? 'No meta found'; ?></span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>