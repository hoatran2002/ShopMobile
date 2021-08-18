<?php 
class Checkout extends Database {
	function __construct() {
		parent::__construct();
	}
	function insert_order($data) {
		$strf = $strv = '';
		foreach ($data as $f => $v) {
			$strf .= 'order_'.$f.",";
			$strv .= "'".$v."',";
		}
		$strf = rtrim(rtrim($strf),',');
		$strv = rtrim(rtrim($strv),',');
		$sql = "INSERT INTO uml_order ($strf) VALUES ($strv)";
		return $this->QueryNoResult($sql, true);
	}
	function insert_orderdetail($data) {
		$strf = $strv = '';
		foreach ($data as $f => $v) {
			$strf .= 'orderdetail_'.$f.",";
			$strv .= "'".$v."',";
		}
		$strf = rtrim(rtrim($strf),',');
		$strv = rtrim(rtrim($strv),',');
		$sql = "INSERT INTO uml_orderdetail ($strf) VALUES ($strv)";
		$this->QueryNoResult($sql);
	}
}
?>