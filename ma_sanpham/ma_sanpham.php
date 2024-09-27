<h1 style="font-size:0px; margin: 0px; height:0px; color:#fff; padding: 0px;"><a href='https://hackhe.xyz/'>Folding bikes for commuters</a></h1>
<h2 style="font-size:0px; margin: 0px; height:0px; color:#fff; padding: 0px;"><a href='https://hackhe.xyz/'>Lightweight racing bikes</a></h2>
<h2 style="font-size:0px; margin: 0px; height:0px; color:#fff; padding: 0px;"><a href='https://hackhe.xyz/'>Kids' bikes safety</a></h2>

<?php
include('phantrang/phantrang_dichvu.php');
?>

<body>
    <div class="page-wrapper">
        <main class="main">
            <div class="category-banner-container bg-gray">
                <div class="container">
                    <div class="category-banner banner p-0">
                        <div class="row align-items-center no-gutters m-0 text-center text-lg-left">
                            <div
                                class="col-md-4 col-xl-2 offset-xl-2 d-flex justify-content-center justify-content-lg-start my-5 my-lg-0">
                                <div class="d-flex flex-column justify-content-center">
                                    <p class="home-slide-h4 text-light text-uppercase m-b-1">Extra</p>
                                    <p class="home-slide-h2 text-uppercase m-b-1" style="font-size: 3.3125em;">20% off
                                    </p>
                                    <p class="heading-border-h4 font-weight-bold text-uppercase heading-border m-b-3">
                                        BIKES</p>

                                </div>
                            </div>
                            <div class="col-md-5 col-lg-4 text-md-center my-5 my-lg-0"
                                style="background-image: url(hinhmenu/banner/shop-banner-bg.png);">
                                <img class="d-inline-block" src="hinhmenu/banner/shop-banner.png" alt="banner"
                                    width="400" height="242">
                            </div>
                            <div class="col-md-3 my-5 my-lg-0">
                                <p class="home-slide-h3 font5 m-b-5">Summer Sale</p>
                                <a href="#" class="btn btn-teritary btn-lg ml-0">Shop All Sale</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </div>
            </nav>

            <div class="container">
                <div class="row main-content">
                    <div class="col-lg-9">
                        <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                            <div class="toolbox-left">
                                <a href="#" class="sidebar-toggle"><svg data-name="Layer 3" id="Layer_3"
                                        viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                        <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                        <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                        <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                        <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                        <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                        <path
                                            d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                            class="cls-2"></path>
                                        <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2">
                                        </path>
                                        <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                        <path
                                            d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                            class="cls-2"></path>
                                    </svg>
                                    <span>Filter</span>
                                </a>

                                <div class="toolbox-item toolbox-sort">
                                    <label>Filter:</label>

                                    <div class="select-custom">
                                        <select name="orderby" class="form-control"
                                            onchange="if (this.value) window.location.href=this.value">
                                            <option value="" selected="selected">Select Type</option>
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
                            </div>

                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show">
                                    <label>Show:</label>

                                    <div class="select-custom">
                                        <select name="count" class="form-control">
                                            <option value="25">25</option>
                                            <option value="30">30</option>
                                            <option value="35">35</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="toolbox-item layout-modes">
                                    <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                                        <i class="icon-mode-grid"></i>
                                    </a>
                                    <a href="category-list.html" class="layout-btn btn-list" title="List">
                                        <i class="icon-mode-list"></i>
                                    </a>
                                </div>
                            </div>
                        </nav>

                        <div class="row">
                            <?php
                            require('db.php');
                            $p = new pager;
                            $limit = 25;
                            $start = $p->findStart($limit);

                            // Prepare and execute count query
                            $stmt = $link->prepare("SELECT COUNT(*) FROM ma_sanpham");
                            $stmt->execute();
                            $stmt->bind_result($count);
                            $stmt->fetch();
                            $stmt->close();

                            // Calculate pages
                            $pages = $p->findPages($count, $limit);

                            // Prepare and execute main query
                            $stmt = $link->prepare("SELECT * FROM ma_sanpham ORDER BY id DESC LIMIT ?, ?");
                            $stmt->bind_param('ii', $start, $limit);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            while ($row = $result->fetch_assoc()) {
                                $link_hinh = "HinhCTSP/HinhSanPham/" . htmlspecialchars($row['hinhanh'], ENT_QUOTES, 'UTF-8');
                                $id = htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');
                                $tieude = htmlspecialchars($row['tieude'], ENT_QUOTES, 'UTF-8');
                                $giagoc = number_format($row['giagoc'], 2, '.', ',');
                                $giagoc_formatted = '$' . $giagoc;
                                $url = htmlspecialchars($row['linkurl'], ENT_QUOTES, 'UTF-8');
                                $link = htmlspecialchars(strtolower("detail/$url"), ENT_QUOTES, 'UTF-8');
                            ?>
                                <div class="col-6 col-sm-4 col-xl-3">
                                    <div class="product-default">
                                        <figure>
                                            <a href="<?php echo $link; ?>">
                                                <img src="<?php echo $link_hinh; ?>" width="280"
                                                    height="280" alt="<?php echo $tieude; ?>">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                                <div class="product-label label-sale">-13%</div>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-list">
                                                <a href="home" class="product-category">Category</a>
                                            </div>
                                            <p class="product-title p-product-title">
                                                <a href="<?php echo $link; ?>"><?php echo $tieude; ?></a>
                                            </p>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:80%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <span class="product-price"><?php echo $giagoc_formatted; ?></span>
                                            </div>
                                            <div class="product-action">
                                                <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                                        class="icon-heart"></i></a>
                                                <a href="#"
                                                    class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                                <a href="<?php echo $link; ?>" class="btn-quickviews"
                                                    title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            $stmt->close();
                            ?>
                        </div>

                        <nav class="toolbox toolbox-pagination mb-0">
                            <div class="toolbox-item toolbox-show">
                                <label class="mt-0">Show:</label>

                                <div class="select-custom">
                                    <select name="count" class="form-control">
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                    </select>
                                </div>
                            </div>

                            <ul class="pagination toolbox-item">
                                <div class="bgphantranga">
                                    <?php
                                    echo "<div align='left' class='phantrang' style='float: left;width: 100%;text-align: right;'> &nbsp;&nbsp;&nbsp;&nbsp;Page: ";
                                    $pagelist = $p->pageList($_GET['page'], $pages);
                                    echo $pagelist;
                                    echo "</div>"
                                    ?>
                                </div>
                            </ul>
                        </nav>
                    </div>

                    <div class="sidebar-overlay"></div>
                    <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                        <?php include('menu_trai/leftsanpham.php'); ?>
                    </aside>
                </div>
            </div>
        </main>
    </div>
</body>