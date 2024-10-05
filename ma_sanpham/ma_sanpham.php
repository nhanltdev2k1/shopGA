<h1 style="font-size:0px; margin: 0px; height:0px; color:#fff; padding: 0px;"><a href='https://hackhe.xyz/'>Folding
        bikes for commuters</a></h1>
<h2 style="font-size:0px; margin: 0px; height:0px; color:#fff; padding: 0px;"><a href='https://hackhe.xyz/'>Lightweight
        racing bikes</a></h2>
<h2 style="font-size:0px; margin: 0px; height:0px; color:#fff; padding: 0px;"><a href='https://hackhe.xyz/'>Kids' bikes
        safety</a></h2>

<?php
include('phantrang/phantrang_dichvu.php');
?>

<body>
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <p class="h1-home">Bella Bags Shop</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row align-items-center mb-4 pb-1">
                            <div class="col-12">
                                <div class="product_header">
                                    <div class="product_header_left">
                                        <div class="custom_select">
                                            <select class="form-control form-control-sm" id="categorySelect">
                                                <option value="" selected="selected">Select Type</option>
                                                <?php
                                                require('db.php');
                                                $tv1 = "SELECT * FROM loai_ma_sanpham ORDER BY id ASC";
                                                $tv_11 = mysqli_query($link, $tv1);
                                                while ($tv_21 = mysqli_fetch_array($tv_11)) {
                                                    $name_url = strtolower($tv_21['name_url']);
                                                    $thuocloai = $tv_21['thuocloai'];
                                                ?>
                                                    <option value="category/<?php echo $name_url; ?>"><?php echo $thuocloai; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <script>
                                        document.getElementById('categorySelect').addEventListener('change', function() {
                                            var selectedValue = this.value;
                                            if (selectedValue) {
                                                window.location.href = selectedValue;
                                            }
                                        });
                                    </script>
                                    <div class="product_header_right">
                                        <div class="products_view">
                                            <a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                            <a href="javascript:Void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
                                        </div>
                                        <div class="custom_select">
                                            <select class="form-control form-control-sm">
                                                <option value="">Showing</option>
                                                <option value="9">9</option>
                                                <option value="12">12</option>
                                                <option value="18">18</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row shop_container">
                            <?php
                            require('db.php');
                            $p = new pager;
                            $limit = 9;
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
                                <div class="col-md-4 col-6">
                                    <div class="product">
                                        <div class="product_img">
                                            <a href="<?php echo $link; ?>">
                                                <img src="<?php echo $link_hinh; ?>" alt="<?php echo $tieude; ?>">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart"><a href="<?php echo $link; ?>"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    <li><a href="<?php echo $link; ?>" class="popup-ajaxs"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="<?php echo $link_hinh; ?>" class="popup-ajaxs"><i class="icon-magnifier-add"></i></a></li>
                                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <p class="product_title"><a href="<?php echo $link; ?>"><?php echo $tieude; ?></a></p>
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
                                            <div class="pr_switch_wrap">
                                                <div class="product_color_switch">
                                                    <span class="active" data-color="#87554B"></span>
                                                    <span data-color="#333333"></span>
                                                    <span data-color="#DA323F"></span>
                                                </div>
                                            </div>
                                            <div class="list_product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    <li><a href="<?php echo $link; ?>" class="popup-ajaxs"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="<?php echo $link; ?>" class="popup-ajaxs"><i class="icon-magnifier-add"></i></a></li>
                                                    <li><a href="<?php echo $link; ?>"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            $stmt->close();
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="bgphantranga">
                                    <?php
                                    echo "<div align='left' class='phantrang' style='float: left;width: 100%;text-align: right;'> &nbsp;&nbsp;&nbsp;&nbsp;Page: ";
                                    $pagelist = $p->pageList($_GET['page'], $pages);
                                    echo $pagelist;
                                    echo "</div>"
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                        <?php include('menu_trai/leftsanpham.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>