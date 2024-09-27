<body>
    <div class="page-wrapper">
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <?php
                        require('db.php');
                        $id = $_GET['url'];
                        $tv = "select * from ma_sanpham where linkurl like '%" . $id . "%' order by id ";
                        $tv_1 = mysqli_query($link, $tv);
                        $a_tv_1 = mysqli_query($link, $tv);
                        $tv_2 = mysqli_fetch_array($tv_1);
                        $thuocloai = "$tv_2[thuocloai]";
                        $ten = "$tv_2[tieude]";
                        ?>
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item"><a href="product">Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo "$ten" ?></li>
                    </ol>
                </div>
            </nav>
            <div class="container">
                <div class="row">
                    <?php
                    include_once("phan_trang.php");
                    require('db.php');
                    $p = new pager;
                    $limit = 1;
                    $start = $p->findStart($limit);
                    $count = mysqli_num_rows(mysqli_query($link, "SELECT * FROM ma_sanpham"));
                    $pages = $p->findPages($count, $limit);
                    $id = $_REQUEST["url"];
                    $result = mysqli_query($link, "SELECT * FROM ma_sanpham WHERE linkurl LIKE '%" . $id . "%' ORDER BY id DESC LIMIT $start, $limit");
                    if (mysqli_num_rows($result) != 0) {
                        $stt = 0;
                        while ($row = mysqli_fetch_object($result)) {
                            $ngay = $row->ngay;
                            $thuocloai = $row->thuocloai;
                            $tieude = doikyty($row->tieude);
                            $tieude_en = doikyty($row->tieude_en);
                            $giagoc = doikyty($row->giagoc);
                            $giagoc_formatted = '$' . number_format($giagoc, 2, '.', ',');
                            $noidung = doikyty($row->noidung);
                            $mota = doikyty($row->mota);
                            $facebook = $row->facebook;
                            $tukhoa1 = $row->tukhoa1;
                            $tukhoa2 = $row->tukhoa2;
                            $url = khongdau($row->tieude);
                            $product_link = "tu-van-$url-$id";
                            $link_hinh = "HinhCTSP/HinhSanPham/" . $row->hinhanh;
                            if ($stt % 2 == 0) {
                                echo "<tr>";
                            }
                    ?><h1 class='h2-tukhoa-2'><a href='$link'><?php echo $tukhoa1; ?></a></h1>
                            <h2 class='h2-tukhoa-2'><a href='$link'><?php echo $tukhoa2; ?></a></h2>
                            <div class="col-lg-9 main-content product-sidebar-right mb-0">
                                <div class="product-single-container product-single-default">
                                    <div class="row">

                                        <div class="col-md-6 product-single-gallery">
                                            <div class="product-slider-container">
                                                <div class="label-group">
                                                    <div class="product-label label-hot">HOT</div>
                                                </div>
                                                <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                                    <div class="product-item">
                                                        <img class="product-single-image"
                                                            src="<?php echo $link_hinh; ?>"
                                                            data-zoom-image="<?php echo $link_hinh; ?>"
                                                            width="468" height="468" alt="product" />
                                                    </div>

                                                </div>
                                                <span class="prod-full-screen">
                                                    <i class="icon-plus"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 product-single-details">
                                            <h2 class="product-title"><?php echo $tieude; ?></h2>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:60%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="#" class="rating-link">( 6 Comment )</a>
                                            </div>
                                            <hr class="short-divider">
                                            <div class="price-box">
                                                <span class="product-price"><?php echo $giagoc_formatted; ?></span>
                                            </div>
                                            <div class="product-desc">
                                                <p>
                                                    <?php echo $mota; ?>
                                                </p>
                                            </div>
                                            <ul class="single-info-list">
                                                <li>
                                                    Origin:
                                                    <strong>US</strong>
                                                </li>

                                                <li>
                                                    Product Type:
                                                    <strong>
                                                        <a href="#" class="product-category"><?php echo $thuocloai; ?></a>
                                                    </strong>
                                                </li>
                                            </ul>
                                            <div class="product-action">
                                                <div class="product-single-qty">
                                                    <input class="horizontal-quantity form-control" type="text">
                                                </div>
                                                <a href="https://zalo.me/#/" class="btn-dark add-cart mr-2" target="_blank" title="Add to Cart">Buy Now</a>
                                            </div>


                                            <hr class="divider mb-0 mt-0">

                                            <div class="product-single-share mb-2">
                                                <label class="sr-only">Share:</label>

                                                <div class="social-icons mr-2">
                                                    <a href="#" class="social-icon social-facebook icon-facebook"
                                                        target="_blank" title="Facebook"></a>
                                                    <a href="#" class="social-icon social-twitter icon-twitter"
                                                        target="_blank" title="Twitter"></a>
                                                    <a href="#" class="social-icon social-linkedin fab fa-linkedin-in"
                                                        target="_blank" title="Linkedin"></a>
                                                    <a href="#" class="social-icon social-gplus fab fa-google-plus-g"
                                                        target="_blank" title="Google +"></a>
                                                    <a href="#" class="social-icon social-mail icon-mail-alt"
                                                        target="_blank" title="Mail"></a>
                                                </div>
                                                <a href="wishlist.html" class="btn-icon-wish add-wishlist"
                                                    title="Add to Wishlist"><i class="icon-wishlist-2"></i><span>Add to
                                                        Wishlist</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-single-tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="product-tab-desc" data-toggle="tab"
                                                href="#product-desc-content" role="tab" aria-controls="product-desc-content"
                                                aria-selected="false">Detailed Information</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="product-tab-reviews" data-toggle="tab"
                                                href="#product-reviews-content" role="tab" aria-controls="product-reviews-content"
                                                aria-selected="false">Reviews</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                                            aria-labelledby="product-tab-desc">
                                            <div class="product-desc-content">
                                                <p><?php echo $noidung; ?></p>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="product-reviews-content" role="tabpanel"
                                            aria-labelledby="product-tab-reviews">
                                            <div class="product-reviews-content">
                                                <p class="reviews-title" style="color: #000;">3 Comments for <span><?php echo $tieude; ?></span></p>

                                                <div class="comment-list">
                                                    <?php
                                                    require('db.php');
                                                    $tv = "select * from du_an order by id ASC limit 0,3";
                                                    $tv_1 = mysqli_query($link, $tv);
                                                    $a_tv_1 = mysqli_query($link, $tv);
                                                    ?>
                                                    <?php
                                                    while ($tv_2 = mysqli_fetch_array($tv_1)) {
                                                        $link_hinh = "HinhCTSP/$tv_2[hinhanh]";
                                                        $id = "$tv_2[id]";
                                                        $tieude = "$tv_2[tieude]";
                                                        $mota = "$tv_2[mota]";
                                                        $ngay = "$tv_2[ngay]";
                                                    ?>
                                                        <div class="comments reply">
                                                            <figure class="img-thumbnail">
                                                                <img src="hinhmenu/icon/user.jpg" alt="user"
                                                                    width="80" height="80">
                                                            </figure>

                                                            <div class="comment-block">
                                                                <div class="comment-header">
                                                                    <div class="comment-arrow"></div>

                                                                    <div class="ratings-container float-sm-right">
                                                                        <div class="product-ratings">
                                                                            <span class="ratings" style="width:100%"></span>
                                                                        </div>
                                                                    </div>

                                                                    <span class="comment-by">
                                                                        <strong><?php echo "$tieude"; ?></strong>
                                                                    </span>
                                                                </div>
                                                                <div class="comment-content">
                                                                    <p><?php echo "$mota"; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="reply">
                                                    <div class="title-wrapper text-left">
                                                        <p class="title title-simple text-left text-normal" style="font-size: 20px; color: #000;">Add Your Comment</p>
                                                    </div>

                                                    <div class="rating-form">
                                                        <label for="rating" class="text-dark">Your rating <span
                                                                class="required">*</span></label>
                                                        <span class="rating-stars selected">
                                                            <a class="star-1" href="#">1</a>
                                                            <a class="star-2" href="#">2</a>
                                                            <a class="star-3" href="#">3</a>
                                                            <a class="star-4 active" href="#">4</a>
                                                            <a class="star-5" href="#">5</a>
                                                        </span>

                                                        <select name="rating" id="rating" required=""
                                                            style="display: none;">
                                                            <option value="">Rate…</option>
                                                            <option value="5">Perfect</option>
                                                            <option value="4">Good</option>
                                                            <option value="3">Average</option>
                                                            <option value="2">Not that bad</option>
                                                            <option value="1">Very poor</option>
                                                        </select>
                                                    </div>
                                                    <form action="#">
                                                        <textarea id="reply-message" cols="30" rows="6" class="form-control mb-4" placeholder="Your Comment *" required></textarea>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" id="reply-name" name="reply-name" placeholder="Name *" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="email" class="form-control" id="reply-email" name="reply-email" placeholder="Email *" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-footer">
                                                            <button type="submit" class="btn btn-primary font-weight-normal">Submit Comment</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                            $stt++;
                        }
                        echo "</table>";
                    }
                    ?>
                    <!-- End .col-lg-9 -->

                    <div class="sidebar-overlay"></div>
                    <div class="sidebar-toggle custom-sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
                    <aside class="sidebar-product right-sidebar col-lg-3 mobile-sidebar">
                        <?php include('menu_trai/rightctsanpham.php'); ?>
                    </aside>
                    <!-- End .col-md-3 -->
                </div>

                <!-- End .row -->
                <div class="products-section pt-0">
                    <p class="section-title" style="color: #000; font-weight:bold;">Related Products</h2>

                    <div class="products-slider 5col owl-carousel owl-theme dots-top dots-small">
                        <?php
                        include_once("phan_trang.php");
                        require('db.php');
                        $thuocloai = isset($thuocloai) ? $thuocloai : 0;
                        $p = new pager;
                        $limit = 10;
                        $start = $p->findStart($limit);
                        $count_query = mysqli_query($link, "SELECT * FROM ma_sanpham WHERE thuocloai = " . $thuocloai);
                        $count = mysqli_num_rows($count_query);
                        $pages = $p->findPages($count, $limit);
                        $sql = mysqli_query($link, "SELECT * FROM (SELECT * FROM ma_sanpham WHERE thuocloai = $thuocloai ORDER BY id DESC LIMIT 100) AS latest_20 ORDER BY RAND() LIMIT 9");
                        if (!$sql) {
                            echo "Error: " . mysqli_error($link);
                        }
                        $related_ids = [];
                        while ($tv_2 = mysqli_fetch_array($sql)) {
                            $link_hinh = "HinhCTSP/HinhSanPham/" . $tv_2['hinhanh'];
                            $id = $tv_2['id'];
                            $related_ids[] = $id;
                            //$tieude_en = $tv_2['tieude_en'];
                            $tieude = $tv_2['tieude'];
                            $giagoc = $tv_2['giagoc'];
                            $giagoc_formatted = '$' . number_format($giagoc, 2, '.', ',');
                            $giaban = $tv_2['giaban'];
                            $giaban_formatted = '$' . number_format($giaban, 2, '.', ',');
                            $mota = $tv_2['mota'];
                            //$ngay = $tv_2['ngay'];
                            $url = $tv_2['linkurl'];
                            $link = str_replace("?", "", strtolower("detail/$url"));
                        ?>
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="<?php echo "$link"; ?>">
                                        <img src="<?php echo "$link_hinh"; ?>" width="265"
                                            height="265" alt="product" />
                                    </a>
                                    <div class="btn-icon-group">
                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="#" class="product-category">Outstanding</a>
                                        </div>
                                        <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <p class="product-title">
                                        <a href="<?php echo "$link"; ?>"><?php echo "$tieude"; ?></a>
                                    </p>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="product-price"><?php echo "$giagoc_formatted";
                                                                    ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <hr class="mt-0 m-b-5" />
                <?php
                require('db.php');

                function fetchProducts($link, $condition)
                {
                    $query = "SELECT * FROM (SELECT * FROM ma_sanpham WHERE $condition ORDER BY id DESC LIMIT 100) as recent_news ORDER BY RAND() LIMIT 5";
                    $result = mysqli_query($link, $query);
                    if (!$result) {
                        die('Query failed: ' . mysqli_error($link));
                    }
                    return $result;
                }

                function formatCurrency($amount)
                {
                    return '$' . number_format($amount, 2, '.', ',');
                }

                function displayProduct($row)
                {
                    $link_hinh = "HinhCTSP/HinhSanPham/{$row['hinhanh']}";
                    $tieude = htmlspecialchars($row['tieude'], ENT_QUOTES, 'UTF-8');
                    $giaban_formatted = formatCurrency($row['giaban']);
                    $link = htmlspecialchars(strtolower("detail/{$row['linkurl']}"), ENT_QUOTES, 'UTF-8');
                ?>
                    <div class="product-default left-details product-widget">
                        <figure>
                            <a href="<?php echo $link; ?>">
                                <img src="<?php echo $link_hinh; ?>" width="84" height="84" alt="product">
                                <img src="<?php echo $link_hinh; ?>" width="84" height="84" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <p class="product-title" style="color: #000;"><a href="<?php echo $link; ?>"><?php echo $tieude; ?></a></p>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:100%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="price-box">
                                <span class="product-price"><?php echo $giaban_formatted; ?></span>
                            </div>
                        </div>
                    </div>
                <?php
                }

                $categories = [
                    'Most Popular Products' => 'noibat=1',
                    'Best Selling Products' => 'banchay=1',
                    'Premium Products' => 'khuyenmai=1'
                ];
                ?>

                <div class="product-widgets-container row pb-2">
                    <?php foreach ($categories as $title => $condition): ?>
                        <div class="col-lg-4 col-sm-6 pb-5 pb-md-0">
                            <p class="section-sub-title ls-n-20" style="color: #000; font-weight: bold;"><?php echo $title; ?></p>
                            <?php
                            $products = fetchProducts($link, $condition);
                            while ($row = mysqli_fetch_assoc($products)) {
                                displayProduct($row);
                            }
                            ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
    </div>
    </main>
    </div>
</body>

</html>