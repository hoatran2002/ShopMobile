<?php
$post = loadModel('post');
$id = $_REQUEST['id'];
$data = array(
	'post_status' => 0,
	'post_updatedat' => date('Y-m-d H:i:s'),
	'post_updatedby' => $_SESSION['user_id']
);

$post->post_update($data, $id);
set_flash('mesage',['type'=>'success','msg'=>'Đưa vào thùng rác thành công']);
redirect('index.php?option=post');
?>