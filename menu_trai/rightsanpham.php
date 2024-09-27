<div class="sidebar-wrapper" data-sticky-sidebar-options='{"minWidth": 768, "offsetTop": 72}'>
    <div class="widget">
        <p class="widget-title">
            <a data-toggle="collapse" href="#widget-body-8" role="button" aria-expanded="true" aria-controls="widget-body-8">Featured News</a>
        </p>
        <div class="collapse show" id="widget-body-8">
            <div class="widget-body">
                <?php
                require('db.php');
                $tv = "SELECT * FROM (SELECT * FROM tin_tintuc ORDER BY id DESC LIMIT 100) as recent_news ORDER BY RAND() LIMIT 3";
                $tv_1 = mysqli_query($link, $tv);
                ?>
                <?php
                while ($row = mysqli_fetch_array($tv_1)) {
                    $link_hinh = "HinhCTSP/Hinhdichvu/$row[hinhanh]";
                    $id = "$row[id]";
                    $tieude_en = "$row[tieude_en]";
                    $tieude = "$row[tieude]";
                    $mota = "$row[mota]";
                    $ngay = "$row[ngay]";
                    $url = $row['linkurl'];
                    $link = str_replace("?", "", strtolower("post/$url"));
                ?>
                    <p><a href="<?php echo "$link"; ?>" style="color: #000;"><?php echo "- $tieude_en"; ?></a></p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="widget widget-banner pb-2">
        <div class="product-category">
            <a href="hinhmenu/banner/Banner-menu.webp">
                <figure>
                    <img src="hinhmenu/banner/Banner-menu.webp" width="266" height="266" alt="Banner" />
                </figure>
            </a>
        </div>
    </div>
</div>