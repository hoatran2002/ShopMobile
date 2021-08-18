<?php
class Category extends Database {
    function __construct() {
        parent::__construct();
        $this->table = $this->TableName('category');
    }
    function category_parentid($parentid = 0) {
        $sql = "SELECT * FROM $this->table WHERE category_status='1' AND category_parentid='$parentid' ORDER BY category_order ASC";
        return $this->QueryAll($sql);
    }
    function category_listid($catid) {
        $arr = array();
        $arr[] = $catid;
        $list1 = $this->category_parentid($catid);
        if (count($list1)) {
            foreach ($list1 as $row1) {
                $arr[] = $row1['category_id'];
                $list2 = $this->category_parentid($row1['category_id']);
                if (count($list2)) {
                    foreach ($list2 as $row2) {
                        $arr[] = $row2['category_id'];
                        $list3 = $this->category_parentid($row2['category_id']);
                        if (count($list3)) {
                            foreach ($list3 as $row3) {
                                $arr[] = $row3['category_id'];
                            }
                        }
                    }
                }
            }
        }
        return $arr;
    }
    function category_rowslug($slug) {
        $sql = "SELECT * FROM $this->table WHERE category_status='1' AND category_slug='$slug'";
        return $this->QueryOne($sql);
    }
    function category_rowid($catid) {
        $sql = "SELECT * FROM $this->table WHERE category_status='1' AND category_id='$catid'";
        return $this->QueryOne($sql);
    }
}
?>