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
<base href="http://localhost/shopga/">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $title_meta; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="hinhmenu/icon/icon-okhotelbike.webp" rel="shortcut icon" />
    <link rel="canonical" href="https://okhotel.xyz/" />
    <meta name="twitter:card" content="https://okhotel.xyz/<?php echo $_SERVER['REQUEST_URI']; ?>" />
    <meta name="keywords" content="<?php echo $key; ?>" />
    <meta name="description" content="<?php echo $dis; ?>" />
    <meta property="og:url" content="https://okhotel.xyz/<?php echo $_SERVER['REQUEST_URI']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image:alt" content="https://okhotel.xyz/<?php echo $product['tieude']; ?>" />
    <meta property="og:title" content="https://okhotel.xyz/<?php echo $product['tieude']; ?>" />
    <meta property="og:description" content="https://okhotel.xyz/<?php echo $product['mota']; ?>" />
    <meta property="og:image" content="<?php echo $img; ?>" />
    <meta property="og:updated_time" content="1578214368" />
    <meta property="og:image" content="https://okhotel.xyz/hinhmenu/logo/logo-okhotelbike.webp" />
    <meta property="og:description" content="<?php echo $dis; ?>" />

    <link rel="stylesheet" href="cssokhotel/assets/css/animate.css">
    <link rel="stylesheet" href="cssokhotel/assets/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="cssokhotel/assets/css/all.min.css">
    <link rel="stylesheet" href="cssokhotel/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="cssokhotel/assets/css/themify-icons.css">
    <link rel="stylesheet" href="cssokhotel/assets/css/linearicons.css">
    <link rel="stylesheet" href="cssokhotel/assets/css/flaticon.css">
    <link rel="stylesheet" href="cssokhotel/assets/css/simple-line-icons.css">
    <link rel="stylesheet" href="cssokhotel/assets/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="cssokhotel/assets/owlcarousel/css/owl.theme.css">
    <link rel="stylesheet" href="cssokhotel/assets/owlcarousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="cssokhotel/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="cssokhotel/assets/css/slick.css">
    <link rel="stylesheet" href="cssokhotel/assets/css/slick-theme.css">
    <link rel="stylesheet" href="cssokhotel/assets/css/style.css">
    <link rel="stylesheet" href="cssokhotel/assets/css/responsive.css">

    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebSite",
        "name": "okhotel store",
        "url": "https://okhotel.xyz/"
    }
    </script>
</head>

<body>
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
<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

<script src="cssokhotel/assets/js/jquery-1.12.4.min.js"></script>
<script src="cssokhotel/assets/js/popper.min.js"></script>
<script src="cssokhotel/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="cssokhotel/assets/owlcarousel/js/owl.carousel.min.js"></script>
<script src="cssokhotel/assets/js/magnific-popup.min.js"></script>
<script src="cssokhotel/assets/js/waypoints.min.js"></script>
<script src="cssokhotel/assets/js/parallax.js"></script>
<script src="cssokhotel/assets/js/jquery.countdown.min.js"></script>
<script src="cssokhotel/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="cssokhotel/assets/js/isotope.min.js"></script>
<script src="cssokhotel/assets/js/jquery.dd.min.js"></script>
<script src="cssokhotel/assets/js/slick.min.js"></script>
<script src="cssokhotel/assets/js/jquery.elevatezoom.js"></script>
<script src="cssokhotel/assets/js/scripts.js"></script>

</html>