<div class="sidebar-wrapper">
    <div class="widget">
        <p class="widget-title">
            <a data-toggle="collapse" href="#widget-body-1" role="button" aria-expanded="true"
                aria-controls="widget-body-1">Categories</a>
        </p>

        <div class="collapse show" id="widget-body-1">
            <div class="widget-body">
                <ul class="cat-list">
                    <?php
                    require('db.php');

                    // Fetch all categories in one query
                    $stmt = $link->prepare("SELECT id, thuocloai, name_url FROM loai_ma_sanpham ORDER BY id ASC");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Initialize arrays to store categories
                    $bicycles = [];
                    $trainingEquipment = [];

                    // Fetch and categorize results
                    $count = 0;
                    while ($row = $result->fetch_assoc()) {
                        $count++;
                        if ($count <= 5) {
                            $bicycles[] = $row;
                        } else {
                            $trainingEquipment[] = $row;
                        }
                    }
                    ?>
                    <!-- Bicycles Section -->
                    <li>
                        <a href="#widget-category-1" data-toggle="collapse" role="button" aria-expanded="true"
                            aria-controls="widget-category-1">Bicycles<span class="products-count">(<?php echo count($bicycles); ?>)</span>
                            <span class="toggle"></span></a>
                        <div class="collapse show" id="widget-category-1">
                            <ul class="cat-sublist">
                                <?php foreach ($bicycles as $category) { ?>
                                    <li>
                                        <a href="category/<?php echo strtolower($category['name_url']); ?>">
                                            <?php echo $category['thuocloai']; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <!-- Training & Equipment Section -->
                    <li>
                        <a href="#widget-category-2" data-toggle="collapse" role="button" aria-expanded="true"
                            aria-controls="widget-category-2">Training & Equipment<span class="products-count">(<?php echo count($trainingEquipment); ?>)</span>
                            <span class="toggle"></span></a>
                        <div class="collapse show" id="widget-category-2">
                            <ul class="cat-sublist">
                                <?php foreach ($trainingEquipment as $category) { ?>
                                    <li>
                                        <a href="category/<?php echo strtolower($category['name_url']); ?>">
                                            <?php echo $category['thuocloai']; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="widget widget-price">
        <p class="widget-title">
            <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
                aria-controls="widget-body-2">Price</a>
        </p>

        <div class="collapse show" id="widget-body-2">
            <div class="widget-body pb-0">
                <form action="#">
                    <div class="price-slider-wrapper">
                        <div id="price-slider"></div>
                    </div>

                    <div
                        class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                        <div class="filter-price-text">
                            Price:
                            <span id="filter-price-range"></span>
                        </div>

                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="widget widget-color">
        <p class="widget-title">
            <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true"
                aria-controls="widget-body-3">Color</a>
        </p>

        <div class="collapse show" id="widget-body-3">
            <div class="widget-body pb-0">
                <ul class="config-swatch-list">
                    <li class="active">
                        <a href="#" style="background-color: #000;">Black</a>
                    </li>
                    <li>
                        <a href="#" style="background-color: #0188cc;">Blue</a>
                    </li>
                    <li>
                        <a href="#" style="background-color: #81d742;">Green</a>
                    </li>
                    <li>
                        <a href="#" style="background-color: #eded65;">Yellow</a>
                    </li>
                    <li>
                        <a href="#" style="background-color: #6085a5;">Indigo</a>
                    </li>
                    <li>
                        <a href="#" style="background-color: #ab6e6e;">Red</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="widget">
        <p class="widget-title">
            <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true"
                aria-controls="widget-body-4">Sizes</a>
        </p>

        <div class="collapse show" id="widget-body-4">
            <div class="widget-body">
                <ul class="cat-list">
                    <li><a href="#">Extra Large</a></li>
                    <li><a href="#">Large</a></li>
                    <li><a href="#">Medium</a></li>
                    <li><a href="#">Small</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="widget widget-featured pb-0">
        <p class="widget-title">Featured Products</p>
        <?php
        require('db.php');
        // Prepared statement for improved security
        $stmt = $link->prepare("SELECT * FROM (SELECT * FROM ma_sanpham WHERE noibat=1 ORDER BY id DESC LIMIT 100) AS recent_news ORDER BY RAND() LIMIT 5");
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
            <div class="widget-body">
                <div class="featured-col">
                    <div class="product-default left-details product-widget">
                        <figure>
                            <a href="<?php echo $link; ?>">
                                <img src="<?php echo $link_hinh; ?>"
                                    width="75" height="75" alt="<?php echo $tieude; ?>" />
                            </a>
                        </figure>
                        <div class="product-details">
                            <p class="p-product-title product-title">
                                <a href="<?php echo $link; ?>"><?php echo $tieude; ?></a>
                            </p>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="price-box">
                                <span class="product-price"><?php echo $giaban_formatted; ?></span>
                            </div>
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