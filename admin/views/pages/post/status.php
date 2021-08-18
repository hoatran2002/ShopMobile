<?php
$post = loadModel('post');
$id = $_REQUEST['id'];
$row = $post->post_rowid($id);
$tt = ($row['post_status']==1) ? 2 : 1;
$data = array(
	'post_status' => $tt,
	'post_updatedat' => date('Y-m-d H:i:s'),
	'post_updatedby' => $_SESSION['user_id']
);

$post->post_update($data, $id);
set_flash('mesage',['type'=>'success','msg'=>'Cập nhật thành công']);
redirect('index.php?option=post');
?>