<?php
class Phantrang {
    function pageCurrent() {
        $page = 1;
        if (isset($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        }
        return $page;
    }
    function pageFirst($current, $limit) {
        return ($current - 1) * $limit;
    }
    function pageLink($total, $limit, $url) {
        $pageNum = ceil($total / $limit);
        $pageLink = '';
        for ($i = 1; $i <= $pageNum; $i++) {
            if($this->pageCurrent() == $i)
                $pageLink.= '<li class="active">' . $i . '</li>';
            else
                $pageLink.= '<li><a href="'.$url.'&page=' . $i . '">' . $i . '</a></li>';
        }
        return $pageNum <= 1 ? '' : $pageLink;
    }
}
?>