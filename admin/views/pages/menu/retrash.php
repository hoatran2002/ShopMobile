<?php
$menu = loadModel('menu');
$id = $_REQUEST['id'];
$data = array(
	'menu_status' => 1,
	'menu_updatedat' => date('Y-m-d H:i:s'),
	'menu_updatedby' => $_SESSION['user_id']
);
$menu->menu_update($data,$id);
set_flash('mesage',['type'=>'success','msg'=>'Khôi phục thành công']);
redirect('index.php?option=menu&cat=trash');
?>