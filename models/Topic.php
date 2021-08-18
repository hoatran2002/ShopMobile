<?php
class Topic extends Database {
    function __construct() {
        parent::__construct();
        $this->table = $this->TableName('topic');
    }
    function topic_parentid($parentid = 0) {
        $sql = "SELECT * FROM $this->table WHERE topic_status='1' AND topic_parentid='$parentid' ORDER BY topic_order ASC";
        return $this->QueryAll($sql);
    }
    function topic_listid($catid) {
        $arr = array();
        $arr[] = $catid;
        $list1 = $this->topic_parentid($catid);
        if (count($list1)) {
            foreach ($list1 as $row1) {
                $arr[] = $row1['topic_id'];
                $list2 = $this->topic_parentid($row1['topic_id']);
                if (count($list2)) {
                    foreach ($list2 as $row2) {
                        $arr[] = $row2['topic_id'];
                        $list3 = $this->topic_parentid($row2['topic_id']);
                        if (count($list3)) {
                            foreach ($list3 as $row3) {
                                $arr[] = $row3['topic_id'];
                            }
                        }
                    }
                }
            }
        }
        return $arr;
    }
    function topic_rowslug($slug) {
        $sql = "SELECT * FROM $this->table WHERE topic_status='1' AND topic_slug='$slug'";
        return $this->QueryOne($sql);
    }
    function topic_rowid($topid) {
        $sql = "SELECT * FROM $this->table WHERE topic_status='1' AND topic_id='$topid'";
        return $this->QueryOne($sql);
    }
}
?>