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
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'sitehackhebikestore/siteshopga/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="stylesheet" href="siteshopga/assets/css/animate.css">
    <link rel="stylesheet" href="siteshopga/assets/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="siteshopga/assets/css/all.min.css">
    <link rel="stylesheet" href="siteshopga/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="siteshopga/assets/css/themify-icons.css">
    <link rel="stylesheet" href="siteshopga/assets/css/linearicons.css">
    <link rel="stylesheet" href="siteshopga/assets/css/flaticon.css">
    <link rel="stylesheet" href="siteshopga/assets/css/simple-line-icons.css">
    <link rel="stylesheet" href="siteshopga/assets/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="siteshopga/assets/owlcarousel/css/owl.theme.css">
    <link rel="stylesheet" href="siteshopga/assets/owlcarousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="siteshopga/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="siteshopga/assets/css/slick.css">
    <link rel="stylesheet" href="siteshopga/assets/css/slick-theme.css">
    <link rel="stylesheet" href="siteshopga/assets/css/style.css">
    <link rel="stylesheet" href="siteshopga/assets/css/responsive.css">

</head>

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
    <div class="preloader">
        <div class="lds-ellipsis">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <?php
    include("xu_ly_post_get/xu_ly_post_get.php");
    ?>
    <?php
    include('menutopdidong/menutopdidong.php');
    ?>
    <?php
    include('side/side.php');
    ?>
    <?php
    include('bienluan_phanthan.php');
    ?>
    <?php
    include('jqueryfooter/footertc.php');

    ?>


</body>
<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

<script src="siteshopga/assets/js/jquery-1.12.4.min.js"></script>
<script src="siteshopga/assets/js/popper.min.js"></script>
<script src="siteshopga/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="siteshopga/assets/owlcarousel/js/owl.carousel.min.js"></script>
<script src="siteshopga/assets/js/magnific-popup.min.js"></script>
<script src="siteshopga/assets/js/waypoints.min.js"></script>
<script src="siteshopga/assets/js/parallax.js"></script>
<script src="siteshopga/assets/js/jquery.countdown.min.js"></script>
<script src="siteshopga/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="siteshopga/assets/js/isotope.min.js"></script>
<script src="siteshopga/assets/js/jquery.dd.min.js"></script>
<script src="siteshopga/assets/js/slick.min.js"></script>
<script src="siteshopga/assets/js/jquery.elevatezoom.js"></script>
<script src="siteshopga/assets/js/scripts.js"></script>

</html>