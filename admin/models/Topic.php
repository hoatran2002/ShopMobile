<?php
class Topic extends Database {
    function __construct() {
        parent::__construct();
        $this->table = $this->TableName('topic');
    }
    function topic_list($page = true) {
        if ($page == true) {
            $sql = "SELECT * FROM $this->table WHERE topic_status !='0'";
        } else {
            $sql = "SELECT * FROM $this->table WHERE topic_status ='0'";
        }
        return $this->QueryAll($sql);
    }
    function topic_all() {
        $sql = "SELECT * FROM $this->table";
        return $this->QueryAll($sql);
    }
    function topic_rowid($id) {
        $sql = "SELECT * FROM $this->table WHERE topic_id ='$id'";
        return $this->QueryOne($sql);
    }
    function topic_update($data, $id) {
        $strset = '';
        foreach ($data as $f => $v) {
            $strset.= $f . "='$v',";
        }
        $strset = rtrim(rtrim($strset), ',');
        $sql = "UPDATE $this->table SET $strset WHERE topic_id = '$id'";
        $this->QueryNoResult($sql);
    }
    function topic_insert($data) {
        $strf = '';
        $strv = '';
        foreach ($data as $f => $v) {
            $strf.= $f . ",";
            $strv.= "'$v',";
        }
        $strf = rtrim(rtrim($strf), ',');
        $strv = rtrim(rtrim($strv), ',');
        $sql = "INSERT INTO $this->table ($strf) VALUES ($strv)";
        $this->QueryNoResult($sql);
    }
    function topic_slug_exists($slug) {
        $sql = "SELECT * FROM $this->table WHERE topic_slug = '$slug'";
        if ($this->QueryCount($sql) != 0) {
            return FALSE;
        }
        return TRUE;
    }
}