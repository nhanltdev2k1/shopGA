<body>
    <div class="page-wrapper">
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <?php
                        require('db.php');
                        // Sanitize and prepare the URL parameter
                        $id = mysqli_real_escape_string($link, $_GET['url']);

                        // Use prepared statements to avoid SQL injection
                        $stmt = $link->prepare("SELECT tieude_en FROM tin_tintuc WHERE linkurl LIKE ? ORDER BY id LIMIT 1");
                        $searchTerm = "%{$id}%";
                        $stmt->bind_param('s', $searchTerm);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $tv_2 = $result->fetch_assoc();
                        $title = htmlspecialchars($tv_2['tieude_en'], ENT_QUOTES, 'UTF-8');
                        ?>
                        <li class="breadcrumb-item"><a href="home"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="news/">News</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                    </ol>
                </div>
            </nav>
            <div class="container products-body mb-3">
                <div class="row">
                    <div class="col-lg-9 main-content product-sidebar-right mb-0">
                        <div class="row">
                            <?php
                            include_once("phan_trang.php");

                            $p = new pager;
                            $limit = 1;
                            $start = $p->findStart($limit);

                            // Get the total number of records
                            $stmt = $link->prepare("SELECT COUNT(*) as count FROM tin_tintuc WHERE linkurl LIKE ?");
                            $stmt->bind_param('s', $searchTerm);
                            $stmt->execute();
                            $countResult = $stmt->get_result();
                            $count = $countResult->fetch_assoc()['count'];
                            $pages = $p->findPages($count, $limit);

                            // Fetch paginated results
                            $stmt = $link->prepare("SELECT * FROM tin_tintuc WHERE linkurl LIKE ? ORDER BY id DESC LIMIT ?, ?");
                            $stmt->bind_param('sii', $searchTerm, $start, $limit);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                echo "<table width='100%' border='0' align='left'>";
                                while ($row = $result->fetch_assoc()) {
                                    $title = htmlspecialchars($row['tieude'], ENT_QUOTES, 'UTF-8');
                                    $content = $row['noidung']; // Assuming this may contain HTML
                                    $description = htmlspecialchars($row['mota'], ENT_QUOTES, 'UTF-8');
                                    $title_en = htmlspecialchars($row['tieude_en'], ENT_QUOTES, 'UTF-8');
                                    $keywords1 = htmlspecialchars($row['tukhoa'], ENT_QUOTES, 'UTF-8');
                                    $keywords2 = htmlspecialchars($row['tukhoa2'], ENT_QUOTES, 'UTF-8');
                                    $link = str_replace("?", "", strtolower("post/$url"));
                                    $image = "HinhCTSP/HinhTinTuc/" . $row['hinhanh'];
                                    $image = "HinhCTSP/HinhTinTuc/" . $row['hinhanh'];
                                    $imageTag = "<img src='$image' alt='$title' title='$title' style='text-align: center;'>";
                                    echo "<tr>";
                                    echo "<td align='left' width='100%'>";
                                    echo "<table align='left' width='100%'>
                                        <tr>
                                            <td>
                                                <h1 class='h1-tukhoa'><a href='$link'>$keywords1</a></h1>
                                                <h2 class='h2-tukhoa-1'>$title_en</h2>
                                                <p class='p-tukhoa'><i>$description</i></p>
                                                <div class='div-tukhoa-1'>
                                                    <a href='$link'>$imageTag</a>
                                                </div>
                                                <div class='div-tukhoa-2'>$content</div>
                                                <h2 class='h2-tukhoa-2'><a href='$link'>$keywords2</a></h2>
                                            </td>
                                        </tr>
                                    </table>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="sidebar-overlay"></div>
                    <aside class="sidebar-product right-sidebar col-lg-3 mobile-sidebar">
                        <?php include('menu_trai/righttintuc.php'); ?>
                    </aside>
                </div>
                <div class="products-section pt-0">
                    <p class="section-title" style="color: #000; font-weight:bold;">Related Products</h2>

                    <div class="products-slider 5col owl-carousel owl-theme dots-top dots-small">
                        <?php
                        require('db.php');
                        // Prepared statement for improved security
                        $stmt = $link->prepare("SELECT * FROM (SELECT * FROM ma_sanpham ORDER BY id DESC LIMIT 100) AS recent_news ORDER BY RAND() LIMIT 6");
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
                                        <span class="old-price"><?php echo "$giagoc_formatted";
                                                                ?></span>
                                        <span class="product-price"><?php echo "$giaban_formatted";
                                                                    ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- End .products-slider -->
                </div>
            </div>
        </main>
    </div>
</body>