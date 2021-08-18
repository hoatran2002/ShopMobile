<?php
session_start();
require_once('../system/core.php');

unset($_SESSION['user_id']);
unset($_SESSION['user_admin']);
unset($_SESSION['user_fullname']);
redirect('login.php');
?>