<?php
$menu= loadModel('menu');
$id = $_REQUEST['id'];
$row = $menu->menu_rowid($id);
$tt = ($row['menu_status'] == 1) ? 2 : 1;
$data=array(
	'menu_status' => $tt,
	'menu_updatedat' => date('Y-m-d H:i:s'),
	'menu_updatedby' => $_SESSION['user_id']
);
$menu->menu_update($data,$id);
set_flash('mesage',['type'=>'success','msg'=>'Cập nhật thành công']);
redirect('index.php?option=menu');
?>