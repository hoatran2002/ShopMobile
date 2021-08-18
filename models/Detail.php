<?php
class Detail extends Database {
    function __construct() {
        parent::__construct();
        $this->table = $this->TableName('product');
    }
    function product_detail($slug) {
        $sql = "SELECT * FROM $this->table WHERE product_slug = '$slug' AND product_status = '1'";
        return $this->QueryOne($sql);
    }
    function product_detailid($pid) {
        $sql = "SELECT * FROM $this->table WHERE product_id = '$pid' AND product_status = '1'";
        return $this->QueryOne($sql);
    }
    function product_relate($cat, $limt = 4) {
        $sql = "SELECT * FROM $this->table WHERE product_catid = '$cat' AND product_status = '1' ORDER BY product_createdby DESC LIMIT $limt";
        return $this->QueryAll($sql);
    }
}
?>