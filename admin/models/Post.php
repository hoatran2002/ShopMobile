  <?php
class Post extends Database {
    function __construct() {
        parent::__construct();
        $this->table = $this->TableName('post');
    }
    function post_list($page = true) {
        if ($page == true) {
            $sql = "SELECT * FROM $this->table WHERE post_status !='0' ORDER BY post_createdat DESC";
        } else {
            $sql = "SELECT * FROM $this->table WHERE post_status ='0' ORDER BY post_createdat DESC";
        }
        return $this->QueryAll($sql);
    }
    function post_all() {
        $sql = "SELECT * FROM $this->table";
        return $this->QueryAll($sql);
    }
    function post_insert($data) {
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
    function post_rowid($id) {
        $sql = "SELECT * FROM $this->table WHERE post_id ='$id'";
        return $this->QueryOne($sql);
    }
    function post_update($data, $id) {
        $strset = '';
        foreach ($data as $f => $v) {
            $strset.= $f . "='$v',";
        }
        $strset = rtrim(rtrim($strset), ',');
        $sql = "UPDATE $this->table SET $strset WHERE post_id = '$id'";
        $this->QueryNoResult($sql);
    }
    function post_delete($id) {
        $sql = "DELETE FROM $this->table WHERE post_id = '$id'";
        $this->QueryNoResult($sql);
    }
    function post_slug_exists($slug, $id = null) {
        if ($id = null) {
            $sql = "SELECT * FROM $this->table WHERE post_slug = '$slug'";
        } else {
            $sql = "SELECT * FROM $this->table WHERE post_slug = '$slug' AND post_id !=$id";
        }
        if ($this->QueryCount($sql) != 0) {
            return FALSE;
        }
        return TRUE;
    }
}
