    <?php
    $thamso = $_GET['thamso'];
    $did = $_GET["url"];
    class pager
    {
        function findStart($limit)
        {
            if (!isset($_GET['page']) || ($_GET['page'] == "1")) {
                $start = 0;
                $_GET['page'] = 1;
            } else {
                $start = ($_GET['page'] - 1) * $limit;
            }
            return $start;
        }
        function findPages($count, $limit)
        {
            $page = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1;
            return $page;
        }
        function pageList($curpage, $pages)
        {
            $page_list = "<ul class='phantrang'>";

            // First and Previous buttons
            if ($curpage != 1) {
                $page_list .= "<li><a href=tintuc/bantin/page=1 'title=\Trang đầu\><i class='fa fa-backward'></i></a></li>";
                $page_list .= "<li><a href=tintuc/bantin/page=" . ($curpage - 1) . " title=\'Về trang trước\'><i class='fa fa-arrow-left'></i></a></li>";
            }
            // Display a maximum of 3 page links
            $startPage = max(1, $curpage - 1);
            $endPage = min($pages, $curpage + 1);

            for ($i = $startPage; $i <= $endPage; $i++) {
                if ($i == $curpage) {
                    $page_list .= "<li><b>" . $i . "</b></li>";
                } else {
                    $page_list .= "<li><a href=tintuc/bantin/page=" . $i . " title=\'Trang " . $i . "'><font color='red'>" . $i . "</font></a></li>";
                }
            }
            // Next and Last buttons
            if ($curpage < $pages) {
                $page_list .= "<li><a href=tintuc/bantin/page=" . ($curpage + 1) . " title=\'Đến trang sau\'><i class='fa fa-arrow-right'></i></a></li>";
                $page_list .= "<li><a href=tintuc/bantin/page=" . $pages . " title=\'Trang cuối\'><i class='fa fa-forward'></i></a></li>";
            }
            $page_list .= "</ul>";
            return $page_list;
        }
        function nextprev($curpage, $page)
        {
            $next_prev = "";
            if (($curpage - 1) < 0 || ($curpage - 1) != 1) {
                $next_prev .= "Back";
            } else {

                $next_prev = "<a href=\"?p=ds_tin_tintuc&page=" . ($curpage - 1) . "\">Back</a>";
            }
            $next_prev .= "|";
            if (($curpage + 1) > $page) {
                $next_prev .= "Next";
            } else {
                $next_prev = "<a href=\"?p=ds_tin_tintuc&page=" . ($curpage + 1) . "\">Next</a>";
            }
            return $next_prev;
        }
    }
    ?>