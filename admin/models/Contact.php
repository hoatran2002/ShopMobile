<?php
class Contact extends Database {
    function __construct() {
        parent::__construct();
        $this->table = $this->TableName('contact');
    }
    function contact_list() {
        $sql = "SELECT * FROM $this->table WHERE contact_status != '0'";
        return $this->QueryAll($sql);
    }
    function contact_rowid($id) {
        $sql = "SELECT * FROM $this->table WHERE contact_id ='$id'";
        return $this->QueryOne($sql);
    }
    function contact_update($data, $id) {
        $strset = '';
        foreach ($data as $f => $v) {
            $strset.= $f . "='$v',";
        }
        $strset = rtrim(rtrim($strset), ',');
        $sql = "UPDATE $this->table SET $strset WHERE contact_id = '$id'";
        $this->QueryNoResult($sql);
    }
}