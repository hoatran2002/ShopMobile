<?php
class Product extends Database {
    function __construct() {
        parent::__construct();
        $this->table = $this->TableName('product');
    }
    function product_list($page = true) {
        if ($page == true) {
            $sql = "SELECT * FROM $this->table WHERE product_status !='0' ORDER BY product_createdat DESC";
        } else {
            $sql = "SELECT * FROM $this->table WHERE product_status ='0' ORDER BY product_createdat DESC";
        }
        return $this->QueryAll($sql);
    }
    function product_all() {
        $sql = "SELECT * FROM $this->table";
        return $this->QueryAll($sql);
    }
    function product_insert($data) {
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
    function product_rowid($id) {
        $sql = "SELECT * FROM $this->table WHERE product_id ='$id'";
        return $this->QueryOne($sql);
    }
    function product_update($data, $id) {
        $strset = '';
        foreach ($data as $f => $v) {
            $strset.= $f . "='$v',";
        }
        $strset = rtrim(rtrim($strset), ',');
        $sql = "UPDATE $this->table SET $strset WHERE product_id = '$id'";
        $this->QueryNoResult($sql);
    }
    function product_delete($id) {
        $sql = "DELETE FROM $this->table WHERE product_id = '$id'";
        $this->QueryNoResult($sql);
    }
    function product_slug_exists($slug, $id = null) {
        if ($id = null) {
            $sql = "SELECT * FROM $this->table WHERE product_slug = '$slug'";
        } else {
            $sql = "SELECT * FROM $this->table WHERE product_slug = '$slug' AND product_id != $id";
        }
        if ($this->QueryCount($sql) != 0) {
            return FALSE;
        }
        return TRUE;
    }
}