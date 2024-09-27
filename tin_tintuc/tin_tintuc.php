<h1 style="font-size:0px; margin: 0px; height:0px; color:#fff; padding: 0px;"><a href='https://hackhe.xyz/'>Best city bikes</a></h1>
<h2 style="font-size:0px; margin: 0px; height:0px; color:#fff; padding: 0px;"><a href='https://hackhe.xyz/'>Mountain bikes for beginners</a></h2>
<h2 style="font-size:0px; margin: 0px; height:0px; color:#fff; padding: 0px;"><a href='https://hackhe.xyz/'>Women’s cycling apparel</a></h2>

<?php
require('db.php');
include('phantrang/phantrang_tintuc.php');
// Helper function to escape output
function escape($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
// Initialize pager and set limit
$p = new pager;
$limit = 12;
$start = $p->findStart($limit);

// Count total items and calculate total pages
$countResult = mysqli_query($link, "SELECT COUNT(*) AS total FROM tin_tintuc");
$countRow = mysqli_fetch_assoc($countResult);
$count = $countRow['total'];
$pages = $p->findPages($count, $limit);

// Fetch paginated data
$sql = mysqli_query($link, "SELECT * FROM tin_tintuc ORDER BY id DESC LIMIT $start, $limit");
?>

<body>
    <div class="page-wrapper">
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">News</li>
                    </ol>
                </div>
            </nav>
            <div class="container">
                <div class="container-fluid products-body mb-3">
                    <div class="row">
                        <div class="col-lg-9 main-content product-sidebar-right mb-0" style="padding-top: 20px;">
                            <div class="row">
                                <?php while ($row = mysqli_fetch_assoc($sql)): ?>
                                    <?php
                                    $id = $row['id'];
                                    $ten = escape($row['ten']);
                                    $hinhanh = escape($row['hinhanh']);
                                    $tieude = escape($row['tieude']);
                                    $tieude_en = escape($row['tieude_en']);
                                    $mota = escape($row['mota']);
                                    $ngay = escape($row['ngay']);
                                    $url = escape($row['linkurl']);
                                    $link = strtolower("post/$url");
                                    ?>
                                    <div class="col-md-3 product-single-gallery">
                                        <article class="post">
                                            <div class="post-media">
                                                <a href="<?php echo $link; ?>">
                                                    <img src="HinhCTSP/HinhTinTuc/<?php echo $hinhanh; ?>" alt="<?php echo $tieude_en; ?>" width="225" height="280">
                                                </a>
                                                <div class="post-date">
                                                    <span class="day"><?php echo $ngay; ?></span>
                                                </div>
                                            </div>
                                            <div class="post-body">
                                                <p class="post-title">
                                                    <a href="<?php echo $link; ?>"><?php echo $tieude_en; ?></a>
                                                </p>
                                                <div class="post-content">
                                                    <p><?php echo $mota; ?></p>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                <?php endwhile; ?>
                            </div>

                            <div class="bgphantranga">
                                <div class="phantrang" style="float: left; width: 100%; text-align: right;">
                                    <?php
                                    echo 'Page: ';
                                    echo $p->pageList($_GET['page'], $pages);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <aside class="sidebar-product right-sidebar col-lg-3 mobile-sidebar">
                            <?php include('menu_trai/righttintuc.php'); ?>
                        </aside>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>