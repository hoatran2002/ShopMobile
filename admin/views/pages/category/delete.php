<?php
$category = loadModel('category');
$id = $_REQUEST['id'];
$data = array(
	'category_status' => 0,
	'category_updatedat' => date('Y-m-d H:i:s'),
	'category_updatedby' => $_SESSION['user_id']
);

$category->category_update($data,$id);
set_flash('mesage',['type'=>'success','msg'=>'Cập nhật thành công']);
redirect('index.php?option=category');
?>