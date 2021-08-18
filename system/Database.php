<?php
class Database extends Config {
    function __construct() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        mysqli_set_charset($this->conn, "utf8");
    }
    function QueryOne($sql) {
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    function QueryAll($sql) {
        $result = mysqli_query($this->conn, $sql);
        $a = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $a[] = $row;
        }
        return $a;
    }
    function TableName($name) {
        return $this->tt . $name;
    }
    function QueryCount($sql) {
        $result = mysqli_query($this->conn, $sql);
        $n = mysqli_num_rows($result);
        return $n;
    }
    function QueryNoResult($sql, $insert = false) {
        mysqli_query($this->conn, $sql);
        if($insert) return mysqli_insert_id($this->conn);
    }
    function QueryError() {
        if($this->conn->error) {
            return $this->conn->error;
        }
        return false;
    }
}
?>