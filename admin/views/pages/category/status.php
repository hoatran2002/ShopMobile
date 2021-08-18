<?php
$category = loadModel('category');
$id = $_REQUEST['id'];
$row = $category->category_rowid($id);
$tt = ($row['category_status']==1) ? 2 : 1;
$data = array(
	'category_status' => $tt,
	'category_updatedat' => date('Y-m-d H:i:s'),
	'category_updatedby' => $_SESSION['user_id']
);

$category->category_update($data,$id);
set_flash('mesage',['type'=>'success','msg'=>'Cập nhật thành công']);
redirect('index.php?option=category');
?>