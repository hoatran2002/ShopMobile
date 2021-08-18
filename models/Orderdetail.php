<?php
class Orderdetail extends Database {
    function __construct() {
        parent::__construct();
        $this->table = $this->TableName('orderdetail');
    }
    function orderdetail_listproduct($id) {
        $sql = "SELECT * FROM $this->table WHERE orderdetail_orderid = '$id'";
        return $this->QueryAll($sql);
    }
}