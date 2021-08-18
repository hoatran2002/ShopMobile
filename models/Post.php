<?php
class Post extends Database {
    function __construct() {
        parent::__construct();
        $this->table = $this->TableName('post');
    }
    function post_detail($slug) {
        $sql = "SELECT * FROM $this->table WHERE post_slug = '$slug' AND post_status = '1'";
        return $this->QueryOne($sql);
    }
    function post_relate($cat, $limt = 4) {
        $sql = "SELECT * FROM $this->table WHERE post_topid = '$cat' AND post_type = 'post' AND post_status = '1' ORDER BY post_createdby DESC LIMIT $limt";
        return $this->QueryAll($sql);
    }
    function post_new($limit = 6) {
        $sql = "SELECT * FROM $this->table WHERE post_status='1' AND post_type = 'post' ORDER BY post_createdat DESC LIMIT $limit";
        return $this->QueryAll($sql);
    }
    function post_all($first, $limit) {
        $sql = "SELECT * FROM $this->table WHERE post_status='1' AND post_type = 'post' ORDER BY post_createdat DESC LIMIT $first,$limit";
        return $this->QueryAll($sql);
    }
    function post_all_count() {
        $sql = "SELECT * FROM $this->table WHERE post_status='1' AND post_type = 'post'";
        return $this->QueryCount($sql);
    }
    function post_topic($catid, $first, $limit) {
        $sql = "SELECT * FROM $this->table WHERE post_status='1' AND post_type = 'post' AND post_topid='$catid' ORDER BY post_createdat DESC LIMIT $first,$limit";
        return $this->QueryAll($sql);
    }
}
?>