<?php
session_start();
ini_set('display_errors', '0');
date_default_timezone_set('Asia/Saigon');
include("db.php");
include("ham/ham.php");
include("ham/catchuoi.php");
include("ngon_ngu/chon.php");
include("title_meta/title_meta.php");

?>
<!DOCTYPE html>
<html lang="en">
<base href="http://localhost:8080/shopga/">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $title_meta; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="hinhmenu/icon/icon-hackhebike.webp" rel="shortcut icon" />
    <link rel="canonical" href="https://hackhe.xyz/" />
    <meta name="twitter:card" content="https://hackhe.xyz/<?php echo $_SERVER['REQUEST_URI']; ?>" />
    <meta name="keywords" content="<?php echo $key; ?>" />
    <meta name="description" content="<?php echo $dis; ?>" />
    <meta property="og:url" content="https://hackhe.xyz/<?php echo $_SERVER['REQUEST_URI']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image:alt" content="https://hackhe.xyz/<?php echo $product['tieude']; ?>" />
    <meta property="og:title" content="https://hackhe.xyz/<?php echo $product['tieude']; ?>" />
    <meta property="og:description" content="https://hackhe.xyz/<?php echo $product['mota']; ?>" />
    <meta property="og:image" content="<?php echo $img; ?>" />
    <meta property="og:updated_time" content="1578214368" />
    <meta property="og:image" content="https://hackhe.xyz/hinhmenu/logo/logo-hackhebike.webp" />
    <meta property="og:description" content="<?php echo $dis; ?>" />
    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700,800']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'sitefaugetglass/sitehackhebikestore/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="sitehackhebikestore/assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="sitehackhebikestore/assets/css/demo27.min.css">
    <link rel="stylesheet" type="text/css" href="sitehackhebikestore/assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css"
        href="sitehackhebikestore/assets/vendor/simple-line-icons/css/simple-line-icons.min.css">

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "name": "hackhe bike store",
            "url": "https://hackhe.xyz/"
        }
    </script>
</head>

<body>

    <body>
        <div class="loading-overlay">
            <div class="bounce-loader">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <div class="mobile-menu-overlay"></div>
        <div class="mobile-menu-container">
            <div class="mobile-menu-wrapper">
                <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
                <nav class="mobile-nav">
                    <ul class="mobile-menu">
                        <li><a href="home">Home</a></li>
                        <li>
                            <a href="about/website-information-overview">About</a>
                        </li>
                        <li>
                            <a href="product" class="sf-with-ul">Product</a>
                            <div class="megamenu megamenu-fixed-width">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="submenu">
                                            <?php
                                            require('db.php');
                                            $tv1 = "SELECT * FROM loai_ma_sanpham ORDER BY id ASC";
                                            $tv_11 = mysqli_query($link, $tv1);
                                            while ($tv_21 = mysqli_fetch_array($tv_11)) {
                                                $id = $tv_21['id'];
                                                $thuocloai = $tv_21['thuocloai'];
                                                $name_url = strtolower($tv_21['name_url']);
                                            ?>
                                                <li><a
                                                        href="category/<?php echo $name_url; ?>"><?php echo $thuocloai; ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="news/">Blog</a>
                        </li>
                        <li>
                            <a href="contact">Contact</a>
                        </li>
                        <ul class="mobile-menu">
                            <li><a href="#">Account</a></li>
                            <li><a href="#">Favourite</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#" class="login-link">Login</a></li>
                        </ul>
                </nav>
                <form class="search-wrapper mb-2" action="#">
                    <input type="text" class="form-control mb-0" placeholder="Search..." required />
                    <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
                </form>
                <div class="social-icons">
                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
                    </a>
                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
                    </a>
                    <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
                    </a>
                </div>
            </div>
        </div>

        <!-- End .newsletter-popup -->

        <div class="sticky-navbar">
            <div class="sticky-info">
                <a href="home">
                    <i class="icon-home"></i>Home
                </a>
            </div>
            <div class="sticky-info">
                <a href="product" class="">
                    <i class="icon-bars"></i>Product
                </a>
            </div>
            <div class="sticky-info">
                <a href="news/" class="">
                    <i class="icon-business-book"></i>Blog
                </a>
            </div>
            <div class="sticky-info">
                <a href="contact" class="">
                    <i class="icon-phone-1"></i>Contact
                </a>
            </div>
            <div class="sticky-info">
                <a href="#" class="">
                    <i class="icon-user-2"></i>Account
                </a>
            </div>

        </div>
        <?php
        include("xu_ly_post_get/xu_ly_post_get.php");
        ?>
        <?php
        include('menutopdidong/menutopdidong.php');
        ?>
        <?php
        include('bienluan_phanthan.php');
        ?>
        <?php
        include('jqueryfooter/footertc.php');

        ?>


    </body>
    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="sitehackhebikestore/assets/js/jquery.min.js"></script>
    <script src="sitehackhebikestore/assets/js/bootstrap.bundle.min.js"></script>
    <script src="sitehackhebikestore/assets/js/plugins.min.js"></script>
    <script src="sitehackhebikestore/assets/js/nouislider.min.js"></script>
    <!-- Main JS File -->
    <script src="sitehackhebikestore/assets/js/main.min.js"></script>

</html>