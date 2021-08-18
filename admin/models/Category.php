<?php
class Category extends Database {
    function __construct() {
        parent::__construct();
        $this->table = $this->TableName('category');
    }
    function category_listall() {
        $sql = "SELECT * FROM $this->table";
        return $this->QueryAll($sql);
    }
    function category_listp($c = true) {
        if($c)
            $sql = "SELECT * FROM $this->table WHERE category_parentid = '0' AND category_status = '1'";
        else
            $sql = "SELECT * FROM $this->table WHERE category_parentid = '0' AND category_status != '0'";
        return $this->QueryAll($sql);
    }
    function category_list($pid) {
        $sql = "SELECT * FROM $this->table WHERE category_parentid = '$pid' AND category_status = '1'";
        return $this->QueryAll($sql);
    }
    function category_rowid($id) {
        $sql = "SELECT * FROM $this->table WHERE category_id ='$id'";
        return $this->QueryOne($sql);
    }
    function category_update($data, $id) {
        $strset = '';
        foreach ($data as $f => $v) {
            $strset.= $f . "='$v',";
        }
        $strset = rtrim(rtrim($strset), ',');
        $sql = "UPDATE $this->table SET $strset WHERE category_id = '$id'";
        $this->QueryNoResult($sql);
    }
    function category_insert($data) {
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
    function category_slug_exists($slug) {
        $sql = "SELECT * FROM $this->table WHERE category_slug = '$slug'";
        if ($this->QueryCount($sql) != 0) {
            return FALSE;
        }
        return TRUE;
    }
}