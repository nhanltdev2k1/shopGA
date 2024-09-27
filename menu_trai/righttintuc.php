<div class="sidebar-wrapper" data-sticky-sidebar-options='{"offsetTop": 72}'>
    <div class="widget widget-categories">
        <p class="widget-title">Hottest Products Today</p>
        <ul class="list">
            <?php
            require('db.php');

            // Use prepared statements for better security
            $stmt = $link->prepare("SELECT id, thuocloai, name_url FROM loai_ma_sanpham ORDER BY id ASC LIMIT 10");
            $stmt->execute();
            $result = $stmt->get_result();

            // Fetch data and display the category list
            while ($row = $result->fetch_assoc()) {
                $categoryUrl = strtolower($row['name_url']);
                $categoryName = $row['thuocloai'];
            ?>
                <li>
                    <a href="category/<?php echo $categoryUrl; ?>"><?php echo $categoryName; ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>

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
    <div class="widget">
        <p class="widget-title">Tags</p>
        <div class="tagcloud">
            <a href="home">TRENDING SILVER JEWELRY</a>
            <a href="home">BEST-SELLING SILVER JEWELRY</a>
            <a href="home">FASHION SILVER JEWELRY</a>
            <a href="home">MEN'S SILVER JEWELRY</a>
            <a href="home">WOMEN'S SILVER JEWELRY</a>
            <a href="home">LIGHTWEIGHT SILVER JEWELRY</a>
            <a href="home">WATERPROOF SILVER JEWELRY</a>
        </div>
    </div>
</div>