<h1 style="font-size:0px; margin: 0px; height:0px; color:#fff; margin: 0px; padding: 0px;"><a href='https://henryshop.site/'>Top Sunscreens for Sensitive Skin</a></h1>
<h2 style="font-size:0px; margin: 0px; height:0px; color:#fff; margin: 0px; padding: 0px;"><a href='https://henryshop.site/'>Best Facial Cleansers for Acne-Prone Skin</a></h2>
<h2 style="font-size:0px; margin: 0px; height:0px; color:#fff; margin: 0px; padding: 0px;"><a href='https://henryshop.site/'>Long-Lasting Matte Lipsticks</a></h2>

<body>
    <div class="page-wrapper">
        <main class="main">
            <div class="page-wrapper">
                <main class="main">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav">
                        <div class="container">
                            <ol class="breadcrumb">
                                <?php
                                require('db.php');
                                //$id = intval(preg_replace('/[^a-z0-9]+/i', '', $_GET["id"]));
                                $id = $_GET['url'];
                                $tv = "select * from gioi_thieu where linkurl like '%" . $id . "%' order by id ";
                                $tv_1 = mysqli_query($link, $tv);
                                $a_tv_1 = mysqli_query($link, $tv);
                                $tv_2 = mysqli_fetch_array($tv_1);
                                $thuocloai = "$tv_2[thuocloai]";
                                $ten = "$tv_2[tieude]";
                                ?>
                                <li class="breadcrumb-item"><a href="home"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo "$ten" ?></li>
                            </ol>
                        </div>
                    </nav>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 main-content">
                                <div class="row">
                                    <?php
                                    include_once("phan_trang.php");
                                    require('db.php');
                                    $p = new pager;
                                    $limit = 1;
                                    $start = $p->findStart($limit);
                                    $count = mysqli_num_rows(mysqli_query($link, "SELECT*FROM gioi_thieu"));
                                    $pages = $p->findPages($count, $limit);
                                    $id = $_REQUEST["url"];
                                    $result = mysqli_query($link, "SELECT * FROM gioi_thieu where linkurl like '%" . $id . "%' order by id desc limit $start,$limit");
                                    // hiển thị DL
                                    if (mysqli_num_rows($result) <> 0) {
                                        echo " <table width='100%' border='0' align='left'>";
                                        $stt = 0;
                                        while ($row = mysqli_fetch_object($result)) {
                                            $ngay = $row->ngay;
                                            $thuocloai = $row->thuocloai;
                                            $tieude = doikyty($row->tieude);
                                            $noidung = doikyty($row->noidung);
                                            $mota = doikyty($row->mota);
                                            $tieude_en = doikyty($row->tieude_en);
                                            $facebook = $row->facebook;
                                            $tukhoa = $row->tukhoa;
                                            $url = khongdau($row->tieude);
                                            $link = "thong-tin-$url-$id";
                                            $hinhanh = "HinhCTSP/HinhTinTuc/" . $row->hinhanh;
                                            $hinhanh = "<img src='$hinhanh'  text-align: center; alt='$tieude' title='$tieude'  >  ";
                                            if ($stt % 2 == 0) {
                                                echo "<tr>";
                                            }
                                            echo "<td align='left' width='100%'>";
                                            echo "<table align='left' width='100%'>";
                                            echo "<div >
                                            <h1 class='h1-tukhoa'></i><a href='$link'>$tieude</a></h1>
                                                <h2 class='h2-tukhoa-1'> $tieude_en</h2>
                                                <p class='p-tukhoa'> <i>$mota </i></p>
                                                <div class='div-tukhoa-2'>
                                                $noidung
                                                </div>
                                                <h2 class='h2-tukhoa-2'></i><a href='$link'>$tukhoa</a></h2>
                                            </div>";
                                            echo " </table>";
                                            echo "</td>";
                                            $stt = $stt + 1;

                                            if ($stt % 1 == 0) {
                                                echo "</tr>";
                                            }
                                        }
                                        echo " </table>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
</body>