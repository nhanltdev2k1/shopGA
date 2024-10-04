<body>

    <!-- START SECTION BANNER -->
    <div class="mt-4 staggered-animation-wrap">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-7 offset-lg-3">
                    <div class="banner_section shop_el_slider">
                        <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow"
                            data-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                require('db.php');

                                // Query to fetch the required data
                                $stmt = $link->prepare("SELECT hinhanh FROM thuong_mai ORDER BY id ASC LIMIT 3");
                                $stmt->execute();
                                $result = $stmt->get_result();

                                $active = true; // To set the first item as active
                                while ($row = $result->fetch_assoc()) {
                                    $link_hinh = "HinhCTSP/" . htmlspecialchars($row['hinhanh']); // Use htmlspecialchars to prevent XSS
                                ?>
                                <div class="carousel-item <?php echo $active ? 'active' : ''; ?> background_bg"
                                    data-img-src="<?php echo $link_hinh; ?>">
                                </div>
                                <?php
                                    $active = false; // Set subsequent items to inactive
                                }
                                $stmt->close();
                                ?>
                            </div>
                            <ol class="carousel-indicators indicators_style3">
                                <?php
                                $stmt = $link->prepare("SELECT COUNT(*) as total FROM thuong_mai");
                                $stmt->execute();
                                $stmt->bind_result($total);
                                $stmt->fetch();
                                $stmt->close();

                                // Generate carousel indicators
                                for ($i = 0; $i < $total; $i++) {
                                    echo '<li data-target="#carouselExampleControls" data-slide-to="' . $i . '" class="' . ($i === 0 ? 'active' : '') . '"></li>';
                                }
                                ?>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="col-lg-2 d-none d-lg-block">
                    <div class="shop_banner2 el_banner1">
                        <a href="product" class="hover_effect1">
                            <div class="el_title text_white">
                                <span>Up to 30% off</span>
                            </div>
                            <div class="el_img">
                                <img src="hinhmenu/banner/slideshow-okhotel-004.webp" alt="shop_banner_img6">
                            </div>
                        </a>
                    </div>
                    <div class="shop_banner2 el_banner2">
                        <a href="product" class="hover_effect1">
                            <div class="el_title text_white">
                                <span><u>Shop Now</u></span>
                            </div>
                            <div class="el_img">
                                <img src="hinhmenu/banner/slideshow-okhotel-005.webp" alt="shop_banner_img7">
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="main_content">
        <!-- START SECTION SHOP -->
        <div class="section small_pt pb-0">
            <div class="custom-container">
                <div class="row">
                    <div class="col-xl-3 d-none d-xl-block">
                        <div class="sale-banner">
                            <a class="hover_effect1" href="#">
                                <img src="hinhmenu/banner/banner-okhotel-001.webp" alt="shop_banner_img6">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="row">
                            <div class="col-12">
                                <div class="heading_tab_header">
                                    <div class="heading_s2">
                                        <p class="h4-home">Exclusive Products</p>
                                    </div>
                                    <div class="tab-style2">
                                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                            data-target="#tabmenubar" aria-expanded="false">
                                            <span class="ion-android-menu"></span>
                                        </button>
                                        <ul class="nav nav-tabs justify-content-center justify-content-md-end"
                                            id="tabmenubar" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="arrival-tab" data-toggle="tab"
                                                    href="#arrival" role="tab" aria-controls="arrival"
                                                    aria-selected="true">New Arrival</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="tab_slider">
                                    <div class="tab-pane fade show active" id="arrival" role="tabpanel"
                                        aria-labelledby="arrival-tab">
                                        <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1"
                                            data-loop="true" data-margin="20"
                                            data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                                            <?php
                                            require('db.php');
                                            // Prepared statement for improved security
                                            $stmt = $link->prepare("SELECT * FROM (SELECT * FROM ma_sanpham WHERE exclusive=1 ORDER BY id DESC LIMIT 100) AS recent_news ORDER BY RAND() LIMIT 6");
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            // Fetch data and display products
                                            while ($row = $result->fetch_assoc()) {
                                                $link_hinh = "HinhCTSP/HinhSanPham/" . htmlspecialchars($row['hinhanh']);
                                                $tieude = htmlspecialchars($row['tieude']);
                                                $url = htmlspecialchars($row['linkurl']);
                                                $giagoc = '$' . number_format($row['giagoc'], 2, '.', ',');
                                                $link = str_replace("?", "", strtolower("detail/$url"));
                                            ?>
                                            <div class="item">
                                                <div class="product_wrap">
                                                    <div class="product_img">
                                                        <a href="<?php echo $tieude; ?>">
                                                            <img src="<?php echo $link_hinh; ?>"
                                                                alt="<?php echo $tieude; ?>">
                                                            <img class="product_hover_img"
                                                                src="<?php echo $link_hinh; ?>"
                                                                alt="<?php echo $tieude; ?>">
                                                        </a>
                                                        <div class="product_action_box">
                                                            <ul class="list_none pr_action_btn">
                                                                <li class="add-to-cart"><a
                                                                        href="<?php echo $link; ?>"><i
                                                                            class="icon-basket-loaded"></i> Add To
                                                                        Cart</a></li>
                                                                <li><a href="<?php echo $link; ?>"
                                                                        class="popup-ajaxs"><i
                                                                            class="icon-shuffle"></i></a></li>
                                                                <li><a href="<?php echo $link_hinh; ?>"
                                                                        class="popup-ajaxs"><i
                                                                            class="icon-magnifier-add"></i></a></li>
                                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product_info">
                                                        <h6 class="product_title"><a
                                                                href="<?php echo $link; ?>"><?php echo $tieude; ?></a>
                                                        </h6>
                                                        <div class="product_price">
                                                            <span class="price"><?php echo $giagoc_formatted; ?></span>
                                                        </div>
                                                        <div class="rating_wrap">
                                                            <div class="rating">
                                                                <div class="product_rate" style="width:80%"></div>
                                                            </div>
                                                            <span class="rating_num">(21)</span>
                                                        </div>
                                                        <div class="pr_desc">
                                                            <p><?php echo $mota; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            $stmt->close();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->

        <!-- START SECTION BANNER -->
        <div class="section pb_20 small_pt">
            <div class="custom-container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="sale-banner mb-3 mb-md-4">
                            <a class="hover_effect1" href="#">
                                <img src="hinhmenu/banner/bannersale-okhotel-001.webp" alt="shop_banner_img7">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sale-banner mb-3 mb-md-4">
                            <a class="hover_effect1" href="#">
                                <img src="hinhmenu/banner/bannersale-okhotel-002.webp" alt="shop_banner_img8">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sale-banner mb-3 mb-md-4">
                            <a class="hover_effect1" href="#">
                                <img src="hinhmenu/banner/bannersale-okhotel-003.webp" alt="shop_banner_img9">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION BANNER -->

        <!-- START SECTION SHOP -->
        <div class="section pt-0 pb-0">
            <div class="custom-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <p class="h4-home">Deal Of The Day</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme nav_style3" data-loop="true"
                            data-dots="false" data-nav="true" data-margin="30"
                            data-responsive='{"0":{"items": "1"}, "650":{"items": "2"}, "1199":{"items": "2"}}'>

                            <?php
                                require('db.php');

                                // Function to fetch products
                                function fetchProducts($link, $condition, $countdown_date) {
                                    // Prepared statement for better security and reusability
                                    $stmt = $link->prepare("SELECT * FROM (SELECT * FROM ma_sanpham WHERE $condition=1 ORDER BY id DESC LIMIT 100) AS recent_news ORDER BY RAND() LIMIT 1");
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    // Fetch and display products
                                    while ($row = $result->fetch_assoc()) {
                                        $link_hinh = "HinhCTSP/HinhSanPham/" . htmlspecialchars($row['hinhanh']);
                                        $tieude = htmlspecialchars($row['tieude']);
                                        $url = htmlspecialchars($row['linkurl']);
                                        $giagoc = number_format($row['giagoc'], 2, '.', ',');
                                        $giagoc_formatted = '$' . $giagoc;
                                        $giaban = number_format($row['giaban'], 2, '.', ',');
                                        $giaban_formatted = '$' . $giaban;
                                        $link = str_replace("?", "", strtolower("detail/$url"));
                                ?>
                            <div class="item">
                                <div class="deal_wrap">
                                    <div class="product_img">
                                        <a href="<?php echo $link; ?>">
                                            <img src="<?php echo $link_hinh; ?>" alt="<?php echo $tieude; ?>">
                                        </a>
                                    </div>
                                    <div class="deal_content">
                                        <div class="product_info">
                                            <p class="product_title b-p-t"><a
                                                    href="<?php echo $link; ?>"><?php echo $tieude; ?></a></p>
                                            <div class="product_price">
                                                <span class="price"><?php echo $giaban_formatted; ?></span>
                                                <del><?php echo $giagoc_formatted; ?></del>
                                            </div>
                                        </div>
                                        <div class="deal_progress">
                                            <span class="stock-sold">Already Sold: <strong>6</strong></span>
                                            <span class="stock-available">Available: <strong>8</strong></span>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="46"
                                                    aria-valuemin="0" aria-valuemax="100" style="width:46%"> 46% </div>
                                            </div>
                                        </div>
                                        <div class="countdown_time countdown_style4 mb-4"
                                            data-time="<?php echo $countdown_date; ?>"></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                                $stmt->close();
                            }

                            // Fetch products for khuyenmai and banchay
                            fetchProducts($link, 'khuyenmai', '2024/10/30 12:30:15');
                            fetchProducts($link, 'banchay', '2024/10/25 12:00:00');

                            // Close the database connection
                            $link->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->

        <!-- START SECTION SHOP -->
        <div class="section small_pt small_pb">
            <div class="custom-container">
                <div class="row">
                    <div class="col-xl-3 d-none d-xl-block">
                        <div class="sale-banner">
                            <a class="hover_effect1" href="#">
                                <img src="hinhmenu/banner/banner-okhotel-002.webp" alt="shop_banner_img10">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="row">
                            <div class="col-12">
                                <div class="heading_tab_header">
                                    <div class="heading_s2">
                                        <p class="h4-home">Trending products</p>
                                    </div>
                                    <div class="view_all">
                                        <a href="product" class="text_default"><i class="linearicons-power"></i>
                                            <span>View
                                                All</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1"
                                    data-loop="true" data-margin="20"
                                    data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                                    <?php
                                    require('db.php');
                                    // Prepared statement for improved security
                                    $stmt = $link->prepare("SELECT * FROM (SELECT * FROM ma_sanpham WHERE khuyenmai=1 ORDER BY id DESC LIMIT 100) AS recent_news ORDER BY RAND() LIMIT 6");
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    // Fetch data and display products
                                    while ($row = $result->fetch_assoc()) {
                                        $link_hinh = "HinhCTSP/HinhSanPham/" . htmlspecialchars($row['hinhanh']);
                                        $tieude = htmlspecialchars($row['tieude']);
                                        $mota = htmlspecialchars($row['mota']);
                                        $url = htmlspecialchars($row['linkurl']);
                                        $giagoc = number_format($row['giagoc'], 2, '.', ',');
                                        $giagoc_formatted = '$' . $giagoc;
                                        $link = str_replace("?", "", strtolower("detail/$url"));
                                    ?>
                                    <div class="item">
                                        <div class="product_wrap">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="<?php echo $link_hinh; ?>" alt="<?php echo $tieude; ?>">
                                                    <img class="product_hover_img" src="<?php echo $link_hinh; ?>"
                                                        alt="<?php echo $tieude; ?>">
                                                </a>
                                                <div class="product_action_box">
                                                    <ul class="list_none pr_action_btn">
                                                        <li class="add-to-cart"><a href="#"><i
                                                                    class="icon-basket-loaded"></i>
                                                                Add To Cart</a></li>
                                                        <li><a href="shop-compare.html" class="popup-ajax"><i
                                                                    class="icon-shuffle"></i></a>
                                                        </li>
                                                        <li><a href="shop-quick-view.html" class="popup-ajax"><i
                                                                    class="icon-magnifier-add"></i></a>
                                                        </li>
                                                        <li><a href="#"><i class="icon-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product_info">
                                                <p class="product_title b-p-t"><a
                                                        href="<?php echo $link; ?>"><?php echo $tieude; ?></a></p>
                                                <div class="product_price">
                                                    <span class="price"><?php echo $giagoc_formatted; ?></span>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:68%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(15)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p><?php echo $mota; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    $stmt->close();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->

        <!-- START SECTION CLIENT LOGO -->
        <div class="section pt-0 small_pb">
            <div class="custom-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading_tab_header">
                            <div class="heading_s2">
                                <h4>Our Brands</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="client_logo carousel_slider owl-carousel owl-theme nav_style3" data-dots="false"
                            data-nav="true" data-margin="30" data-loop="true" data-autoplay="true"
                            data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}, "1199":{"items": "6"}}'>
                            <?php
                            // Include database connection
                            require('db.php');

                            // Query to fetch partners
                            $query = "SELECT * FROM doi_tac ORDER BY id ASC LIMIT 0, 2";
                            $result = mysqli_query($link, $query);

                            // Check if query executed successfully
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $link_hinh = "HinhCTSP/" . htmlspecialchars($row['hinhanh']);
                                    $tieude = htmlspecialchars($row['tieude']);
                                    ?>
                            <div class="item">
                                <div class="cl_logo">
                                    <img src="<?php echo $link_hinh; ?>" alt="<?php echo $tieude; ?>" />
                                </div>
                            </div>
                            <?php
                                }
                            } else {
                                echo "Error fetching data: " . mysqli_error($link);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION CLIENT LOGO -->

        <!-- START SECTION SHOP -->
        <div class="section pt-0 pb_20">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="heading_tab_header">
                                    <div class="heading_s2">
                                        <h4>Featured Products</h4>
                                    </div>
                                    <div class="view_all">
                                        <a href="#" class="text_default"><span>View All</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5"
                                    data-nav="true" data-dots="false" data-loop="true" data-margin="20"
                                    data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "640":{"items": "2"}, "991":{"items": "1"}}'>
                                    <div class="item">
                                        <div class="product_wrap">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img2.jpg" alt="el_img2">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img2.jpg"
                                                        alt="el_hover_img2">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">Smart Watch
                                                        External</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$55.00</span>
                                                    <del>$95.00</del>
                                                    <div class="on_sale">
                                                        <span>25% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:68%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(15)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_wrap">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img1.jpg" alt="el_img1">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img1.jpg"
                                                        alt="el_hover_img1">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">Red &amp;
                                                        Black Headphone</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$45.00</span>
                                                    <del>$55.25</del>
                                                    <div class="on_sale">
                                                        <span>35% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:80%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(21)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_wrap">
                                            <span class="pr_flash">New</span>
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img3.jpg" alt="el_img3">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img3.jpg"
                                                        alt="el_hover_img3">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">Nikon HD
                                                        camera</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$68.00</span>
                                                    <del>$99.00</del>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:87%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(25)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product_wrap">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img5.jpg" alt="el_img5">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img5.jpg"
                                                        alt="el_hover_img5">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">Smart
                                                        Televisions</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$45.00</span>
                                                    <del>$55.25</del>
                                                    <div class="on_sale">
                                                        <span>35% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:80%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(21)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_wrap">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img9.jpg" alt="el_img9">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img9.jpg"
                                                        alt="el_hover_img9">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">oppo Reno3
                                                        Pro</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$68.00</span>
                                                    <del>$99.00</del>
                                                    <div class="on_sale">
                                                        <span>20% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:87%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(25)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_wrap">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img7.jpg" alt="el_img7">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img7.jpg"
                                                        alt="el_hover_img7">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">Audio
                                                        Theaters</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$45.00</span>
                                                    <del>$55.25</del>
                                                    <div class="on_sale">
                                                        <span>35% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:80%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(21)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="heading_tab_header">
                                    <div class="heading_s2">
                                        <h4>Top Rated Products</h4>
                                    </div>
                                    <div class="view_all">
                                        <a href="#" class="text_default"><span>View All</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5"
                                    data-nav="true" data-dots="false" data-loop="true" data-margin="20"
                                    data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "640":{"items": "2"}, "991":{"items": "1"}}'>
                                    <div class="item">
                                        <div class="product_wrap">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img5.jpg" alt="el_img5">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img5.jpg"
                                                        alt="el_hover_img5">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">Smart
                                                        Televisions</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$45.00</span>
                                                    <del>$55.25</del>
                                                    <div class="on_sale">
                                                        <span>35% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:80%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(21)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_wrap">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img12.jpg" alt="el_img12">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img12.jpg"
                                                        alt="el_hover_img12">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">Sound
                                                        Equipment for Low</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$45.00</span>
                                                    <del>$55.25</del>
                                                    <div class="on_sale">
                                                        <span>35% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:80%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(21)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_wrap">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img4.jpg" alt="el_img4">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img4.jpg"
                                                        alt="el_hover_img4">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">Audio
                                                        Equipment</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$69.00</span>
                                                    <del>$89.00</del>
                                                    <div class="on_sale">
                                                        <span>20% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:70%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(22)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product_wrap">
                                            <span class="pr_flash bg-danger">Hot</span>
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img6.jpg" alt="el_img6">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img6.jpg"
                                                        alt="el_hover_img6">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">Samsung
                                                        Smart Phone</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$55.00</span>
                                                    <del>$95.00</del>
                                                    <div class="on_sale">
                                                        <span>25% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:68%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(15)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_wrap">
                                            <span class="pr_flash bg-danger">Hot</span>
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img8.jpg" alt="el_img8">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img8.jpg"
                                                        alt="el_hover_img8">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a
                                                        href="shop-product-detail.html">Surveillance
                                                        camera</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$55.00</span>
                                                    <del>$95.00</del>
                                                    <div class="on_sale">
                                                        <span>25% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:68%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(15)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_wrap">
                                            <span class="pr_flash bg-success">Sale</span>
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img10.jpg" alt="el_img10">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img10.jpg"
                                                        alt="el_hover_img10">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">classical
                                                        Headphone</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$68.00</span>
                                                    <del>$99.00</del>
                                                    <div class="on_sale">
                                                        <span>20% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:87%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(25)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="heading_tab_header">
                                    <div class="heading_s2">
                                        <h4>On Sale Products</h4>
                                    </div>
                                    <div class="view_all">
                                        <a href="#" class="text_default"><span>View All</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5"
                                    data-nav="true" data-dots="false" data-loop="true" data-margin="20"
                                    data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "640":{"items": "2"}, "991":{"items": "1"}}'>
                                    <div class="item">
                                        <div class="product_wrap">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img11.jpg" alt="el_img11">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img11.jpg"
                                                        alt="el_hover_img11">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">Basics
                                                        High-Speed HDMI</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$69.00</span>
                                                    <del>$89.00</del>
                                                    <div class="on_sale">
                                                        <span>20% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:70%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(22)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_wrap">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img7.jpg" alt="el_img7">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img7.jpg"
                                                        alt="el_hover_img7">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">Audio
                                                        Theaters</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$45.00</span>
                                                    <del>$55.25</del>
                                                    <div class="on_sale">
                                                        <span>35% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:80%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(21)</span>
                                                </div>
                                                <div class="pr_desc">

                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_wrap">
                                            <span class="pr_flash bg-danger">Hot</span>
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img8.jpg" alt="el_img8">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img8.jpg"
                                                        alt="el_hover_img8">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a
                                                        href="shop-product-detail.html">Surveillance
                                                        camera</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$55.00</span>
                                                    <del>$95.00</del>
                                                    <div class="on_sale">
                                                        <span>25% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:68%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(15)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product_wrap">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img5.jpg" alt="el_img5">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img5.jpg"
                                                        alt="el_hover_img5">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">Smart
                                                        Televisions</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$45.00</span>
                                                    <del>$55.25</del>
                                                    <div class="on_sale">
                                                        <span>35% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:80%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(21)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_wrap">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img9.jpg" alt="el_img9">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img9.jpg"
                                                        alt="el_hover_img9">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">oppo Reno3
                                                        Pro</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$68.00</span>
                                                    <del>$99.00</del>
                                                    <div class="on_sale">
                                                        <span>20% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:87%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(25)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_wrap">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="siteshopga/assets/images/el_img1.jpg" alt="el_img1">
                                                    <img class="product_hover_img"
                                                        src="siteshopga/assets/images/el_hover_img1.jpg"
                                                        alt="el_hover_img1">
                                                </a>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">Red &amp;
                                                        Black Headphone</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$45.00</span>
                                                    <del>$55.25</del>
                                                    <div class="on_sale">
                                                        <span>35% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:80%">
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(21)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit.
                                                        Phasellus blandit massa enim. Nullam id
                                                        varius nunc id varius
                                                        nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->

        <!-- START SECTION SUBSCRIBE NEWSLETTER -->
        <div class="section bg_default small_pt small_pb">
            <div class="custom-container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="newsletter_text text_white">
                            <h3>Join Our Newsletter Now</h3>
                            <p> Register now to get updates on promotions. </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="newsletter_form2 rounded_input">
                            <form>
                                <input type="text" required="" class="form-control" placeholder="Enter Email Address">
                                <button type="submit" class="btn btn-dark btn-radius" name="submit"
                                    value="Submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- START SECTION SUBSCRIBE NEWSLETTER -->

    </div>
    <!-- END MAIN CONTENT -->

    <!-- START FOOTER -->
    <footer class="bg_gray">
        <div class="footer_top small_pt pb_20">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="widget">
                            <div class="footer_logo">
                                <a href="#"><img src="siteshopga/assets/images/logo_dark.png" alt="logo" /></a>
                            </div>
                            <p class="mb-3">If you are going to use of Lorem Ipsum need to be sure
                                there isn't anything
                                hidden of text</p>
                            <ul class="contact_info">
                                <li>
                                    <i class="ti-location-pin"></i>
                                    <p>123 Street, Old Trafford, NewYork, USA</p>
                                </li>
                                <li>
                                    <i class="ti-email"></i>
                                    <a href="mailto:info@sitename.com">info@sitename.com</a>
                                </li>
                                <li>
                                    <i class="ti-mobile"></i>
                                    <p>+ 457 789 789 65</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="widget">
                            <h6 class="widget_title">Useful Links</h6>
                            <ul class="widget_links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Location</a></li>
                                <li><a href="#">Affiliates</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="widget">
                            <h6 class="widget_title">My Account</h6>
                            <ul class="widget_links">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Discount</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Orders History</a></li>
                                <li><a href="#">Order Tracking</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="widget">
                            <h6 class="widget_title">Instagram</h6>
                            <ul class="widget_instafeed instafeed_col4">
                                <li><a href="#"><img src="siteshopga/assets/images/insta_img1.jpg" alt="insta_img"><span
                                            class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="#"><img src="siteshopga/assets/images/insta_img2.jpg" alt="insta_img"><span
                                            class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="#"><img src="siteshopga/assets/images/insta_img3.jpg" alt="insta_img"><span
                                            class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="#"><img src="siteshopga/assets/images/insta_img4.jpg" alt="insta_img"><span
                                            class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="#"><img src="siteshopga/assets/images/insta_img5.jpg" alt="insta_img"><span
                                            class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="#"><img src="siteshopga/assets/images/insta_img6.jpg" alt="insta_img"><span
                                            class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="#"><img src="siteshopga/assets/images/insta_img7.jpg" alt="insta_img"><span
                                            class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="#"><img src="siteshopga/assets/images/insta_img8.jpg" alt="insta_img"><span
                                            class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="middle_footer">
            <div class="custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="shopping_info">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="icon_box icon_box_style2">
                                        <div class="icon">
                                            <i class="flaticon-shipped"></i>
                                        </div>
                                        <div class="icon_box_content">
                                            <h5>Free Delivery</h5>
                                            <p>Phasellus blandit massa enim elit of passage varius
                                                nunc.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="icon_box icon_box_style2">
                                        <div class="icon">
                                            <i class="flaticon-money-back"></i>
                                        </div>
                                        <div class="icon_box_content">
                                            <h5>30 Day Returns Guarantee</h5>
                                            <p>Phasellus blandit massa enim elit of passage varius
                                                nunc.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="icon_box icon_box_style2">
                                        <div class="icon">
                                            <i class="flaticon-support"></i>
                                        </div>
                                        <div class="icon_box_content">
                                            <h5>27/4 Online Support</h5>
                                            <p>Phasellus blandit massa enim elit of passage varius
                                                nunc.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom_footer border-top-tran">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-4">
                        <p class="mb-lg-0 text-center">© 2020 All Rights Reserved by Bestwebcreator
                        </p>
                    </div>
                    <div class="col-lg-4 order-lg-first">
                        <div class="widget mb-lg-0">
                            <ul class="social_icons text-center text-lg-left">
                                <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#" class="sc_google"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <ul class="footer_payment text-center text-lg-right">
                            <li><a href="#"><img src="siteshopga/assets/images/visa.png" alt="visa"></a></li>
                            <li><a href="#"><img src="siteshopga/assets/images/discover.png" alt="discover"></a></li>
                            <li><a href="#"><img src="siteshopga/assets/images/master_card.png" alt="master_card"></a>
                            </li>
                            <li><a href="#"><img src="siteshopga/assets/images/paypal.png" alt="paypal"></a></li>
                            <li><a href="#"><img src="siteshopga/assets/images/amarican_express.png"
                                        alt="amarican_express"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->

</body>

</html>