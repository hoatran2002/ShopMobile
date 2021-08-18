<?php
class Order extends Database {
    function __construct() {
        parent::__construct();
        $this->table = $this->TableName('order');
    }
    function order_list() {
        $sql = "SELECT * FROM $this->table ORDER BY order_id DESC";
        return $this->QueryAll($sql);
    }
    function order_rowid($id) {
        $sql = "SELECT * FROM $this->table WHERE order_id ='$id'";
        return $this->QueryOne($sql);
    }
    function order_update($data, $id) {
        $strset = '';
        foreach ($data as $f => $v) {
            $strset.= $f . "='$v',";
        }
        $strset = rtrim(rtrim($strset), ',');
        $sql = "UPDATE $this->table SET $strset WHERE order_id = '$id'";
        $this->QueryNoResult($sql);
    }
}