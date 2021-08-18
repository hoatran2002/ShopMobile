<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once('../Config.php');
require_once('../system/load.php');
require_once('../system/core.php');
require_once('../system/Database.php');
if(!isset($_SESSION['user_admin'])) {
	redirect('login.php');
}
loadComponent(false);
?>
