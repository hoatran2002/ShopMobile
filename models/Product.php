<?php
class Product extends Database {
    function __construct() {
        parent::__construct();
        $this->table = $this->TableName('product');
    }
    function product_home_lastnews($limt = 4) {
        $sql = "SELECT * FROM $this->table WHERE product_status='1' ORDER BY product_createdat DESC LIMIT $limt";
        return $this->QueryAll($sql);
    }
    function product_home_lastsale($limt = 4) {
        $sql = "SELECT * FROM $this->table WHERE product_status='1' AND product_pricesale > 0 ORDER BY product_pricesale DESC LIMIT $limt";
        return $this->QueryAll($sql);
    }
    function product_all($first, $limit) {
        $sql = "SELECT * FROM $this->table WHERE product_status='1' ORDER BY product_price DESC LIMIT $first,$limit";
        return $this->QueryAll($sql);
    }
    function product_all_count() {
        $sql = "SELECT * FROM $this->table WHERE product_status='1'";
        return $this->QueryCount($sql);
    }
    function product_category($catid, $first, $limit) {
        $sql = "SELECT * FROM $this->table WHERE product_status='1' AND product_catid='$catid' ORDER BY product_createdat DESC LIMIT $first,$limit";
        return $this->QueryAll($sql);
    }
    function product_category_count($catid) {
        $sql = "SELECT * FROM $this->table WHERE product_status='1' AND product_catid='$catid'";
        return $this->QueryCount($sql);
    }
    function product_rowid($id) {
        $sql = "SELECT * FROM $this->table WHERE product_id ='$id'";
        return $this->QueryOne($sql);
    }
}
?>