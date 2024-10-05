    <header class="header_wrap fixed-top header_with_topbar">
        <div class="top-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                            <div class="lng_dropdown mr-2">
                                <select name="countries" class="custome_select">
                                    <option value='en' data-image="hinhmenu/icon/eng.png" data-title="English">English</option>
                                    <option value='fn' data-image="hinhmenu/icon/fn.png" data-title="France">France</option>
                                    <option value='us' data-image="hinhmenu/icon/us.png" data-title="United States">United States</option>
                                </select>
                            </div>
                            <div class="mr-3">
                                <select name="countries" class="custome_select">
                                    <option value='USD' data-title="USD">USD</option>
                                    <option value='EUR' data-title="EUR">EUR</option>
                                    <option value='GBR' data-title="GBR">GBR</option>
                                </select>
                            </div>
                            <ul class="contact_detail text-center text-lg-left">
                                <?php
                                require('db.php');
                                $query = "SELECT * FROM tin_thicong WHERE thuocloai = 2 AND id IN (3)";
                                $result = mysqli_query($link, $query);
                                $contact_info = [];

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $contact_info[$row['id']] = htmlspecialchars($row['mota']);
                                }
                                ?>
                                <li><i class="ti-mobile"></i><span><?php echo $contact_info[3] ?? 'No meta found'; ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-center text-md-right">
                            <ul class="header_list">
                                <li><a href="#"><i class="ti-control-shuffle"></i><span>Compare</span></a></li>
                                <li><a href="#"><i class="ti-heart"></i><span>Wishlist</span></a></li>
                                <li><a href="#"><i class="ti-user"></i><span>Login</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom_header dark_skin main_menu_uppercase">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="index.html">
                        <img class="logo_light" src="hinhmenu/logo/okhotel-dark.webp" alt="logo" />
                        <img class="logo_dark" src="hinhmenu/logo/okhotel-white.webp" alt="logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false">
                        <span class="ion-android-menu"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
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
                    <ul class="navbar-nav attr-nav align-items-center">
                        <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                            <div class="search_wrap">
                                <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                                <form>
                                    <input type="text" placeholder="Search" class="form-control" id="search_input">
                                    <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                                </form>
                            </div>
                            <div class="search_overlay"></div>
                        </li>
                        <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">2</span></a>
                            <div class="cart_box dropdown-menu dropdown-menu-right">
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>