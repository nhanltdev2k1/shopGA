    <footer class="bg_gray">
        <div class="footer_top small_pt pb_20">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="widget">
                            <div class="footer_logo">
                                <a href="#"><img src="hinhmenu/logo/okhotel-white.webp" alt="logo" /></a>
                            </div>
                            <?php
                            require('db.php');
                            $query = "SELECT * FROM tin_thicong WHERE thuocloai = 2 AND id IN (1,2, 3, 4)";
                            $result = mysqli_query($link, $query);
                            $contact_info = [];

                            while ($row = mysqli_fetch_assoc($result)) {
                                $contact_info[$row['id']] = htmlspecialchars($row['mota']);
                            }
                            ?>
                            <p class="mb-3"><?php echo $contact_info[1] ?? 'No meta found'; ?></p>
                            <ul class="contact_info">
                                <li>
                                    <i class="ti-location-pin"></i>
                                    <p><?php echo $contact_info[2] ?? 'No address found'; ?></p>
                                </li>
                                <li>
                                    <i class="ti-email"></i>
                                    <a href="mailto:<?php echo $contact_info[3] ?? ''; ?>"><?php echo $contact_info[3] ?? 'No phone found'; ?></a>
                                </li>
                                <li>
                                    <i class="ti-mobile"></i>
                                    <p><?php echo $contact_info[4] ?? 'No email found'; ?></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="widget">
                            <p class="widget_title" style="color:#000;">Useful Links</p>
                            <ul class="widget_links">
                                <?php
                                require('db.php');
                                $tv = "select * from gioi_thieu order by id asc limit 0,4";
                                $tv_1 = mysqli_query($link, $tv);
                                $a_tv_1 = mysqli_query($link, $tv);
                                ?>
                                <?php
                                while ($tv_2 = mysqli_fetch_array($tv_1)) {
                                    $link_hinh = "HinhCTSP/$tv_2[hinhanh]";
                                    $id = "$tv_2[id]";
                                    $tieude_en = "$tv_2[tieude_en]";
                                    $tieude = "$tv_2[tieude]";
                                    $mota = "$tv_2[mota]";
                                    $ngay = "$tv_2[ngay]";
                                    $url = $tv_2['linkurl'];
                                    $link = str_replace("?", "", strtolower("about/$url"));
                                ?>
                                    <li><a href="<?php echo "$link"; ?>"><?php echo $tieude; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="widget">
                            <h6 class="widget_title">My Account</h6>
                            <ul class="widget_links">
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
                                    <h3 class="p-text-footer" style="font-size: 16px; color:#687188;">
                                        <a href="<?php echo $link; ?>" style="color:#687188;">
                                            <i class="fa fa-fire"></i> <?php echo $tieude_en; ?>
                                        </a>
                                    </h3>
                                    <br>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="widget">
                            <h6 class="widget_title">Instagram</h6>
                            <ul class="widget_instafeed instafeed_col4">
                                <?php
                                require('db.php');
                                // Prepared statement for improved security
                                $stmt = $link->prepare("SELECT * FROM (SELECT * FROM tin_sanpham ORDER BY id DESC LIMIT 100) AS recent_news ORDER BY RAND() LIMIT 8");
                                $stmt->execute();
                                $result = $stmt->get_result();

                                // Fetch data and display products
                                while ($row = $result->fetch_assoc()) {
                                    $link_hinh = "HinhCTSP/Hinhdichvu/" . htmlspecialchars($row['hinhanh']);
                                    $tieude = htmlspecialchars($row['tieude']);
                                    $url = htmlspecialchars($row['linkurl']);
                                    $giagoc = '$' . number_format($row['giagoc'], 2, '.', ',');
                                    $link = str_replace("?", "", strtolower("detail/$url"));
                                ?>
                                    <li><a href="#"><img src="<?php echo $link_hinh; ?>" alt="<?php echo $tieude; ?>"><span
                                                class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <?php
                                }
                                $stmt->close();
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="middle_footer">
            <div class="custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="shopping_info">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="icon_box icon_box_style2">
                                        <div class="icon">
                                            <i class="flaticon-shipped"></i>
                                        </div>
                                        <div class="icon_box_content">
                                            <p class="h4-home" style="font-size: 16px;">Free Delivery</p>
                                            <p>Enjoy fast and free delivery on all orders, ensuring your purchase arrives safely and on time.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="icon_box icon_box_style2">
                                        <div class="icon">
                                            <i class="flaticon-money-back"></i>
                                        </div>
                                        <div class="icon_box_content">
                                            <p class="h4-home" style="font-size: 16px;">30 Day Returns Guarantee</p>
                                            <p>Shop with confidence knowing you can return your purchase within 30 days for a full refund.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="icon_box icon_box_style2">
                                        <div class="icon">
                                            <i class="flaticon-support"></i>
                                        </div>
                                        <div class="icon_box_content">
                                            <p class="h4-home" style="font-size: 16px;">24/7 Online Support</p>
                                            <p>We’re here to assist you anytime, with round-the-clock online support for your convenience.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom_footer border-top-tran">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-4">
                        <p class="mb-lg-0 text-center">© 2020 All Rights Reserved by okhotel.xyz
                        </p>
                    </div>
                    <div class="col-lg-4 order-lg-first">
                        <div class="widget mb-lg-0">
                            <ul class="social_icons text-center text-lg-left">
                                <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#" class="sc_google"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <ul class="footer_payment text-center text-lg-right">
                            <li><a href="#"><img src="hinhmenu/payments/visa.png" alt="visa"></a></li>
                            <li><a href="#"><img src="hinhmenu/payments/discover.png" alt="discover"></a></li>
                            <li><a href="#"><img src="hinhmenu/payments/master_card.png" alt="master_card"></a>
                            </li>
                            <li><a href="#"><img src="hinhmenu/payments/paypal.png" alt="paypal"></a></li>
                            <li><a href="#"><img src="hinhmenu/payments/amarican_express.png"
                                        alt="amarican_express"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>