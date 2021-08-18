<?php
class Auth extends Database {
    function __construct() {
        parent::__construct();
        $this->table = $this->TableName('user');
    }
    function auth_check($username) {
        $sql = "SELECT * FROM $this->table WHERE  (user_username= '$username' OR user_email = '$username') AND user_status='1' AND user_access='1'";
        $count = $this->QueryCount($sql);
        if ($count != 0) {
            return TRUE;
        }
        return FALSE;
    }
    function auth_guard($username, $password) {
        $sql = "SELECT * FROM $this->table WHERE  (user_username='$username' OR user_email='$username') AND user_password='$password' AND user_status='1' AND user_access='1'";
        if ($this->QueryCount($sql)) {
            return $this->QueryOne($sql);
        }
        return FALSE;
    }
}
?>