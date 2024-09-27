<div class="sidebar-wrapper" style="padding-top: 3rem;">
    <div class="widget widget-info">
        <ul>
            <li>
                <i class="icon-shipped"></i>
                <p class="h4-left">FREE<br />SHIPPING</p>
            </li>
            <li>
                <i class="icon-us-dollar"></i>
                <p class="h4-left">100% MONEY-BACK<br />GUARANTEE</p>
            </li>
            <li>
                <i class="icon-online-support"></i>
                <p class="h4-left">ONLINE SUPPORT<br />24/7</p>
            </li>
        </ul>
    </div>

    <div class="widget">
        <div class="maga-sale-container custom-maga-sale-container" style="background-color: #f9f9fb;">
            <figure class="mega-image">
                <img src="hinhmenu/banner/banner-product.webp" class="w-100" alt="Banner Desc">
            </figure>

        </div>
    </div>
    <!-- End .widget -->
    <div class="widget widget-post">
        <p class="widget-title">Recent Posts</p>
        <ul class="simple-post-list">
            <?php
            require('db.php');
            // Use a prepared statement to fetch recent posts
            $stmt = $link->prepare("SELECT id, tieude_en, ngay, linkurl FROM tin_tintuc ORDER BY id DESC LIMIT 5");
            $stmt->execute();
            $result = $stmt->get_result();
            // Fetch and display posts
            while ($row = $result->fetch_assoc()) {
                $postLink = str_replace("?", "", strtolower("post/" . $row['linkurl']));
                $postTitle = $row['tieude_en'];
                $postDate = $row['ngay'];
            ?>
                <li>
                    <div class="post-info">
                        <a href="<?php echo $postLink; ?>"><?php echo $postTitle; ?></a>
                        <div class="post-meta"><?php echo $postDate; ?></div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>